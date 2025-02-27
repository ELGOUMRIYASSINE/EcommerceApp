

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">  <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style>
        /* 🌗 GENERAL STYLES */
body {
    background-color: #121212; /* Dark background */
    color: #ffffff; /* White text */
}

/* 🏛️ MAIN PANEL */
.main-panel {
    background-color: #1e1e1e; /* Dark gray panel */
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
    padding: 20px;
}

/* 📜 NAVBAR */
.navbar {
    background-color: #222; /* Dark navbar */
    color: #fff;
}

.navbar a {
    color: #ddd !important;
}

/* 📂 SIDEBAR */
.sidebar {
    background-color: #181818; /* Dark sidebar */
    color: white;
    height: 100vh;
}

.sidebar a {
    color: #aaa !important;
}

.sidebar a:hover {
    background-color: #333;
    color: white !important;
}

/* 🏛️ TABLE */
.table {
    background-color: #222;
    color: white;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(255, 255, 255, 0.1);
}

.table th {
    background-color: #333;
    color: #ffcc00; /* Yellow text for better visibility */
}

.table td {
    color: #ddd;
}

/* 🎨 BUTTONS */
.btn {
    border-radius: 5px;
}

.btn-info {
    background-color: #17a2b8;
    border-color: #17a2b8;
}

.btn-warning {
    background-color: #ffcc00;
    border-color: #ffcc00;
    color: black;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

/* 🌗 LIGHT MODE OPTION */
.light-mode {
    background-color: #f8f9fa;
    color: #333;
}

.light-mode .main-panel {
    background-color: white;
}

.light-mode .table {
    background-color: white;
    color: black;
}

.light-mode .navbar {
    background-color: white;
    color: black;
}

.light-mode .sidebar {
    background-color: #f1f1f1;
    color: black;
}

.light-mode .sidebar a {
    color: black !important;
}

.light-mode .btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
    color: black;
}

    </style>



  </head>
  <body>

    <div class="container-scroller">



      @yield('content')


    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>

    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->

















  </body>
</html>

