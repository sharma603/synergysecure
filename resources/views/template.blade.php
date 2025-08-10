<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ScriptQube</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_template_assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_template_assets/vendors/css/vendor.bundle.base.css')}}">
    
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin_template_assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_template_assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_template_assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_template_assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin_template_assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin_template_assets/images/favicon.png')}}" />

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- google font icon cdn -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<!-- Ajax CDN -->
    <!-- Include jQuery library from CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- sweet alert cdn -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <!-- Flatpickr date/time picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Nepali Clander css -->
    <link href="{{ asset('admin_lang/common/nepali_date/nepali.datepicker.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('admin_lang/common/nepali_date/nepali.datepicker.js')}}" type="text/javascript"></script>

    @section('script')
    <script>
        $(document).ready(function() {
            // Ensure Role & Permission submenu stays open when on those pages, but not on dashboard
            if ((window.location.pathname.includes('/roles') || 
                window.location.pathname.includes('/permissions') || 
                window.location.pathname.includes('/users')) && 
                !window.location.pathname.includes('/dashboard')) {
                $('#role-permission').addClass('show');
                $('[href="#role-permission"]').attr('aria-expanded', 'true');
            }
        });
    </script>
    @yield('additional_scripts')
    @endsection



    <style>
      .form-control{
          color:white !important;
      }
      
      /* Highlight important menu items */
      .highlight-menu {
        border-left: 3px solid #0090e7 !important;
      }
      
      .highlight-submenu {
        color: #0090e7 !important;
        font-weight: bold !important;
      }

      /* Sidebar profile card enhancements */
      .sidebar #sidebar .profile-desc,
      #sidebar .profile-desc {
        background: linear-gradient(180deg, rgba(32,35,46,0.95) 0%, rgba(25,28,36,0.95) 100%);
        border: 1px solid #2c2e33;
        border-radius: 12px;
        padding: 14px 12px;
        margin: 8px 12px 6px 12px;
      }
      #sidebar .profile-pic img {
        border: 2px solid #2c2e33;
      }
      #sidebar .profile-name h5 {
        color: #e9ecef;
        letter-spacing: .2px;
      }
      #sidebar .profile-badge {
        display: inline-block;
        padding: 2px 8px;
        margin-top: 4px;
        background: rgba(0,144,231,.12);
        color: #8dd0ff;
        border: 1px solid rgba(0,144,231,.25);
        border-radius: 999px;
        font-size: 12px;
      }

      /* Brand text styles */
      .brand-text {
        font-weight: 700;
        letter-spacing: 0.35rem;
        color: #ffffff !important;
        text-transform: uppercase;
        font-size: 1.4rem;
      }
      .brand-text-mini {
        font-weight: 800;
        color: #ffffff !important;
        font-size: 1.1rem;
      }

      /* Global responsive helpers */
      html, body { overflow-x: hidden; }
      .page-body-wrapper { overflow-x: hidden; }

      @media (max-width: 991.98px) { /* md/lg breakpoint */
        .brand-text { letter-spacing: 0.25rem; font-size: 1.2rem; }
        .brand-text-mini { font-size: 1rem; }
        .content-wrapper { padding: 0.75rem !important; }
        .navbar .search { display: none !important; }
      }

      @media (max-width: 767.98px) { /* sm breakpoint */
        #sidebar .menu-title { font-size: 0.95rem; }
        #sidebar .menu-icon { margin-right: .5rem; }
        .card-header, .card-body { padding: .75rem 1rem; }
        .navbar-profile-name { max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
      }

      @media (max-width: 575.98px) { /* xs phones */
        .brand-text { letter-spacing: 0.18rem; font-size: 1.05rem; }
        .brand-text-mini { font-size: .95rem; }
        .content-wrapper .table { display: block; width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; }
        .content-wrapper .table td, .content-wrapper .table th { white-space: nowrap; }
        .modal-dialog { max-width: calc(100% - 1rem); margin: .5rem auto; }
      }
    </style>

  </head>
  <body>
    @php
      $currentUser = Auth::guard('register')->user() ?: Auth::guard('web')->user();
      $navbarMessages = $navbarMessages ?? [];
      $navbarNotifications = $navbarNotifications ?? [];
    @endphp
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo text-decoration-none" href="{{ route('add-company') }}"><span class="brand-text">SYNERGY</span></a>
          <a class="sidebar-brand brand-logo-mini text-decoration-none" href="{{ route('add-company') }}"><span class="brand-text-mini">S</span></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="{{ asset('admin_template_assets/images/faces/face15.jpg')}}" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">{{ $currentUser->name ?? 'User' }}</h5>
                  <span class="profile-badge">{{ $currentUser->email ?? 'Member' }}</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
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
                      <i class="mdi mdi-onepassword  text-info"></i>
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
            <a class="nav-link {{ Request::is('add-company') ? 'active' : '' }}" href="{{ route('add-company') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-chart-bar"></i>
                </span>
                <span class="menu-title">Add Company</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link {{ Request::is('reminders') || Request::is('reminders/*') ? 'active' : '' }}" href="{{ route('reminders.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-bell-ring"></i>
                </span>
                <span class="menu-title">Reminders</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            @php $rpActive = (Request::is('roles*') || Request::is('permissions*') || Request::is('users*')); @endphp
            <a class="nav-link {{ $rpActive ? 'active highlight-menu' : '' }}" data-bs-toggle="collapse" href="#role-permission" aria-expanded="{{ $rpActive ? 'true' : 'false' }}" aria-controls="role-permission">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Role & Permission</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ $rpActive ? 'show' : '' }}" id="role-permission">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('roles') || Request::is('roles/index') ? 'active' : '' }}" href="{{ route('roles.index') }}">Manage Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link highlight-submenu {{ Request::is('users/create-sub') ? 'active' : '' }}" href="{{ route('users.create.sub') }}">Create Sub-User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}" href="{{ route('permissions.index') }}">Permissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">Manage Users</a>
                    </li>
                </ul>
            </div>
          </li>
          
         
         
        </ul>

        

      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="{{ route('add-company') }}"><img src="{{ asset('admin_template_assets/images/logo-mini.svg')}}" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <li class="nav-item dropdown border-left">
                 <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success">{{ count($navbarMessages) }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  @forelse($navbarMessages as $message)
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="{{ $message['avatar'] ?? asset('admin_template_assets/images/faces/face4.jpg') }}" alt="image" class="rounded-circle profile-pic">
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">{{ $message['title'] ?? ($message['text'] ?? 'New message') }}</p>
                        <p class="text-muted mb-0"> {{ $message['time'] ?? '' }} </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                  @empty
                    <div class="p-3 text-center text-muted small">No new messages</div>
                  @endforelse
                  @if(count($navbarMessages) > 0)
                    <p class="p-3 mb-0 text-center">{{ count($navbarMessages) }} new message{{ count($navbarMessages) > 1 ? 's' : '' }}</p>
                  @endif
                </div>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger">{{ count($navbarNotifications) }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  @forelse($navbarNotifications as $n)
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi {{ $n['icon'] ?? 'mdi-bell' }} {{ $n['icon_color'] ?? 'text-success' }}"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">{{ $n['title'] ?? 'Notification' }}</p>
                        <p class="text-muted ellipsis mb-0"> {{ $n['body'] ?? '' }} </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                  @empty
                    <div class="p-3 text-center text-muted small">No new notifications</div>
                  @endforelse
                  @if(count($navbarNotifications) > 0)
                    <p class="p-3 mb-0 text-center">{{ count($navbarNotifications) }} new notification{{ count($navbarNotifications) > 1 ? 's' : '' }}</p>
                  @endif
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="{{ asset('admin_template_assets/images/faces/face15.jpg')}}" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ $currentUser->name ?? 'User' }}</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item preview-item w-100 text-start">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-logout text-danger"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">Logout</p>
                      </div>
                    </button>
                  </form>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper p-2 p-md-4">

            @yield('contents')
          
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              {{-- <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © SimpleSchoolSoft.com 2024</span> --}}
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
    <script src="{{ asset('admin_template_assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin_template_assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admin_template_assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{ asset('admin_template_assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{ asset('admin_template_assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('admin_template_assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('admin_template_assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin_template_assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('admin_template_assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('admin_template_assets/js/misc.js')}}"></script>
    <script src="{{ asset('admin_template_assets/js/settings.js')}}"></script>
    <script src="{{ asset('admin_template_assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin_template_assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
    <script src="{{ asset('admin_lang/common/nepali_date/nepali.datepicker.js')}}" type="text/javascript"></script>
  
    @yield('script')
  </body>
</html>

