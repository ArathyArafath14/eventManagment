<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Banner;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
          $events=Event::where('status',1)->with('eventBanner')->get();
         return view('admin/event/event_list',compact('events')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('admin/event/add_event'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     if($request->id !='')
        {
           $event= Event::find($request->id);  
        }
        else
        {
            $event= new Event();
        }   
       $event->event_topics=$request->event_topic;
       $event->event_place=$request->event_place;
       $event->event_start_date=$request->start_date;
       $event->event_end_date=$request->end_date;
       $event->event_start_time=$request->start_time;
       $event->event_end_time=$request->end_time;
       $event->about=$request->about;
       $event->entry_fee=$request->entry_fee;
       $event->event_contact_no=$request->contact;
       $event->email=$request->email;
       $event->organized=$request->organized;
       $event->emergency=$request->emergency_contact;
       $event->status=1;
       $event->save();
       $files = $request->file('event_file');
       $fileName = $files->getClientOriginalName();
            $fileExtension = $files->getClientOriginalExtension();
            $newImageName = date('Y_m_d_').uniqid().'.'.$fileExtension;
            $path = public_path('event');
            $files->move($path, $newImageName);
          
             $banner= new Banner();
             $banner->event_id=$event->id;
            $banner->banner=$newImageName;
            $banner->status=1;
             $banner->save();
        
       return redirect('events')->with('success', 'Event saved!');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show($id)
    {
        //
    }

    /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
       
        $event= Event::find($id);
        return view('admin/event/add_event',compact('event')); 
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        $event= Event::find($id);
        $event->status=0;
        $event->save();
    return redirect('events')->with('success', 'Event deleted!');
    }
}
