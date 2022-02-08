<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventRegister;

class PublicController extends Controller
{
    
    public function index()
    {
       $date=date("Y/m/d");
       $events=Event::where('event_start_date','>=',$date)->where('status',1)->with('eventBanner')->orderby('event_start_date')->get();
    	return view('welcome',compact('events'));
    }
    public function eventRegister($id)
    {
      $event = Event::find($id);
      return view('event_register',compact('event'));
    }
    public function eventRegisterStore(Request $request)
    {       $id=$request->event_id;
          $event_register= new EventRegister();
          $event_register->event_id=$request->event_id;
          $event_register->full_name=$request->name;
          $event_register->email=$request->email;    
          $event_register->mobile=$request->number;
          $event_register->status=1;
          if($event_register->save())
            {
               $details['to'] = $request->email
               $details['name'] = $request->name;
               $details['subject'] = 'Event Register';
              $details['message'] = 'You have Successsfuly Register.';

        SendMailJob::dispatch($details);
        ->delay(now()->addMinutes(5));

        return response('Email sent successfully');
            }

    return redirect('event-register/'.$id)->with('success', 'registered Successfully!');
    }
    

}
