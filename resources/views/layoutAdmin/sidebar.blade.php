<nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="bg-header-dark">
                    <div class="content-header bg-white-10">
                        <!-- Logo -->
                        <a href="{{route('dashboard')}}"  class="font-w600 text-white tracking-wide">
                            <span class="smini-visible">
                                D<span class="opacity-75">x</span>
                            </span>
                            <span class="smini-hidden">
                                MIE <span class="opacity-75">Consultent</span>
                            </span>
                        </a>
                        <!-- END Logo -->

                        <!-- Options -->
                        <div>
                            <!-- Toggle Sidebar Style -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                            <a  class="js-class-toggle text-white-75 js-class-toggle-enabled" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');" href="javascript:void(0)">
                                <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                            </a>
                            <!-- END Toggle Sidebar Style -->

                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                    <!-- Side Navigation -->
                    <div class="content-side">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="{{route('dashboard')}}">
                                    <i class="nav-main-link-icon fa fa-location-arrow"></i>
                                    <span class="nav-main-link-name">Dashboard</span>
                                </a>
                             </li>
                             <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">
                                    <i class="nav-main-link-icon fa fa-border-all"></i>
                                    <span class="nav-main-link-name">Slider </span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('slider.index')}}">
                                            <span class="nav-main-link-name">Add Slider</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('slider.table')}}">
                                            <span class="nav-main-link-name">View Sliders</span>
                                        </a>
                                    </li>




                                </ul>
                            </li>

                        </ul>

                                    <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">
                                    <i class="nav-main-link-icon fa-solid fa-globe"></i>
                
                                    <span class="nav-main-link-name">Country </span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('country.index')}}">
                                            <span class="nav-main-link-name">Add Country</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('country.show')}}">
                                            <span class="nav-main-link-name">View Country</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('country.des')}}">
                                            <span class="nav-main-link-name">Country Description</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('country.des.view')}}">
                                            <span class="nav-main-link-name"> View Country Description</span>
                                        </a>
                                    </li>

                              </ul>

                              <!-- new -->
                              <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">
                                    <i class="nav-main-link-icon fa fa-file-medical"></i>
                                    <i class=""></i>
                                    <span class="nav-main-link-name">All Pages</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('about.index')}}">
                                            <span class="nav-main-link-name">About Page</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('contact.show')}}">
                                            <span class="nav-main-link-name">Contact Us</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('site.visitor')}}">
                                            <span class="nav-main-link-name">Site Visitor</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('country.visitor')}}">
                                            <span class="nav-main-link-name">Country Visitor</span>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('about.view_Page')}}">
                                            <span class="nav-main-link-name">View About Page</span>
                                        </a>
                                    </li> -->




                                </ul>
                            </li>
                          
                             <!-- teams -->
                             <!-- <li class="nav-main-item">
                                <a class="nav-main-link active" href="{{route('team.index')}}">  
                                <i class="fa-solid fa-people-group"></i>
                                    <span class="nav-main-link-name">Teams</span>
                                </a>
                             </li>
                             <li class="nav-main-item">
                                <a class="nav-main-link active" href="{{route('team.show')}}">  
                                <i class="fa-solid fa-people-group"></i>
                                    <span class="nav-main-link-name">Team View</span>
                                </a>
                             </li> -->
                             <!-- team new -->
                             <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">
                                    <i class="nav-main-link-icon fa-solid fa-people-group"></i>
                                    <span class="nav-main-link-name">Teams</span>
                                    <i class=""></i>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('team.index')}}">
                                            <span class="nav-main-link-name">Add Team</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{route('team.show')}}">
                                            <span class="nav-main-link-name">View Team</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- setting -->
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="{{route('setting.index')}}">
                                    <i class="nav-main-link-icon fa-solid fa-key"></i>
                                    <!-- <i class="fa-solid fa-key"></i> -->
                                    <span class="nav-main-link-name">Settings</span>
                                </a>
                             </li>
                           
  </div>
                    <!-- END Side Navigation -->
                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 761px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 25px; transform: translate3d(0px, 11px, 0px); display: block;"></div></div></div>
                <!-- END Sidebar Scrolling -->
            </nav>
