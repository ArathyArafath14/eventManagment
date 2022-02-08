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
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Event List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Banner</th>
                                            <th>Event Topics</th>
                                            <th>Event place</th>
                                            <th>Start date & Time</th>
                                            <th>End date & Time</th>
                                            <th>Help line</th>
                                            <th>Email</th>
                                            <th>Emergancy No:</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php $i=1;?>

                                        @foreach(@$events as $event)
                                   <tr>
                                    
                                            <th>{{@$i}}</th>
                                            <th><img src="{{ asset('event/'.@$event->eventBanner[0]['banner'])}}" width="100px" height="100px"></th>
                                            <th>{{@$event->event_topics}}</th>
                                             <th>{{@$event->event_place}}</th>
                                             <th>{{@$event->event_start_date}}<br> {{@$event->event_start_time}}</th>
                                             <th>{{@$event->event_end_date}}<br> {{@$event->event_end_time}}</th>
                                              <th>{{@$event->event_contact_no}}</th>
                                              <th>{{@$event->email}}</th>
                                              <th>{{@$event->emergency}}</th>

                                            <th>
                                                <a class="btn btn-info btn-sm" href="{{ route('event.edit',$event->id) }}"><i class="fas fa-edit" style="font-size: 12px;"></i></a>
                                                 <form action="{{ route('event.destroy', $event->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash" style="font-size: 12px;"></i></button>
                </form>
                                            </th>
                                            
                                                    
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
@endsection