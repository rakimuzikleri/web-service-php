<div class="navbar navbar-fixed-top navbar-primary main" role="navigation">

    <div class="navbar-header pull-left">
        <div class="navbar-brand">
            <div class="pull-left">
                <a href="" class="toggle-button toggle-sidebar btn-navbar"><i class="fa fa-bars"></i></a>
            </div>
            <a href="index.html?lang=en" class="appbrand innerL">Flat+</a>


        </div>
    </div>


    <ul class="nav navbar-nav navbar-right hidden-xs">
        <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ URL::asset('assets/images/lang/en-flat.jpg') }}"/></a>
            <ul class="dropdown-menu pull-right">
                <li class="active"><a href="">English</a></li>
                <li><a href="">Romanian</a></li>
            </ul>
        </li>
        <li><a href="{{ Route('admin-log-out') }}" class="menu-icon"><i class="fa fa-sign-out"></i></a></li>
    </ul>
</div>


<div id="menu" class="hidden-print hidden-xs">
    <div class="sidebar sidebar-inverse">
        <div class="user-profile media innerAll">
            <a href="" class="pull-left"><img src="{{ URL::asset('assets/images/people/50/8.jpg') }}" alt="" class="img-circle"><span
                        class="badge badge-primary">2</span></a>

            <div class="media-body">
                <a href="" class="strong">Adrian Demian</a>

                <p class="text-success"><i class="fa fa-fw fa-circle"></i> Online</p>
            </div>
            <ul>
                <li class="active"><a href=""><i class="fa fa-fw fa-user"></i></a></li>
                <li><a href=""><i class="fa fa-fw fa-envelope"></i></a></li>
                <li><a href=""><i class="fa fa-fw fa-lock"></i></a></li>
            </ul>
        </div>
        <div class="sidebarMenuWrapper">
            <ul class="list-unstyled">
                <li><a href="{{Route('add-song')}}"><i class=" icon-projector-screen-line"></i><span>Ekle</span></a>
                </li>
                <li><a href="{{Route('edit-songs')}}"><i class=" icon-projector-screen-line"></i><span>Düzenle</span></a>
                </li>
                <li class="hasSubmenu">
                    <a href="#" data-target="#menu-style" data-toggle="collapse"><i class="icon-compose"></i><span>Menu &amp; Navbar</span></a>
                    <ul class="collapse" id="menu-style">
                        <li><a href="index.html?lang=en&amp;	sidebar_style=inverse"><span
                                        class="pull-right badge badge-primary"><i class="fa fa-check"></i></span>Sidebar
                                Menu Dark</a></li>
                    </ul>
                </li>

            </ul>
            </li>

            </ul>
        </div>
    </div>
</div>