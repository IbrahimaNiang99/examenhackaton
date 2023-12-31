<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{('/dashboard/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{('dashboard/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{('/dashboard/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{('/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" type="text/css" href="{{('/dashboard/js/select.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{('/dashboard/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{('/dashboard/vendors/select2/select2.min.css')}}">
  <link rel="stylesheet" href="{{('/dashboard/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- End plugin css for this page 

-->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{('/dashboard/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{('/dashboard/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{ ('/dashboard/images/logo.svg') }}" class="mr-2" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" style="color: black;" href="#" data-toggle="dropdown" id="profileDropdown">
            {{ auth()->user()->name }}
              <img src="{{('/dashboard/images/faces/face28.jpg')}}" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"" >
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
            <i class="mdi mdi-home  menu-icon"></i>
              <span class="menu-title">Accueil</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('listecours') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Cours</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('listecalendrier') }}">
              <i class="mdi mdi-calendar-clock"> </i>
              <span class="menu-title"> Calendrier</span>
            </a>
          </li>
          @if(auth()->user()->profil == 'admin')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('listeprof') }}">
                <i class="mdi mdi-account-multiple-minus menu-icon"></i>
                <span class="menu-title">Professeur</span>
              </a>
            </li>
          @endif
          @if(auth()->user()->profil == 'admin')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('listeApprenant') }}">
                <i class="mdi mdi-calendar menu-icon"></i>
                <span class="menu-title">Apprenant</span>
              </a>
            </li>
            @endif
          @if(auth()->user()->profil == 'admin')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('listeutilisateur') }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Utilisateurs</span>
              </a>
            </li>
          @endif
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        @yield('content')
       </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{('/dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{('/dashboard/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{('/dashboard/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{('/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{('/dashboard/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{('/dashboard/js/off-canvas.js')}}"></script>
  <script src="{{('/dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{('/dashboard/js/template.js')}}"></script>
  <script src="{{('/dashboard/js/settings.js')}}"></script>
  <script src="{{('/dashboard/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{('/dashboard/js/dashboard.js')}}"></script>
  <script src="{{('/dashboard/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->
  <script src="{{('/dashboard/js/file-upload.js')}}"></script>
  <script src="{{('/dashboard/js/typeahead.js')}}"></script>
  <script src="{{('/dashboard/js/select2.js')}}"></script>
</body>

</html>

