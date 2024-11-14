<?php

namespace App\Http\Controllers\Zoom;

use App\Http\Controllers\Controller;
use App\Traits\ZoomJWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Session;
use App\Models\Course;



class MeetingController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function list(Request $request)
    {
        $path = 'users/me/meetings';
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        $data['meetings'] = array_map(function (&$m) {
            $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
            return $m;
        }, $data['meetings']);

        return [
            'success' => $response->ok(),
            'data' => $data,
        ];
    }
    public function create($id,Request $request)
    {   
        $session = Session::where('id',$id)->first();
        $topic = $session->title;
        $start_time = $session->time;
        // $validator = Validator::make($request->all(), [
        //     'topic' => 'required|string',
        //     'start_time' => 'required|date',
        //     'agenda' => 'string|nullable',
        // ]);
        
        // if ($validator->fails()) {
        //     return [
        //         'success' => false,
        //         'data' => $validator->errors(),
        //     ];
        // }
        // $data = $validator->validated();

        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'topic' => $topic,
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($start_time),
            'duration' => 30,
            'agenda' => 'nothing',
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);
        $data = json_decode($response->body());
        $meeting_link = $data->start_url;
        $session->link = $meeting_link; 
        $session->save();
        return back();
    //    dd($data->start_url);

        // dd($response->body());
        // return [
        //     'success' => $response->status() === 201,
        //     'data' => json_decode($response->body(), true),
        // ];
    }
    public function zoomPastMeeting(){
        $path = '/meetings/73203076387/registrants';
        $response = $this->zoomPost($path,[
            "email"=> "example@example.com",
            "first_name"=> "Mike",
            "last_name"=> "Brown",
            "address"=> "1800 Amphibious Blvd.",
            "city"=> "Mountain View",
            
        ]);
        
        // $response = $this->zoomGet($path,[
        //     'type'=>'live',
        //     'page_size'=>30,
        // ]);
        $data = json_decode($response->body());
        dd($data);
    }

    public function createCourse($id,Request $request)
    {   
        $course = Course::where('id',$id)->first();
        $topic = $course->title;
        $start_time = $course->session_time;
        
        // if ($validator->fails()) {
        //     return [
        //         'success' => false,
        //         'data' => $validator->errors(),
        //     ];
        // }
        // $data = $validator->validated();

        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'topic' => $topic,
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($start_time),
            'duration' => 30,
            'agenda' => 'nothing',
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);
        $data = json_decode($response->body());
        $meeting_link = $data->start_url;
        $course->next_session_link = $meeting_link; 
        $course->save();
        return back();
    
    }
    public function get(Request $request, string $id) { /**/ }
    public function update(Request $request, string $id) { /**/ }
    public function delete(Request $request, string $id) { /**/ }
}
