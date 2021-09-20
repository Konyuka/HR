<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="">
                    <a href=""><span></span></a>
                </li>
                <li class="{{ Request::routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}"><i class="la la-dashboard"></i> <span>Home</span></a>
                </li>
                <li class="submenu">
                    <a href="" class=" " ><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li ><a class="{{ Request::routeIs('employee.import') ? 'active' : '' }}"
                                href="{{route('employee.import')}}">Import From File</a></li>
                        <li ><a class="{{ Request::routeIs('employee.create') ? 'active' : '' }}"
                                href="{{route('employee.create')}}">Add New Employee</a></li>
                        <li ><a class="{{ Request::routeIs('employee.list') ? 'active' : '' }}"
                                href="{{route('employee.list')}}">List All</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li ><a class="{{ Request::routeIs('payroll.import') ? 'active' : '' }}"
                                href="{{route('payroll.import')}}"> Upload Payroll </a></li>
                        <li ><a class="{{ Request::routeIs('payrolls.view') ? 'active' : '' }}"
                                href="{{route('payrolls.view')}}"> View Uploaded Payrolls </a></li>
                    </ul>
                </li>

                <li >
                    <a href="{{route('user.changepass')}}" class="{{ Request::routeIs('user.changepass') ? 'active' : '' }}">
                        <i class="la la-lock"></i> <span>Change Password</span> 
                    </a>
                </li>
                <li class="">
                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="la la-unlock"></i> <span>Log Out</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
    </div>
</div>