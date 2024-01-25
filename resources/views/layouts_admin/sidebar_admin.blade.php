<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            @if (session()->get('level') == 1)
                <h4 style="color:white;">Admin</h4>
            @else
                <h4 style="color:white;">Operator </h4>
            @endif
        </div>
    </div>
    <!-- class="active" -->
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                        <li class="{{$page=='dasboard' ? 'active' : '' }} ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Dashboard</span></a>
                            <ul class="collapse">
                                <li class="{{ $page=='dasboard' ? 'active' : '' }} "><a href="{{ url('/dashboard') }}"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                            </ul>    
                        </li>
                        <li class="{{ $page=='user' ? 'active' : '' }} ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Master</span>
                            </a>
                            <ul class="collapse">
                                <li class="{{ $page=='user'? 'active' : '' }} "><a href="{{ url('user') }}">User</a></li>
                            </ul>
                        </li>
                    <li class="{{$page=='Ppdb' ? 'active' : '' }} ">-->
                       <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Data Ppdb</span></a>
                       <ul class="collapse">
                           <li class="{{$page=='Ppdb' ? 'active' : '' }} "><a href="{{ url('/ppdb') }}">Data Ppdb</a></li>
                       </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>