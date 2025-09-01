<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

  <!-- Montserrat Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('admin1/css/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  @stack('styles')
</head>
<body>
  <div class="grid-container">

    <!-- Header -->
    <header class="header">
      <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
      </div>
      <div class="header-left"></div>
      <div class="header-right">
        <span class="material-icons-outlined">notifications</span>
        <span class="material-icons-outlined">email</span>
        <span class="material-icons-outlined">account_circle</span>
      </div>
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar">
      <div class="sidebar-title">
        <div class="sidebar-brand">
          <span class="material-icons-outlined">inventory</span> Beauty Parlour
        </div>
        <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
      </div>

      <ul class="sidebar-list">

        <!-- Dashboard -->
        <li class="sidebar-list-item">
          <a href="{{ url('/dashboard1') }}" class="nav-link">
            <span class="material-icons-outlined">dashboard</span> Dashboard
          </a>
        </li>

        <!-- Appointments -->
        <li class="sidebar-list-item">
          <a href="#appointmentsMenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <span class="material-icons-outlined">inventory_2</span> Appointments
          </a>
          <ul class="collapse list-unstyled ps-4" id="appointmentsMenu">
            <li><a href="{{ url('/appointmentview') }}" class="d-block py-1">New Appointments</a></li>
            <li><a href="{{ url('/upcomingappointments') }}" class="d-block py-1">Upcoming Appointments</a></li>
            <li><a href="{{ url('/complatedappointments') }}" class="d-block py-1">Completed Appointments</a></li>
            <li><a href="{{ url('/cancellationsappointments') }}" class="d-block py-1">Cancellations & Reschedules</a></li>
          </ul>
        </li>

        <!-- Cart Bookings -->
        <li class="sidebar-list-item">
          <a href="#cartBookingsMenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-shopping-cart me-2"></i> Cart Bookings
          </a>
          <ul class="collapse list-unstyled ps-4" id="cartBookingsMenu">
            <li><a href="{{ url('/allserviceshow') }}" class="d-block py-1">New Bookings</a></li>
            <li><a href="{{ url('/complatedservices') }}" class="d-block py-1">Completed Bookings</a></li>
            <li><a href="{{ url('/cancelledservices') }}" class="d-block py-1">Cancellations & Reschedules</a></li>
          </ul>
        </li>

        <!-- Packages -->
        <li class="sidebar-list-item">
          <a href="#vendorMenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-store me-2"></i> Packages
          </a>
          <ul class="collapse list-unstyled ps-4" id="vendorMenu">
            <li><a href="{{ url('/addnewservice') }}" class="d-block py-1">Add New Package</a></li>
            <li><a href="{{ url('/addservicesshow') }}" class="d-block py-1">Manage Package</a></li>
          </ul>
        </li>

        <!-- Staff Management -->
        <li class="sidebar-list-item">
          <a href="#staffMenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-user-tie me-2"></i> Staff Management
          </a>
          <ul class="collapse list-unstyled ps-4" id="staffMenu">
            <li><a href="{{ url('/addspecialist') }}" class="d-block py-1">Add Staff Members</a></li>
            <li><a href="{{ url('/addspecialistshow') }}" class="d-block py-1">Show All Staff Members</a></li>
            <li><a href="{{ url('/staffavailability') }}" class="d-block py-1">Staff Availability</a></li>
          </ul>
        </li>

        <!-- Customers -->
        <li class="sidebar-list-item">
          <a href="#customersMenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-users me-2"></i> Customers
          </a>
          <ul class="collapse list-unstyled ps-4" id="customersMenu">
            <li><a href="button.html" class="d-block py-1">Customer List</a></li>
            <li><a href="typography.html" class="d-block py-1">Customer Profiles</a></li>
            <li><a href="element.html" class="d-block py-1">Feedback & Ratings</a></li>
          </ul>
        </li>

        <!-- Payments -->
        <li class="sidebar-list-item">
          <a href="#paymentsMenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-wallet me-2"></i> Payments & Earnings
          </a>
          <ul class="collapse list-unstyled ps-4" id="paymentsMenu">
            <li><a href="addnewservices" class="d-block py-1">Transactions</a></li>
            <li><a href="{{ url('/addnewlocation') }}" class="d-block py-1">Add New Location</a></li>
            <li><a href="{{ url('/showlocation') }}" class="d-block py-1">Earnings Reports</a></li>
          </ul>
        </li>

        <!-- Offers -->
        <li class="sidebar-list-item">
          <a href="#offersMenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-gift me-2"></i> Offers & Discounts
          </a>
          <ul class="collapse list-unstyled ps-4" id="offersMenu">
            <li><a href="button.html" class="d-block py-1">Create Promo Codes</a></li>
            <li><a href="typography.html" class="d-block py-1">Manage Discounts</a></li>
          </ul>
        </li>

        <!-- Reports -->
        <li class="sidebar-list-item">
          <a href="#reportsMenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-chart-line me-2"></i> Reports & Analytics
          </a>
          <ul class="collapse list-unstyled ps-4" id="reportsMenu">
            <li><a href="button.html" class="d-block py-1">Sales Reports</a></li>
            <li><a href="typography.html" class="d-block py-1">Appointment Stats</a></li>
            <li><a href="element.html" class="d-block py-1">Performance Analysis</a></li>
          </ul>
        </li>

        <!-- Store Settings -->
        <li class="sidebar-list-item">
          <a href="#storeMenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-cog me-2"></i> Store Settings
          </a>
          <ul class="collapse list-unstyled ps-4" id="storeMenu">
            <li><a href="{{ url('/settings') }}" class="d-block py-1">Parlour Profile</a></li>
            <li><a href="typography.html" class="d-block py-1">Working Hours</a></li>
            <li><a href="element.html" class="d-block py-1">Pricing & Packages</a></li>
            <li><a href="element.html" class="d-block py-1">Contact Info</a></li>
          </ul>
        </li>

        <!-- Stores (Single link but styled like parent) -->
        <li class="sidebar-list-item">
          <a href="{{ url('/showlocation') }}" class="nav-link d-flex align-items-center">
            <i class="fa fa-store me-2"></i> Stores
          </a>
        </li>

      </ul>
    </aside>
    <!-- End Sidebar -->

    <!-- Main Content -->
    <main class="main-container p-4">
      @yield('main-section')
    </main>
    <!-- End Main Content -->
  </div>
  @stack('scripts')

</body>
</html>
