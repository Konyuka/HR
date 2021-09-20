 <!-- Header -->
 <div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="#" class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" height="40" alt="">
        </a>
    </div>
    <!-- /Logo -->

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box">
        <h3>SmartHR Payroll System</h3>
    </div>
    <!-- /Header Title -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img src="{{ asset('assets/img/logo2.png') }}" alt="">
                    <span class="status online"></span></span>
                <span> {{ Auth::user()->name }}</span>
            </a>
           
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-ellipsis-v"></i></a>       
    </div>
    <!-- /Mobile Menu -->

</div>
<!-- /Header -->
