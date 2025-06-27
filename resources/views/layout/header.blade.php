<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>GenZ</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

      <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">

      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">

      

      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

      
   </head>
<!-- <div class="container-fluid p-0">
    <div class="alert text-center py-4 m-0 rounded-0 border-0 shadow-sm"
         style="background: linear-gradient(135deg, #fdc001, #fff7d1); position: relative; overflow: hidden; color: #363636;">

        <h4 class="fw-bold mb-2" style="font-size: 1.8rem;">
            <i class="fas fa-map-marker-alt me-2 text-danger"></i> Available Cities
        </h4>

        <p class="fs-5 mb-0 fw-semibold">
            CareMitra provides services in <strong>Anand, Nadiad, Petlad, and Borsad</strong>.
        </p>
    </div>
</div> -->
<script>
   document.addEventListener('DOMContentLoaded', function () {
      const searchIcon = document.querySelector('.fa-search');
      const searchBar = document.getElementById('search-bar');

      searchIcon.addEventListener('click', function () {
         searchBar.classList.toggle('d-none');
      });
   });
</script>

 <style>
         .header-area {
         background-color: #ffffff;
         z-index: 999;
         position: relative;
         box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      }
      .search-bar {
   position: absolute;
   top: 100%;
   right: 10px;
   background: white;
   padding: 10px;
   border: 1px solid #ccc;
   border-radius: 6px;
   box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
   z-index: 9999;
}

   </style>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <!-- <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div> -->
      <!-- end loader -->
      <div class="full_bg">
         <!-- header -->
         <header class="header-area">
            <div class="container">
               <div class="row d_flex">
                  <div class=" col-md-3 col-sm-3">
                     <div class="logo">
                        <a href="index">GenZ</a>
                     </div>
                  </div>
                  <div class="col-md-9 col-sm-9">
                     <div class="navbar-area">
                        <nav class="site-navbar">
                        <ul>
   <li><a class="{{ request()->routeIs('homepage') ? 'active' : '' }}" href="{{ route('homepage') }}">Home</a></li>
   <li><a class="{{ request()->routeIs('aboutpage') ? 'active' : '' }}" href="{{ route('aboutpage') }}">About</a></li>

   <li class="nav-item dropdown">
      @php 
         $services = \App\Models\Services1::all();
      @endphp
      <a class="nav-link {{ request()->routeIs('service.show') || request()->is('service') ? 'active' : '' }}" href="service" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Services <i class="fa fa-angle-down" aria-hidden="true"></i>
      </a>
      <div class="dropdown-menu" aria-labelledby="servicesDropdown">
         @foreach($services as $service)
            <a href="{{ route('service.show', $service->id) }}" class="dropdown-item haircuts">{{ $service->service_name }}</a>
         @endforeach
      </div>
   </li>

   <li><a class="{{ request()->routeIs('blogpage') ? 'active' : '' }}" href="{{ route('blogpage') }}">Blog</a></li>
   <li><a class="{{ request()->routeIs('appointment') ? 'active' : '' }}" href="{{ route('appointment') }}">Appointment</a></li>
   <li><a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact us</a></li>

   <li class="nav-item">
      <a href="{{ route('cart.show') }}" class="nav-link">
         🛒 Cart ({{ session('cart') ? count(session('cart')) : 0 }})
      </a>
   </li>

   <li class="nav-item dropdown" style="padding-right: 50px;">
      <a class="nav-link" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-user-circle" aria-hidden="true"></i>
      </a>
      <div class="dropdown-menu" aria-labelledby="profileDropdown">
         @guest
            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
            <a class="dropdown-item" href="{{ route('signuppage') }}">Signup</a>
         @else
            <a class="dropdown-item" href="{{ route('editprofile') }}">Edit Profile</a>
            <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button type="submit" class="dropdown-item">Logout</button>
            </form>
         @endguest
      </div>
   </li>

   <li class="d_none"><a href="Javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a></li>
   <div id="search-bar" class="search-bar d-none">
   <input type="text" placeholder="Search..." class="form-control" />
</div>

</ul>

                           <button class="nav-toggler">
                           <span></span>
                           </button>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </header>