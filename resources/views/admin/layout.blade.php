

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
/* 🌑 Dark mode (default) */
body, .container-scroller {
    background-color: #2c2f38 !important;
    color: #f0f0f0;
}

.main-panel, .content-wrapper {
    background-color: transparent !important; /* Prevents conflicts */
}

/* 📂 Sidebar & 📜 Navbar */
.sidebar, .navbar {
    background-color: #24292f;
    color: #e0e0e0;
}

.sidebar a {
    color: #b0b0b0 !important;
}

.sidebar a:hover {
    background-color: #333e48;
    color: #fff !important;
}

/* 🏛️ Tables */
.table {
    background-color: #2c2f38 !important;
    color: #f0f0f0;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
}

.table th {
    background-color: #444c56;
    color: #ffcc00;
}

.table td {
    color: #bbb;
}

/* 🎨 Buttons */
.btn {
    border-radius: 5px;
}

.btn-warning {
    background-color: #fbc02d;
    border-color: #fbc02d;
    color: black;
}

.btn-danger {
    background-color: #d9534f;
    border-color: #d9534f;
}


    /* 🌗 LIGHT MODE OPTION */
    .light-mode {
        background-color: #f8f9fa;
        color: black;
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
        background-color: #e0e0e0;
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
    <script>

        function redirectToOrder(row) {
            var orderId = row.getAttribute("data-id");
            window.location.href = `/show_order/${orderId}`;
        }



        
    function toggleFileInput() {
        const isDigital = document.getElementById('is_digital').value;
        const fileInputGroup = document.getElementById('file_input_group');
        if (isDigital == '1') {
            fileInputGroup.style.display = 'block'; // Show file input
        } else {
            fileInputGroup.style.display = 'none'; // Hide file input
        }
    }




    </script>

















  </body>
</html>

