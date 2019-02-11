<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('/login_css/images/icons/logo.ico')}}">
    
    
    <title>LFUGGOC</title>
    
    
    
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('/login_css/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    
    <!-- Animation library for notifications   -->
    <link href="{{ asset('/login_css/assets/css/animate.min.css')}}" rel="stylesheet'"/>
    
    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('/login_css/assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>
    
    
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('/login_css/assets/css/demo.css')}}" rel="stylesheet" />
    
    
    <!--     Fonts and icons     -->
    <link href="{{ asset('/login_css/assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
    
    
    
    
    <style>
        .content input[type="search"] {
            width:300px;
        }      
        .dataTables_filter {
            float: right;
        }
        .pagination
        {
            float: right;
        }
    </style>
    
</head>
<body>
    
    <!-- /navbar -->
    @guest
    
    @else
    
    <div class="wrapper">
        <div class="sidebar"  data-image="{{ asset('/login_css/assets/img/sidebar-6.jpg')}}">
            
            
            
            <div class="sidebar-wrapper">
                <div class="logo">
                    
                    <img class="rounded-circle" src="{{URL::asset('/images/front-logo.png')}}" alt="profile Pic" height="40" width="45" style='  border-radius: 50%; border: 2px solid white;'>
                    <b>{{ Auth::user()->name}}</b>
                </div>
                
                <ul class="nav">
                    @if(Auth::user()->user_type =='ADMIN')
                    <li>
                        <a  href="{{ url('/show-barcode-list') }}">
                            <i class="pe-7s-id"></i>
                            <p>Visitors View
                                {{-- <b style='float:right;background-color: red; padding: 0px 10px;border-radius:10px'>{{$count}}</b>
                                --}}
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/view-account') }}">
                            <i class="pe-7s-user"></i>
                            <p>User Account</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/history-log') }}">
                            <i class="pe-7s-note2"></i>
                            <p>Activity Log</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/visitors-history') }}">
                            <i class="pe-7s-news-paper"></i>
                            <p>Visitor History</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/change-password') }}">
                            <i class="pe-7s-tools"></i>
                            <p>Change Password</p>
                        </a>
                    </li>
                    
                    @else
                    <li>
                        
                        <a  href="{{ url('/show-barcode-list') }}">
                            <i class="pe-7s-id"></i>
                            <p>Visitors View
                                {{-- <b style='float:right;background-color: red; padding: 0px 10px;border-radius:10px'>{{$count}}</b>
                                --}}
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/change-password') }}">
                            <i class="pe-7s-tools"></i>
                            <p>Change Password</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/visitors-history') }}">
                            <i class="pe-7s-news-paper"></i>
                            <p>Visitor History</p>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="pe-7s-cloud-upload"></i>
                        <p>Log Out</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}"  method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                
                
                
            </ul>
        </div>
    </div>
    
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!--   Core JS Files   -->
                <script src="{{ asset('/inside_css/assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
                <script src="{{ asset('/inside_css/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
                <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
                <script src="{{ asset('/inside_css/assets/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>
                
                
                
                @endguest
                
                @yield('content')
                