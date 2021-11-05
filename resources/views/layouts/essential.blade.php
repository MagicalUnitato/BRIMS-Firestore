<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>BRIMS | Home</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @yield('styles')
</head>
<body>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#"><img src="{{ asset('images/Logo/seal.png') }}" alt="AdDU Logo"></a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= url('/'); ?>"><b>HOME</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= url('/about'); ?>">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= url('/stats'); ?>">STATISTICS</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= url('/heatmap'); ?>">HEAT MAP</a>
                </li>
                </ul>
            </div>
            </nav>
    </section>
    @yield('content')
    <section id="footer">
    <img src="{{ asset('images/icons/wave2.png') }}" alt="" class="footer-img">
    <div class="container">
        <div class="row">
        <div class="col-md-6 footer-box text-center">
            <img src="{{ asset('images/Logo/arisen-white.png') }}">
            <p>Copywrite © 2021 | ARISEn Laboratory</p>
        </div>
        <div class="col-md-6 footer-box">
            <p><b>CONTACT US</b></p>
            <p><i class="fa fa-map-marker"></i> Jacinto Street, Davao City, 8000 Davao del Sur, Philippines</p>
            <p><i class="fa fa-phone"></i>+63 9123456789</p>
            <p><i class="fa fa-envelope"></i>arisen.lab@addu.edu.ph</p>
        </div>
        </div>
    </div>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@yield('scripts')
</body>
</html>