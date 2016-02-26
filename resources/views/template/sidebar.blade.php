<aside class="main-sidebar">

    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="fa fa-bars"></span>
    </a>

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="{{ Auth::user()->name }}">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="{{ url('/admin') }}"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if(Request::is('admin')) active @endif">
                <a href="{{ url('/admin') }}"><i class="fa fa-home"></i> <span>Home</span></a>
            </li>

            @can('read_files')
                <li class="@if(Request::is('admin/file-browser')) active @endif">
                    <a href="{{ url('/admin/file-browser') }}"><i class="fa fa-cloud"></i> <span>File Browser</span></a>
                </li>
            @endcan

            @can('read_users')
                <li class="@if(Request::is('admin/user')) active @endif">
                    <a href="{{ url('/admin/user') }}"><i class="fa fa-users"></i> <span>Users</span></a>
                </li>
            @endcan

            @can('read_roles')
            <li class="@if(Request::is('admin/role')) active @endif">
                <a href="{{ url('/admin/role') }}"><i class="fa fa-cubes"></i> <span>Roles</span></a>
            </li>
            @endcan

            <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul>
    </section>

</aside>