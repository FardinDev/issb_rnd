<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('images/dashboard/logo.png') }}">
    <title>@yield('title')</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="se-pre-con"></div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow bg-royal header-text-light">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic is-active"
                            data-class="closed-sidebar" id="side-hamburger">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav active">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>



            <div class="app-header__content header-mobile-open">

                <div class="app-header-right">
                    <div class="header-dots">

                        {{-- <div class="dropdown">
                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
                                id="bell-btn" class="p-0 mr-2 btn btn-link">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                    <span class="icon-wrapper-bg bg-danger"></span>
                                    <i class="icon text-danger fa fa-bell" id="bell-icon"></i>
                                    <span class="badge badge-dot badge-dot-sm badge-danger"
                                        id="red-dot">Notifications</span>
                                </span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header mb-0">
                                    <div class="dropdown-menu-header-inner bg-heavy-rain">
                                        <div class="menu-header-image opacity-1"
                                            style="background-image: url('{{asset("/images/dashboard/city3.jpg")}}');">
                                        </div>
                                        <div class="menu-header-content text-dark">
                                            <h5 class="menu-header-title">Notifications</h5>
                                            <h6 class="menu-header-subtitle">You have <strong
                                                    id="notification-count">0</strong> unread notifications</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content">

                                    <div class="tab-pane active" id="tab-events-header" role="tabpanel">
                                        <div class="scroll-area-lg">
                                            <div class="scrollbar-container ps">
                                                <div class="p-3">
                                                    <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column"
                                                        id="notification-box">
                                                        <div class="no-results pt-3 pb-0">
                                                            <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                                                <span class="swal2-success-line-tip"></span>
                                                                <span class="swal2-success-line-long"></span>
                                                                <div class="swal2-success-ring"></div>
                                                                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                                                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                                            </div>
                                                            <div class="results-subtitle">All caught up!</div>
                                                            <div class="results-title">There are no new notifications</div>
                                                        </div>

                                                       


                                                    </div>
                                                </div>
                                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                    <div class="ps__thumb-x" tabindex="0"
                                                        style="left: 0px; width: 0px;"></div>
                                                </div>
                                                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                    <div class="ps__thumb-y" tabindex="0"
                                                        style="top: 0px; height: 0px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div> --}}

                    </div>

                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle"
                                                src="{{ Auth::user()->avatar == null ? asset('images/profile-images/default-image.png') : asset( Auth::user()->avatar) }}"
                                                alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right"
                                            x-placement="bottom-end"
                                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(60px, 44px, 0px);">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2"
                                                        style="background-image: url('{{asset("/images/dashboard/city3.jpg")}}');">
                                                    </div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle"
                                                                        src="{{ Auth::user()->avatar == null ? asset('images/profile-images/default-image.png') : asset( Auth::user()->avatar) }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">
                                                                        {{ Auth::user()->name }}
                                                                    </div>
                                                                    <div class="widget-subheading opacity-8">
                                                                        {{ Auth::user()->getRoleNames()[0] }}
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <button
                                                                        class="btn-pill btn-shadow btn-shine btn btn-danger"
                                                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                                        Logout
                                                                    </button>
                                                                    <form id="logout-form"
                                                                        action="{{ route('logout') }}" method="POST"
                                                                        style="display: none;">
                                                                        @csrf
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider nav-item">
                                                </li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <a class="btn-wide btn btn-primary btn-sm"
                                                        href="{{route('post.index')}}">
                                                        Open Posts
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="widget-subheading">
                                        {{ Auth::user()->getRoleNames()[0] }}
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow bg-royal sidebar-text-light">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Dashboard</li>
                            <li>
                                <a href="{{route('home')}}" class="{{ Route::is('home') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-home"></i>
                                    Home
                                </a>
                            </li>

                            <li class="app-sidebar__heading">User & Role Management</li>
                            <li class="
                            {{Route::is('user.create') ? 'mm-active' : ''}} 
                            {{ Route::is('user.index') ? 'mm-active' : '' }} 
                            {{ Route::is('user.edit') ? 'mm-active' : '' }}
                            
                            ">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-user"></i>
                                    {{config('staticTexts.user-m-title')}}
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    @can('view-users')
                                    <li>
                                        <a href="{{route('user.index')}}" class="{{ Route::is('user.index') ? 'mm-active' : '' }}">
                                            <i class="metismenu-icon"></i>
                                           {{config('staticTexts.user-m-user-list')}}
                                        </a>
                                    </li>
                                    @endcan
                                    @can('add-users')
                                    <li>
                                        <a href="{{route('user.create')}}" class="{{ Route::is('user.create') ? 'mm-active' : '' }}">
                                            <i class="metismenu-icon">
                                            </i>
                                            {{config('staticTexts.user-m-add-user')}}
                                        </a>
                                    </li>
                                    @endcan
                                </ul>
                            </li>
                            <li class="app-sidebar__heading">Candidate Data Management</li>
                            <li class="
                            {{Route::is('candidate.create') ? 'mm-active' : ''}} 
                            {{ Route::is('candidate.index') ? 'mm-active' : '' }} 
                            {{ Route::is('candidate.edit') ? 'mm-active' : '' }}
                            
                            ">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-users"></i>
                                   Candidates
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    
                                    <li>
                                        <a href="{{route('candidate.index')}}" class="{{ Route::is('candidate.index') ? 'mm-active' : '' }}">
                                            <i class="metismenu-icon"></i>
                                           View Added Candidates
                                        </a>
                                    </li>
                                 
                                   
                                    <li>
                                        <a href="{{route('candidate.create')}}" class="{{ Route::is('candidate.create') ? 'mm-active' : '' }}">
                                            <i class="metismenu-icon">
                                            </i>
                                           Add Candidate
                                        </a>
                                    </li>
                               
                                </ul>
                            </li>
                            {{-- @role('Admin')
                            <li class="
                            {{Route::is('users.create') ? 'mm-active' : ''}} 
                            {{ Route::is('users.index') ? 'mm-active' : '' }} 
                            {{ Route::is('users.edit') ? 'mm-active' : '' }}
                            
                            ">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-ticket"></i>
                                    {{config('staticTexts.role-m-title')}}
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#" class="#">
                                            <i class="metismenu-icon"></i>
                                           {{config('staticTexts.role-list')}}
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="#" class="#">
                                            <i class="metismenu-icon">
                                            </i>
                                            {{config('staticTexts.role-add')}}
                                        </a>
                                    </li>
                                 
                                </ul>
                            </li>
                            @endrole --}}

                            {{-- <li class="app-sidebar__heading">Post Management</li>
                            <li>
                                <a href="{{route('post.index')}}"
                                    class="{{ Route::is('post.index') ? 'mm-active' : '' }}">
                                    <i class="metismenu-icon pe-7s-news-paper"></i>
                                    Posts
                                </a>
                            </li> --}}

                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')

                </div>
            </div>
        </div>
    </div>
    @guest

    @else

    {{-- @include('scripts.notification') --}}

    @endguest



    @if ( Route::is('post.index') || Route::is('candidate.index'))
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    @endif





    <script src="{{asset('js/main.js')}}"></script>
    @stack('scripts')

    <script>
        if (!localStorage.getItem('sidebar-preference')) {
            localStorage.setItem('sidebar-preference', '');
        } else {
            $('.fixed-header').addClass(localStorage.getItem('sidebar-preference'));
        }
        $(document).ready(function () {

            getNotifications();

            $('#bell-btn').on('click', function () {

                if ($(".icon-anim-pulse").length) {
                    $('.icon-anim-pulse').removeClass('icon-anim-pulse');
                    $('#red-dot').hide();
                }
            });

            $('#side-hamburger').on('click', function () {
                if (localStorage.getItem('sidebar-preference') == 'closed-sidebar') {
                    localStorage.setItem('sidebar-preference', '');
                } else if (localStorage.getItem('sidebar-preference') == '') {
                    localStorage.setItem('sidebar-preference', 'closed-sidebar');
                }

            });
        });

        

    </script>

</body>

</html>
