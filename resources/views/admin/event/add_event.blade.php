@extends('layouts.app')
@section('content')

  <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create Events !</h1>
                            </div>
                             <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                                     @csrf
                                     <input type="hidden" value="{{@$event->id}}" name="id">
                                     <div class="form-group">
                                  <input type="file" class="form-control" id="event_file" placeholder="Event File" name="event_file" value="">
                                    
                                </div>
                                <div class="form-group row">
                                   <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="event_topic"
                                            placeholder="Event Topics" name="event_topic" value="{{@$event->event_topics}}">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="event_place"
                                            placeholder="Event Place" name="event_place" value="{{@$event->event_place}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control" id="start_date" placeholder="Start Date" name="start_date" value="{{@$event->event_start_date}}" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="end_date"
                                            placeholder="End Date" value="{{@$event->   event_end_date}}" name=end_date>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label> Start Time</label>
                                        <input type="time" class="form-control" id="start_time" placeholder="Start time" name="start_time" value="{{@$event->event_start_time}}" required="">
                                    </div>

                                    <div class="col-sm-6">
                                        <label> End Time</label>
                                        <input type="time" class="form-control" id="end_time"
                                            placeholder="End Time" value="{{@$event->event_end_time}}" name=end_time>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <textarea class="form-control" id="about" placeholder="About Event" name="about" value="" required="">{{@$event->about}}</textarea> 
                                    </div>
                                     <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="fee" placeholder="Entry fee" name="entry_fee" value="{{@$event->entry_fee}}" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control" id="contact" placeholder="Help line" name="contact" maxlength="14" value="{{@$event->event_contact_no}}" required="">
                                    </div>
                                     <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control" id="email" placeholder="Contact email" name="email" value="{{@$event->email}}" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="organized" placeholder="Team Naffco " name="organized" value="Team Naffco" required="">
                                    </div>
                                     <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control" id="emergency_contact" placeholder="Incase of fire / unexpected occurrence Contact Number" name="emergency_contact" maxlength="14"  value="{{@$event->emergency}}" required="">
                                    </div>
                                </div>
                                
                                  <button type="submit" class="btn btn-primary">
                                    {{ __('ADD') }}
                                </button>
                                
                            </form>
                            <hr>
                  	</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection