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
                    <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    @if (Route::has('login'))
                        @auth
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    @else
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        @endauth
                    @endif
                </li>
                        
            
                         
                
            </ul>
        
        </div>
    </nav>
</div> 