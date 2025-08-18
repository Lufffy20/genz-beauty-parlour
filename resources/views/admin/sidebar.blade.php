<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  
    <link href="{{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
      
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ url('/index') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"></i>Gen Z Admin</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                       
                    </div>

                </div>
                <div class="navbar-nav w-100">
                <a href="{{ url('/dashboard') }}" class="nav-item nav-link active">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                      <!-- Appointments -->
            <div class="nav-item dropdown">
            <a href="#appointmentsMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-calendar-alt me-2"></i>Appointments</a>
             <div class="dropdown-menu bg-transparent border-0" id="appointmentsMenu">
                <a href="{{ url('/appointmentview1') }}" class="nav-link ps-4">New Appointments</a>
                <a href="{{ url('/upcomingappointments1') }}" class="nav-link ps-4">Upcoming Appointments</a>
                <a href="{{ url('/complatedappointments1') }}" class="nav-link ps-4">Completed Appointments</a>
                <a href="{{ url('/cancellationsappointments1') }}" class="nav-link ps-4">Cancellations & Reschedules</a>
            </div>

            <div class="nav-item dropdown">
            <a href="#appointmentsMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-shopping-cart me-2"></i>Cart Bookings</a>
             <div class="dropdown-menu bg-transparent border-0" id="appointmentsMenu">
                <a href="{{ url('/allserviceshow') }}" class="nav-link ps-4">New Bookings</a>
                <!-- <a href="{{ url('/upcomingappointments') }}" class="nav-link ps-4">Upcoming Appointments</a> -->
                <a href="{{ url('/complatedservices') }}" class="nav-link ps-4">Completed Bookings</a>
                <a href="{{ url('/cancelledservices') }}" class="nav-link ps-4">Cancellations & Reschedules Bookings</a>
            </div>
                
                    <div class="nav-item dropdown">
            <a href="#vendorMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-store me-2"></i> Our Packages </a>
            <div class="dropdown-menu bg-transparent border-0" id="vendorMenu">
                <a href="{{ url('/addnewservice') }}" class="nav-link ps-4">Add New Packages</a>
                <a href="{{ url('/addservicesshow') }}" class="nav-link ps-4">Manage Packages</a>
                <!-- <a href="element.html" class="nav-link ps-4">Service Categories</a> -->
            </div>

            
            <div class="nav-item dropdown">
            <a href="#vendorMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-blog me-2"></i>Blogs </a>
            <div class="dropdown-menu bg-transparent border-0" id="vendorMenu">
                <a href="{{ url('/addblog') }}" class="nav-link ps-4">Add New Blogs</a>
                <a href="{{ url('/blogshow') }}" class="nav-link ps-4">Manage Blogs</a>
                <!-- <a href="element.html" class="nav-link ps-4">Service Categories</a> -->
            </div>
                    <!-- <a href="{{ url('/addblog') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Blogs</a>
                    <a href="{{ url('/blogshow') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Blogs</a> -->

                    <div class="nav-item dropdown">
            <a href="#vendorMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-keyboard me-2"></i>About </a>
            <div class="dropdown-menu bg-transparent border-0" id="vendorMenu">
                <a href="{{ url('/addabout') }}" class="nav-link ps-4"> Edit About</a>
                <a href="{{ url('/aboutshow') }}" class="nav-link ps-4">Update About</a>
                <!-- <a href="element.html" class="nav-link ps-4">Service Categories</a> -->
            </div>
                    <!-- <a href="{{ url('/addabout') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>About</a> -->
                    <!-- <a href="pricing" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Pricing</a>
                    <a href="customers" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Customers</a>
                    <a href="setting" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Setting</a> -->
                    <a href="setting" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Logout</a>

                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div> -->
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="{{ url('/index') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <!-- Sidebar Toggle -->
<a href="#" class="sidebar-toggler flex-shrink-0" data-bs-toggle="dropdown">
    <i class="fa fa-bars"></i>
</a>

<!-- Dropdown Menu -->
<!-- <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Option 1</a></li>
    <li><a class="dropdown-item" href="#">Option 2</a></li>
    <li><a class="dropdown-item" href="#">Option 3</a></li>
</ul> -->

                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="{{ asset('admin/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-lg-2" src="{{ asset('admin/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="{{ asset('admin/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="admin/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Meet</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="{{ url('/logout') }}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->