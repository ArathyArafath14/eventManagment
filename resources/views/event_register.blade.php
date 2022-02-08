<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Assessment-Task') }}</title>

    <!-- Scripts -->
   <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
               <!--  <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                                </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                       

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            
 <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="{{ asset('event/'.@$event->eventBanner[0]['banner'])}}">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register for an Event!</h1>
                            </div>
                            <div class="col-lg-12">
                        @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
                      
                              <form method="POST" action="{{ url('event-register-store')}}">
                        @csrf
<input type="hidden" name="event_id" value="{{@$event->id}}">
<div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>{{ date(" M, d, Y", strtotime( @$event->event_start_date)) }},{{@$event->event_start_time}}</span> <br>
              <span>{{@$event->event_place}}</span>
               <span>{{'Email'}}: {{@$event->email}},<br>
                {{'Help line'}}: {{@$event->event_contact_no}},<br>
                {{'Organized By'}}: {{@$event->organized}}<br>
               <mark> {{'Emergancy Contact'}}: {{@$event->emergency}} </mark></span>

              <h4><br>{{@$event->event_topics}}</h4>

            </div>
                        <hr>
                                 <div class="form-group">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="exampleFirstName" placeholder=" Name">

                                         @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                    </div>
                                   
                                
                                <div class="form-group">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="email" class="form-control form-control-user  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="exampleInputEmail" placeholder="Email Address">

                                     @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" class="form-control form-control-user  @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" id="exampleInputEmail" placeholder="Mobile number">

                                     @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                                
                                  <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </form>
                           
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

 </main>
         </div>
            <!-- End of Main Content -->

     <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
</body>
</html>

