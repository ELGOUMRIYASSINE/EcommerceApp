<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a href="{{ asset('admin/index.html') }}">
        <img src="{{ asset('admin/assets/images/logo-mini.png') }}" style="height: 120px;" alt="logo" />
      </a>
      <a class="sidebar-brand brand-logo-mini" href="{{ asset('admin/index.html') }}">
        <img src="{{ asset('admin/assets/images/logo-mini.png') }}" alt="logo" />
      </a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle" src="{{ asset('admin/assets/images/faces/face15.jpg') }}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
              <span>Gold Member</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ asset('admin/index.html') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('products.index') }}">
            <span class="menu-icon">
                <i class="mdi mdi-package-variant"></i>
            </span>
            <span class="menu-title">Products</span>
        </a>
    </li>


      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('products.create') }}">
            <span class="menu-icon">
                <i class="mdi mdi-cart-plus"></i> <!-- Alternative icon -->
            </span>
            <span class="menu-title">Add Product</span>
        </a>
    </li>

      <li class="nav-item menu-items">
        <a class="nav-link active" href="{{ route('admin.category') }}">
            <span class="menu-icon">
                <i class="mdi mdi-shape"></i>
            </span>
            <span class="menu-title">Category</span>
        </a>
    </li>

      <li class="nav-item menu-items">
        <a class="nav-link active" href="{{ route('orders') }}">
            <span class="menu-icon">
                <i class="mdi mdi-cart"></i>
            </span>
            <span class="menu-title">Orders</span>
        </a>
    </li>





    </ul>
</nav>
