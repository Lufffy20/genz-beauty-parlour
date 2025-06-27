<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Vendor Panel</title>
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
  
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{asset('admin1/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin1/css/bootstrap.min.css')}}" rel="stylesheet">


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
     <!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ url('/index') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Gen Z Vendor</h3>
        </a>

        <div class="navbar-nav w-100">
            <a href="{{ url('/dashboard1') }}" class="nav-item nav-link active">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <!-- Appointments -->
            <div class="nav-item dropdown">
            <a href="#appointmentsMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-calendar-alt me-2"></i>Appointments</a>
             <div class="dropdown-menu bg-transparent border-0" id="appointmentsMenu">
                <a href="{{ url('/appointmentview') }}" class="nav-link ps-4">New Appointments</a>
                <a href="{{ url('/upcomingappointments') }}" class="nav-link ps-4">Upcoming Appointments</a>
                <a href="{{ url('/complatedappointments') }}" class="nav-link ps-4">Completed Appointments</a>
                <a href="{{ url('/cancellationsappointments') }}" class="nav-link ps-4">Cancellations & Reschedules</a>
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

            <!-- Vendor -->
            <!-- Vendor -->
            <div class="nav-item dropdown">
            <a href="#vendorMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-store me-2 "></i>Packages</a>
            <div class="dropdown-menu bg-transparent border-0" id="vendorMenu">
                <a href="{{ url('/addnewservice') }}" class="nav-link ps-4">Add New Package</a>
                <a href="{{ url('/addservicesshow') }}" class="nav-link ps-4">Manage Package</a>
                <!-- <a href="" class="nav-link ps-4">Package Categories</a> -->
            </div>

               <!-- Staff Management -->
               <div class="nav-item dropdown">
            <a href="#staffMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-user-tie me-2"></i> Staff Management</a>
            <div class="dropdown-menu bg-transparent border-0" id="staffMenu">
                <a href="{{ url('/addspecialist') }}" class="nav-link ps-4">Add Staff Members</a>
                <a href="{{ url('/addspecialistshow') }}" class="nav-link ps-4">Show All Staff Members</a>
                <a href="{{ url('/staffavailability') }}" class="nav-link ps-4">Staff Availability</a>
            </div>


            <a href="{{ url('/showlocation') }}" class="nav-item nav-link">
                <i class="fa fa-store me-2"></i>Stores
            </a>
                        <!-- Customers
                        <div class="nav-item dropdown">
            <a href="#customersMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-users me-2"></i>Customers </a>
            <div class="dropdown-menu bg-transparent border-0" id="customersMenu">
                <a href="button.html" class="nav-link ps-4">Customer List</a>
                <a href="typography.html" class="nav-link ps-4">Customer Profiles</a>
                <a href="element.html" class="nav-link ps-4">Feedback & Ratings</a>
            </div> -->



                      <!-- Payments -->
                      <!-- <div class="nav-item dropdown">
            <a href="#paymentsMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-wallet me-2"></i>Payments & Earnings </a>
            <div class="dropdown-menu bg-transparent border-0" id="paymentsMenu">
                <a href="addnewservices" class="nav-link ps-4">Transactions</a>
                <a href="{{ url('/addnewlocation') }}" class="nav-link ps-4">Add new location</a>
                <a href="{{ url('/showlocation') }}" class="nav-link ps-4">Earnings Reports</a>
            </div> -->



            <!-- Offers -->
            <!-- <div class="nav-item dropdown">
            <a href="#offersMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-gift me-2"></i>Offers & Discounts</a>
            <div class="dropdown-menu bg-transparent border-0" id="offersMenu">
                <a href="button.html" class="nav-link ps-4">Create Promo Codes</a>
                <a href="typography.html" class="nav-link ps-4">Manage Discounts</a>
            </div> -->



                  <!-- Reports -->
                  <!-- <div class="nav-item dropdown">
            <a href="#reportsMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-chart-line me-2"></i>Reports & Analytics</a>
            <div class="dropdown-menu bg-transparent border-0" id="reportsMenu">
                <a href="button.html" class="nav-link ps-4">Sales Reports</a>
                <a href="typography.html" class="nav-link ps-4">Appointment Stats</a>
                <a href="element.html" class="nav-link ps-4">Performance Analysis</a>
            </div> -->


              <!-- Store Settings -->
              <!-- <div class="nav-item dropdown">
              <a href="#storeMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <i class="fa fa-chart-line me-2"></i>Store Settings</a>

              <div class="dropdown-menu bg-transparent border-0" id="reportsMenu">
                <a href="{{ url('/settings') }}" class="nav-link ps-4">Parlour Profile</a>
                <a href="typography.html" class="nav-link ps-4">Working Hours</a>
                <a href="element.html" class="nav-link ps-4">Pricing & Packages</a>
                <a href="element.html" class="nav-link ps-4">Contact Info</a>
            </div> -->


          <!-- Support -->
          <!-- <div class="nav-item dropdown">
            <a href="#supportMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-headset me-2"></i>Support & Messages</a>
            <div class="dropdown-menu bg-transparent border-0" id="supportMenu">
                <a href="button.html" class="nav-link ps-4">Customer Inquiries</a>
                <a href="typography.html" class="nav-link ps-4">Vendor Support Chat</a>
            </div> -->


             <!-- Reviews -->
             <!-- <div class="nav-item dropdown">
            <a href="#reviewsMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-star me-2"></i>Reviews & <br> Feedback 
            </a>
            <div class="dropdown-menu bg-transparent border-0" id="reviewsMenu">
                <a href="button.html" class="nav-link ps-4">Customer Reviews</a>
                <a href="typography.html" class="nav-link ps-4">Reply to Feedback</a>
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
<!-- <a href="#" class="sidebar-toggler flex-shrink-0" data-bs-toggle="dropdown">
    <i class="fa fa-bars"></i>
</a> -->

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
                                    <!-- <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div> -->
                                </div>
                            </a>
                            <!-- <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div> -->
                            <!-- </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a> -->
                            <!-- <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a> -->
                        </div>
                    </div>
                    <div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fa fa-bell me-lg-2"></i>
        <span class="d-none d-lg-inline-flex">Notifications</span>
    </a>
    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
        <a href="#" class="dropdown-item">Profile updated</a>
        <hr class="dropdown-divider">
        <a href="#" class="dropdown-item">New user added</a>
        <hr class="dropdown-divider">
        <a href="#" class="dropdown-item">Password changed</a>
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