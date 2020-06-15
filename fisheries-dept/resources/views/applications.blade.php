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
        <div class="chatbox chatbox--tray chatbox--empty">
            <div class="chatbox__title">
                <h5><a href="#">Send SMS</a></h5>
                <button class="chatbox__title__tray">
                    <span></span>
                </button>
                <button class="chatbox__title__close">
                    <span>
                        <svg viewBox="0 0 12 12" width="12px" height="12px">
                            <line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
                            <line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="chatbox__body">
                <div class="chatbox__body__message chatbox__body__message--left">
                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg" alt="Picture">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="chatbox__body__message chatbox__body__message--right">
                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/arashmil/128.jpg" alt="Picture">
                    <p>Nulla vel turpis vulputate, tincidunt lectus sed, porta arcu.</p>
                </div>
                <div class="chatbox__body__message chatbox__body__message--left">
                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg" alt="Picture">
                    <p>Curabitur consequat nisl suscipit odio porta, ornare blandit ante maximus.</p>
                </div>
                <div class="chatbox__body__message chatbox__body__message--right">
                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/arashmil/128.jpg" alt="Picture">
                    <p>Cras dui massa, placerat vel sapien sed, fringilla molestie justo.</p>
                </div>
                <div class="chatbox__body__message chatbox__body__message--right">
                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/arashmil/128.jpg" alt="Picture">
                    <p>Praesent a gravida urna. Mauris eleifend, tellus ac fringilla imperdiet, odio dolor sodales libero, vel mattis elit mauris id erat. Phasellus leo nisi, convallis in euismod at, consectetur commodo urna.</p>
                </div>
            </div>
            <form class="chatbox__credentials">
                <div class="form-group">
                    <select name="district" class="sms-input-border">
                        <option value="" disabled selected>Select District</option>
                        <option>Aizawl</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="district" class="sms-input-border">
                        <option value="" disabled selected>Select Tehsil</option>
                        <option>Tlangnuam</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <textarea class="sms-input-border" rows="1" id="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-block" style="background-color:#007bff">Enter Chat</button>
            </form>
            
        </div>
    </div>      
</div>


@endsection
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    (function($) {
    $(document).ready(function() {
        var $chatbox = $('.chatbox'),
            $chatboxTitle = $('.chatbox__title'),
            $chatboxTitleClose = $('.chatbox__title__close'),
            $chatboxCredentials = $('.chatbox__credentials');
        $chatboxTitle.on('click', function() {
            $chatbox.toggleClass('chatbox--tray');
        });
        $chatboxTitleClose.on('click', function(e) {
            e.stopPropagation();
            $chatbox.addClass('chatbox--closed');
        });
        $chatbox.on('transitionend', function() {
            if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
        });
        $chatboxCredentials.on('submit', function(e) {
            e.preventDefault();
            $chatbox.removeClass('chatbox--empty');
        });
    });
})(jQuery);
    </script>