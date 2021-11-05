@extends('layouts.essential')
@section('content')
  <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">
  <!---------- BANNER SECTION --------->
  <section id="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center">
          <p class="promo-title">ABOUT US</p>
        </div>
        <div class="col-md-6 text-center">
          <img src="/Images/ARISEn/ARISEn Lab Logo.png" class="img-fluid">
        </div>
      </div>
    </div>
    <img src="/Images/icons/wave1.png" class="img-bottom">
  </section>

  <!--------MEET THE TEAM  -------->
  <section id="about">
    <div class="container text-center">
      <h1 class="title">MEET THE TEAM</h1>
      <div class="row text-center">
        <div class="col-md-4 ">
          <img src="/Images/TM.png" class="sevice-img about">
          <h4>SAMPLE TITLE 1</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, doloribus!</p>
        </div>
        <div class="col-md-4 ">
          <img src="/Images/TM.png" class="sevice-img about">
          <h4>SAMPLE TITLE 2</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, doloribus!</p>
        </div>
        <div class="col-md-4">
          <img src="/Images/TM.png" class="sevice-img about">
          <h4>SAMPLE TITLE 3</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, doloribus!</p>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-md-4 ">
          <img src="/Images/TM.png" class="sevice-img about">
          <h4>SAMPLE TITLE 4</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, doloribus!</p>
        </div>
        <div class="col-md-4 ">
          <img src="/Images/TM.png" class="sevice-img about">
          <h4>SAMPLE TITLE 5</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, doloribus!</p>
        </div>
        <div class="col-md-4">
          <img src="/Images/TM.png" class="sevice-img about">
          <h4>SAMPLE TITLE 6</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, doloribus!</p>
        </div>
      </div>
    </div>
  </section>
  

  <!------- SOCIAL MEDIA (OPTIONAL)-------->
  <section id="social-media">
    <div class="container text-center">
      <p>FIND US ON SOCIAL MEDIA</p>
       <div class="social-icons">
         <a href="#"><img src="/Images/Logo/facebook-icon.png" alt=""></a>
         <a href="#"><img src="/Images/Logo/twitter-icon.png" alt=""></a>
         <a href="#"><img src="/Images/Logo/instagram-icon.png" alt=""></a>
       </div>
    </div>
  </section>
@endsection
