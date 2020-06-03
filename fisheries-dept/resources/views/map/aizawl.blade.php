@extends('layouts.aizawlMapLayout')

@section('content')

    <div style="background-color:#007bff;">
        <nav class="navbar navbar-expand-lg container-fluid navbar-dark bg-primary" style="width:80%;" >
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('public/image/logo.svg')}}" style="width:100px;height:53px; margin-top: -7px;">
                </a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('farmerList') }}">Farmers <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ponds
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/map/all">All</a>
                            <a class="dropdown-item" href="/map/aizawl">Aizawl</a>
                            <a class="dropdown-item" href="#">Kolasib</a>
                            <a class="dropdown-item" href="#">Lawngtlai</a>
                            <a class="dropdown-item" href="#">Lunglei</a>
                            <a class="dropdown-item" href="#">Mamit</a>
                            <a class="dropdown-item" href="#">Siaha</a>
                            <a class="dropdown-item" href="#">Serchhip</a>
                            <a class="dropdown-item" href="#">Champhai</a>
                            <a class="dropdown-item" href="#">Hnahthial</a>
                            <a class="dropdown-item" href="#">Saitual</a>
                            <a class="dropdown-item" href="#">Khawzawl</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </ul>
            
            </div>
        </nav>
    </div> 


    <div>
        <div class="sidenav" id="mySidenav" >
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="">
                <div class="container" style="background:#DCDCDC">
                    <div class="row left-space">
                        <div class="col-4">
                            <div id="propic" style="border-radius: 50%;"></div>
                        </div>
                        <div class="col-8" style="padding-top:9px">
                            <b><div id="fname"></div></b>
                            <div id="address"></div>
                            <div id="district"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mainframe left-space sidenavmargindetails mt-3">
                <div class="leftframe">Father's Name:</div>
                <div class="rightframe" id="id"></div>
            </div>
          
            <div class="mainframe left-space sidenavmargindetails">
                <div class="leftframe">EPIC:</div>
                <div class="rightframe" id="epic_no"></div>
            </div>

            <div class="mainframe left-space sidenavmargindetails">
                <div class="leftframe">Tehsil</div>
                <div class="rightframe" id="tehsil"></div>
            </div>
            
            <div class="mainframe left-space">
                <div class="sidenavmargindetails mb-3"> Pond Images:</div>
                <div class="" id="pondImages"></div>
            </div>
            

            <div class="mainframe left-space">
                <div style="position:absolute;bottom:0;width:100%;height:70px;margin-left:15%">
                    <img src="/public/image/indiaLogo.png" height="50" width="50" style="margin-left:22% !important;border-radius: 50%;">
                    <div style="font-size:10px;">Directorate of Fisheries, Government of Mizoram</div>
                </div>
                
            </div>
            
        </div>

        <div class="container-fluid map-width" style="width:80%;">
            <div id="map">

            </div>
        </div>
        
    </div>

      
