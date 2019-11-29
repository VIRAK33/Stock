<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="eBusiness Laravel Admin Pancel by Vdoo">
    <meta name="author" content="Vongkol">
    <meta name="keyword" content="Vdoo,eBusiness, Admin Panel">
    <title>eBusiness Admin</title>
    <!-- Icons-->
    <script src="https://kit.fontawesome.com/e0e3df89a5.js" crossorigin="anonymous"></script>

    <link href="{{asset('admin-assets/vendors/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/vendors/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/vendors/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{asset('admin-assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/vendors/pace-progress/css/pace.min.css')}}" rel="stylesheet">
    @yield('css')
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{asset('admin-assets/img/brand/logo.svg')}}" 
            width="89" height="25" alt="eBusiness">
        <img class="navbar-brand-minimized" src="{{asset('admin-assets/img/brand/sygnet.svg')}}" 
            width="30" height="30" alt="eBusiness">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <ul class="nav navbar-nav ml-auto">
        
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="{{asset('admin-assets/img/avatars/6.jpg')}}">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{url('admin/logout')}}">
              <i class="fa fa-lock"></i> Logout</a>
          </div>
        </li>
      </ul>
      
    </header>

    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="nav-icon icon-speedometer"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/slide')}}">
                <i class="nav-icon icon-star text-success"></i> Slideshow
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/about')}}">
                <i class="nav-icon icon-question text-warning"></i> About
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('service.index')}}">
                <!-- <i class="nav-icon fas fa-globle text-primary"></i>--> <span class="text-success"><i class="fas fa-globe">&nbsp;&nbsp;&nbsp;&nbsp;</i></span>Service</a> 
            </li>
            <li class="nav-item">
              <a href="{{url('admin/team')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i> Team
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/news')}}" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i> News
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/category')}}" class="nav-link">
                <i class="nav-icon icon-list"></i> Category
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/portfolios')}}" class="nav-link">
                <i class="nav-icon icon-list"></i> Portfolios
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/fileman')}}" class="nav-link">
                <i class="nav-icon icon-list"></i> File Manager
              </a>
            </li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-puzzle"></i> Base</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="base/breadcrumb.html">
                    <i class="nav-icon icon-puzzle"></i> Breadcrumb</a>
                </li>
                
              </ul>
            </li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">
        <div class="container-fluid">
          <div class="animated fadeIn">
            @yield('content')
          </div>
        </div>
      </main>
    </div>
    <footer class="app-footer">
      <div>
        eBusiness Admin
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="#">Virak</a>
      </div>
    </footer>

    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('admin-assets/vendors/jquery/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/popper.js/js/popper.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/pace-progress/js/pace.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/@coreui/coreui/js/coreui.min.js')}}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{asset('admin-assets/js/main.js')}}"></script>
    @yield('js')
  </body>
</html>
