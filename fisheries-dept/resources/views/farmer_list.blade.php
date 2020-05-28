@extends('layouts.layout')
    @extends('layouts.navbar')
    @section('content')
    
@section('content')

<div class="d-md-flex h-md-100 align-items-center container">

    <!-- First Half -->
    
    <div class="col-md-4 p-0 bg-indigo h-md-100">
        <div class="text-white d-md-flex justify-content-left pl-4">
            <div class="mt-3">
                @foreach ($farmers as $farmer)
                    <div style="background:red;padding-right:200px">
                        <img src="/profile_images/{{ $farmer->image }}.jpg" class="profile-pic">
                        {{ $farmer->id }}<br>
                        {{ $farmer->fname }} <br>
                        {{ $farmer->contact }}
                        <input type="submit" 
                        onclick="searchFarmer({{ $farmer->id }})">
                        <hr>
                    </div>
                @endforeach
            </div>
            <div class="logoarea pt-5 pb-5">
                
            </div>
            <div class="footer">
                <img src="/public/image/indiaLogo.png" height="50" width="50" style="border-radius: 50%;display: block;margin-left: 14%;">
                <p>Directorate of Fisheries, Government of Mizoram</p>
            </div>
        </div>
        
    </div>
    
    <!-- Second Half -->
    <div class="col-md-8 p-0 bg-white h-md-100 loginarea">
        <div class=" h-md-100 p-5" style="background: lightgray">
            
            
            <div style="background: yellow">
                <div id="pi"></div>
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-2">
                            <div id="pf"></div>
                        </div>
                        <div class="col-10">
                            <b><div id="fname"></div></b>
                            <div id="address"></div>
                            <div id="district"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>
    
@endsection


<script>
    
    function searchFarmer(id) {
        $.get('http://127.0.0.1:8000/farmer_list/'+id,function(data){
        console.log(data);
            var pff=document.getElementById('pf').innerHTML = '';
            var y=document.createElement("IMG");
            y.setAttribute("src", "/public/image/"+data.image+".jpg");
            y.setAttribute("width", "70");
            y.setAttribute("height", "70");
            y.setAttribute("style", "display:block");
            y.setAttribute("class", "rounded-circle");

            var id=document.getElementById('pf').appendChild(y);


            var id=document.getElementById('address').innerHTML = data.address;
            var id=document.getElementById('district').innerHTML = data.district;
            var id=document.getElementById('fname').innerHTML=data.fname;
            var id=document.getElementById('pi').innerHTML = '';
            var x = document.createElement("IMG");
            var pi=data.pondImages.split(',').shift();
            console.log(pi);
            x.setAttribute("src", "/public/image/"+pi+".jpg");
            x.setAttribute("width", "700");
            x.setAttribute("height", "200");
            x.setAttribute("class", "img-fluid");

            var id=document.getElementById('pi').appendChild(x);
      });
    }
</script>