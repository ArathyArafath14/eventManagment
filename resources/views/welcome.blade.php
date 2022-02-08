@extends('header')
@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Events</span></h1>
          <h2>NAFFCO is the leading manufacturers & suppliers of fire protection systems, fire fighting equipment, safety & security systems.</h2>

          <div class="btns">
            <a class="nav-link scrollto btn-menu" href="#why-us">Register</a>
           
          </div>
        </div>
        

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="{{asset('frontend/assets/img/about.jpg')}}" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>About NAFFCO.</h3>
            <p class="fst-italic">
              NAFFCO was founded in Dubai, UAE to become the world's leading producer and supplier of life safety solutions. By recognizing the importance and convenience of having easy access to multiple safety services, we became specialized by offering complete solutions under one roof for all types of high quality firefighting equipment, fire protection systems, fire alarms, addressable emergency systems, security systems, custom-made vehicle such as fire trucks, ambulances, mobile hospitals and airport rescue firefighting vehicles (ARFF).<br>

With the most talented and dedicated employees from around the world, NAFFCO has over 15,000 team members including 2,000 passionate engineers and over 6 million square feet of manufacturing facilities. We are currently exporting to over 100 countries worldwide.
<br>
Specified product manufactured in our facility has been certified by UL, FM, BSI, LPCB & Global Mark in consistent with International Standards. Our Quality Management System, ISO 9001 has been certified by BSI & UL-DQS. Our Environmental (ISO 14001) and Occupational Health & Safety (ISO 45001) Management Systems have been certified by UL-DQS. Our Trucks & Vehicles division has been assessed & certified for Quality Management System requirement for Aviation, Space & Defense organization(AS 9100) by UL-DQS.
<br>
Our success is driven by our "passion to protect"; our vision is to become the world's number one provider of innovative solutions in protecting life, environment and property.
            </p>
            
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Events</h2>
          <p>Up comming Events</p>
        </div>

        <div class="row">

          @foreach(@$events as $event)
          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>{{ date(" M, d, Y", strtotime( @$event->event_start_date)) }}, {{@$event->event_start_time}}</span>
              <span>{{@$event->event_place}}</span>
               <span>{{'Email'}}: {{@$event->email}},<br>
                {{'Help line'}}: {{@$event->event_contact_no}},<br>
                {{'Organized By'}}: {{@$event->organized}}</span>
              <h4>{{@$event->event_topics}}</h4>
              <p>{{@$event->about}}</p>
              <br>
              <a href="{{ url('event-register/'.$event->id) }}" >Register</a>
            </div>


          </div>

          @endforeach

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
   

    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

            

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  11:00 AM - 2300 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

         

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection




