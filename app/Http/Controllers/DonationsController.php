<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\View\View;
use App\Models\CmsDonation;
use Illuminate\Http\Request;
use App\Mail\SendThanksDonation;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Support\Renderable;
use App\Mail\SendThanksDonation as MailSendThanksDonation;

class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $cms_content = CmsDonation::get();
        $banks = CmsDonation::where('title_en','Other ways of donation')->get();
        $types = CmsDonation::where('title_en','type of donation')->get();
        $return_policy = CmsDonation::where('title_en','Return policy')->first();
        $title = __('lang.donate_now');

        return view('donations.index', compact('title','cms_content','banks','types','return_policy'));
    }

    public function index2()
    {

        $title = __('lang.donate_now');

        return view('donations.index2', compact('title'));
    }

    public function success(Request $donationRequest): View
    {
        $donationId = $donationRequest->validate([
            'donation_id' => 'required'
        ])['donation_id'];

        $donation = Donation::where('transaction_number', $donationId)->first();

        $title = __('lang.donate_now');

        return view('donations.success')
            ->with('title', $title)
            ->with('donation', $donation);
    }
    /**
     * Display a listing of the resource.
     * @return array
     */
    public function createSession(Request $request): array
    {
        $donation = Donation::query()->create($request->except('_token'));

        $curl = curl_init();
        $data = [
            "apiOperation" => "CREATE_CHECKOUT_SESSION",
            "interaction" => ["operation" => "PURCHASE",
                "returnUrl" => route('web.cibCallBack')
            ],
            "order" => [
                'id' => $donation->id,
                'amount' => $request->amount,
                "currency" => "EGP",
                "description" => "Order Goods",
                "reference" => "donation" . $donation->id
            ],
        ];
        curl_setopt_array($curl, array(
        //    CURLOPT_URL => "https://cibpaynow.gateway.mastercard.com/api/rest/version/61/merchant/TESTCIB701357/session",//test
            CURLOPT_URL => "https://cibpaynow.gateway.mastercard.com/api/rest/version/61/merchant/CIB701357/session",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
            //    "authorization: Basic bWVyY2hhbnQuVEVTVENJQjcwMTM1NzozOWZmODY1ODIxM2NlNTAxNjBlMDM0YjliMzk4NzY3Mw==", //test
                "authorization: Basic bWVyY2hhbnQuQ0lCNzAxMzU3OjQzMDE1MTJiNTFjMGIyNzU5MWZkZTlhNGU4ZGUzODQy", //live
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: ba0ed4e9-0ff8-8aa6-ad05-8e8a67d4c8ae"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        Log::info($response);
        if ($err) {
            Log::info("cURL Error #:" . $err);
            return ['status' => false,
                    'error' => $err];
        } else {
            $response = json_decode($response);
            if ($response->result == 'SUCCESS') {
                $donation->update(['transaction_number' => $response->successIndicator]);
                return ['status' => true, 'session' => $response->session->id];
            }
        }

        return ['status' => false];


    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function otherDonationMethods()
    {
        $title = __('lang.other_donate_methods');

        return view('donations.other_donate_methods', compact('title'));
    }


    public function callBack(Request $request)
    {
        Log::info($request->all());

        $title = __('lang.donation_thanks');

        $donation = Donation::query()->where('transaction_number', $request->resultIndicator)->first();

        if ($donation) {
            $donation->update(['paid' => 1]);
            // Mail::to($donation->email)
            //     ->send(new SendThanksDonation(['message' => __('lang.thanks_donation', ['name' => $donation->name, 'value' => $donation->amount])]));
        }


        return redirect(route('web.donations.success', ['donation_id' => $request->resultIndicator]));

    }

}
