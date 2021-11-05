@extends('layouts.essential')
@section('content')
  <!---------- BANNER SECTION --------->
  <section id="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center">
          <p class="promo-title">BRIMS</p>
          <p class="org-desc">Broadband Internet Monitoring System</p>
        </div>
        <div class="col-md-6 text-center">
          <img src="{{ asset('images/icons/cell.png') }}" class="img-fluid">
        </div>
      </div>
    </div>
      <img src="{{ asset('images/icons/wave1.png') }}" class="bottom-img">
  </section>

  <!--------ABOUT THE PROJECT  -------->
  <section id="about">
    <div class="container text-center">
      <h1 class="title">ABOUT THE PROJECT</h1>
      <div class="row text-center">
        <div class="col-md-4 ">
          <img src="{{ asset('images/icons/service1.png') }}" class="sevice-img about">
          <h4>SAMPLE TITLE 1</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, doloribus!</p>
        </div>
        <div class="col-md-4 ">
          <img src="{{ asset('images/icons/service2.png') }}" class="sevice-img about">
          <h4>SAMPLE TITLE 2</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, doloribus!</p>
        </div>
        <div class="col-md-4">
          <img src="{{ asset('images/icons/service3.png') }}" class="sevice-img about">
          <h4>SAMPLE TITLE 2</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, doloribus!</p>
        </div>
      </div>
    </div>
  </section>
  
  <!-- OBJECTIVES SECTION  -->
  <section id="objectives">
    <div class="container">
      <h1 class="title text-center">OBJECTIVES</h1>
      <div class="row offset-1">
        <div class="col-md-6 objectives">
          <p class="obj-title">This Project Aims to</p>
          <ul>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ea?</li>
            <li>Lorem ipsum dolor sit amet consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, facilis sint.</li>
          </ul>
        </div>
        <div class="col-md-6 text-center">
          <img src="{{ asset('images/icons/obj.png') }}" class="img-fluid" style="width: 60%;">
        </div>
      </div>
    </div>
  </section>
  
  <!--------- SCOPE AND METHODOLOGY ---------->

  <section id="scope">
    <div class="container">
      <h1 class="title text-center">SCOPE</h1>
      <div class="row">
        <div class="col-md-5 text-center">
          <img src="{{ asset('images/Map/map.png') }}" class="img-fluid" style="width:60%">
        </div>  
        <div class="col-md-7 scope-desc">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam hic necessitatibus fugiat iure? Libero et quae labore atque est! Necessitatibus doloribus sint, velit cum libero odit eum a et voluptatum!</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam hic necessitatibus fugiat iure? Libero et quae labore atque est! Necessitatibus doloribus sint, velit cum libero odit eum a et voluptatum!</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam hic necessitatibus fugiat iure? Libero et quae labore atque est! Necessitatibus doloribus sint, velit cum libero odit eum a et voluptatum!</p>
        </div>
      </div>
        
    </div>  
  </section>

  <!------- SOCIAL MEDIA (OPTIONAL)-------->
  <section id="social-media">
    <div class="container text-center">
      <p>FIND US ON SOCIAL MEDIA</p>
       <div class="social-icons">
         <a href="#"><img src="{{ asset('images/Logo/facebook-icon.png') }}" alt=""></a>
         <a href="#"><img src="{{ asset('images/Logo/twitter-icon.png') }}" alt=""></a>
         <a href="#"><img src="{{ asset('images/Logo/instagram-icon.png') }}" alt=""></a>
        
       </div>
    </div>
  </section>
@endsection
