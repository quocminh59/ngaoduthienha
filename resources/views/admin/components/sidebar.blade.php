<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown mt-3">
                        <div class="user-pic"><img src="{{ asset('xtreme/assets/images/users/1.jpg') }}"
                                alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu ml-2">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 user-name font-medium">Quan Minh <i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email">quocminh@gmail.com</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="ti-settings mr-1 ml-1"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                        class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="javascript:void(0)"
                    aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                        class="hide-menu">Dashboard
                    </span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ route('destination.index') }}"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Destination
                        </span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ route('type_tour.index') }}"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Type of tour
                        </span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ route('tour.index') }}"
                    aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                        class="hide-menu">Tour
                    </span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ route('contact.index') }}"
                    aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                        class="hide-menu">Contact
                    </span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ route('booking.index') }}"
                    aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                        class="hide-menu">Booking
                    </span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
