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
                <a href="/admin"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if(Request::is('admin')) active @endif">
                <a href="/admin"><i class="fa fa-home"></i> <span>Home</span></a>
            </li>

            @can('read_users')
            <li class="@if(Request::is('admin/user')) active @endif">
                <a href="/admin/user"><i class="fa fa-users"></i> <span>Users</span></a>
            </li>
            @endcan

            @can('read_roles')
            <li class="@if(Request::is('admin/role')) active @endif">
                <a href="/admin/role"><i class="fa fa-cubes"></i> <span>Roles</span></a>
            </li>
            @endcan

            <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul>
    </section>

</aside>