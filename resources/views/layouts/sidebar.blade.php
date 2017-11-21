<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/img/{{Auth::user()->image}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p class="p">{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="/">
                    <i class="fa  fa-tachometer"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green">1</small>
            </span>
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="/">--}}
                    {{--<i class="fa  fa-tachometer"></i> <span>Admin</span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<small class="label pull-right bg-green">1</small>--}}
            {{--</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--Sidebar_Project_Menu--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>My Projects</span>
                    <span class="pull-right-container">
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('project.index')}}"><i class="fa fa-plus-circle "></i> Create New Project</a></li>
                    <li><a href="{{route('project.myProject')}}"><i class="fa fa-list"></i> My Projects</a></li>
                </ul>
            </li>

            {{--Sidebar_User_Menu--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>User</span>
                    <span class="pull-right-container">
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.create')}}"><i class="fa fa-plus-circle "></i> Add</a></li>
                    <li><a href="{{route('user.index')}}"><i class="fa fa-list-ul"></i> List All</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>