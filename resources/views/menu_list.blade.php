@extends('header')
@section('content')

 <main id="main">
 	  <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Menu</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Menu</li>
          </ol>
        </div>

      </div>
    </section>
 	 <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
             
                <a href="{{url('all-menu')}}">All</a>
              @foreach(@$categories as $category)
              
                <a href="{{url('menu-category/'.@$category->id)}}">&nbsp;&nbsp; {{@$category->category_name}} &nbsp; &nbsp; &nbsp;</a>
              @endforeach
              
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
@foreach(@$menus as $menu)
 <?php $cat_id= explode(",",$menu->category_id); ?>
 @if(@$id)
@if(in_array($id,$cat_id)) 

          <div class="col-lg-6 menu-item filter-starters">
            <img src="{{ asset('food/'.@$menu->img)}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">{{@$menu->menu_name}}</a><span>{{@$menu->food_price}} Aed</span>
            </div>
            <div class="menu-ingredients">
             {{@$menu->description}}
            </div>
          </div>
          @endif
          @else
          <div class="col-lg-6 menu-item filter-starters">
            <img src="{{ asset('food/'.@$menu->img)}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">{{@$menu->menu_name}}</a><span>{{@$menu->food_price}} Aed</span>
            </div>
            <div class="menu-ingredients">
             {{@$menu->description}}
            </div>
          </div>
          @endif
          @endforeach

          

        </div>

      </div>
    </section><!-- End Menu Section -->
 	</main>
@endsection