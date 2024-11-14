<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;

class NewsletterController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    //
    public function store_user(Request $request){

        if ( ! Newsletter::isSubscribed($request->email) ) {
            Newsletter::subscribe($request->email,['FNAME'=>'here', 'LNAME'=>'there'], 'subscribers');
        }
        return redirect()->back();
    }
    public function store(Request $request)
    {
        if ( ! Newsletter::isSubscribed($request->email) ) {
            Newsletter::subscribe($request->email,['FNAME'=>$request->first_name, 'LNAME'=>$request->last_name], 'subscribers');
        }
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return back()->with(['errors' => $val->messages()]);
        }

        if (!$request->has('_validate')) {
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

            event(new BreadDataAdded($dataType, $data));

            if ($request->ajax()) {
                return response()->json(['success' => true, 'data' => $data]);
            }

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                        'message'    => __('voyager::generic.successfully_added_new')." {$dataType->display_name_singular}",
                        'alert-type' => 'success',
                    ]);
        }
    }
    public function update(Request $request, $id)
    {
        $subscriber = \App\Models\Newsletter::where('id',$id)->first();
        Newsletter::subscribeOrUpdate($subscriber->email, ['FNAME'=>$request->first_name, 'LNAME'=>$request->last_name], 'subscribers');

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {
            $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

            event(new BreadDataUpdated($dataType, $data));

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }
    public function destroy(Request $request, $id)
    {
        // dd($request->ids);
        if($request->ids){
            $ids = explode(',',$request->ids);
            foreach($ids as $element){
                $subscriber = \App\Models\Newsletter::where('id',$element)->first();
                if (  Newsletter::isSubscribed($subscriber->email) ) {
                    Newsletter::unsubscribe($subscriber->email, 'subscribers');
                }
            }


        }else{
            $subscriber = \App\Models\Newsletter::where('id',$id)->first();
            if (  Newsletter::isSubscribed($subscriber->email) ) {
                Newsletter::unsubscribe($subscriber->email, 'subscribers');
            }
        }

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('delete', app($dataType->model_name));

        // Init array of IDs
        $ids = [];
        if (empty($id)) {
            // Bulk delete, get IDs from POST
            $ids = explode(',', $request->ids);
        } else {
            // Single item delete, get ID from URL
            $ids[] = $id;
        }
        foreach ($ids as $id) {
            $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
            $this->cleanup($dataType, $data);
        }

        $displayName = count($ids) > 1 ? $dataType->display_name_plural : $dataType->display_name_singular;

        $res = $data->destroy($ids);
        $data = $res
            ? [
                'message'    => __('voyager::generic.successfully_deleted')." {$displayName}",
                'alert-type' => 'success',
            ]
            : [
                'message'    => __('voyager::generic.error_deleting')." {$displayName}",
                'alert-type' => 'error',
            ];

        if ($res) {
            event(new BreadDataDeleted($dataType, $data));
        }

        return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
    }




    // public function subscribe(){
    //     return view('newsletter.subscribe');
    // }
    // public function store(Request $request)
    // {
    //     if ( ! Newsletter::isSubscribed($request->user_email) ) {
    //         Newsletter::subscribe($request->user_email,['FNAME'=>$request->first_name, 'LNAME'=>$request->last_name], 'subscribers');
    //     }
    // }
    // public function createCampaign(){
    //     // Newsletter::createCampaign(
    //     //     'Eslam',
    //     //     'reply to',
    //     //     'subject',
    //     //     'html',
    //     //     'subscribers',
    //     //    );
    //        Newsletter::createCampaign(
    //         'Eslam',
    //         'reply to',
    //         'subject',
    //        );
    // }
}
