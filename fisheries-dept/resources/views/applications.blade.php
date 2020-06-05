@extends('layouts.layout')
    @extends('layouts.navbar')
    @section('content')
    
@section('content')
<div class="d-md-flex h-md-100 align-items-center container">

    <!-- First Half -->
    
    <div class="col-md-3 p-0 bg-white h-md-100">
        <div class="text-white d-flex flex-column justify-content-left pl-4">
            <div class="mt-3 space-around-div" style="background: #CB1C91">
                <div><h4>{{ $users }}</h4></div>
                <div><small>No. of farmers</small></div>
            </div>

            <div class="mt-2 space-around-div" style="background: #453AB4">
                <div><h4>{{ $fishponds }}</h4></div>
                <div><small>No. of approved ponds</small></div>
            </div>

            <div class="mt-2 space-around-div" style="background: #5DD9A7">
                <div><h4>{{ $applied }}</h4></div>
                <div><small>No. of fishponds applied</small></div>
            </div>
            <div class="left-footer">
                <img src="/public/image/indiaLogo.png" height="50" width="50" style="border-radius: 50%;">
                <p><small>Department of Fisheries, Government of Mizoram</small></p>
            </div>
        </div>
        
    </div>
    
    <!-- Second Half -->
    <div class="col-md-9 p-0 bg-white h-md-100 loginarea">
        <div class=" h-md-100 " style="background: #F1F1F1">
            <div id="pi" class="container">Fresh Applications</div>
            <div class="container mt-2">
                <table class="table table-hover" style="background: white">
                    <thead class="table" style="background: white">
                        <tr>
                            <th scope="col">SI</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">District</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                        <tr>
                            <th scope="row">{{ $application->id }}</th>
                            <td>{{ $application->name }}</td>
                            <td>{{ $application->address }}</td>
                            <td>{{ $application->district }}</td>
                            <td>
                                <a href="/applications/find/{{ $application->id }}"    
                                    name="title">
                                    View  
                                </a>         
                            </td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
                {{ $applications->links() }}
            </div>
        </div>
        <div class="container">
            <div class="chat-box">
                <div class="open">Open
                    <div class="box">
                        <br>
                        Test
                        <br>
                    </div>
                <div>
            <div>
        </div>
    </div>      
</div>


@endsection
<script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>