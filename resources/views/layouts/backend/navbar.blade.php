<header class="main-header">
  <!-- Logo -->
  <a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Y</b>M</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>YCL</b>MRL</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a> -->

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <?php $currentUser = Auth::user() ?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ $currentUser->gravatar() }}" class="user-image" alt="{{ $currentUser->name }}">
            <span class="hidden-xs">{{ $currentUser->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ $currentUser->gravatar() }}" class="img-circle" alt="User Image">

              <p>
                {{ $currentUser->name }} - {{ $currentUser->roles->first()->display_name }}
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ url('/edit-account') }}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
