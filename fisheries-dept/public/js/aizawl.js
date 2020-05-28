var map;
var myLatlng;
$(document).ready(function(){
  success();
  function success(){
    var latval=23.7307;
    var lngval=92.7173;

    myLatlng=new google.maps.LatLng(latval,lngval);
    createMap(myLatlng);
    searchPonds(latval,lngval);
  }

  function fail(){
    alert("It Fails Position");
  }
    
    // create map
    function createMap(myLatlng){
      map = new google.maps.Map(document.getElementById('map'), {
          center: myLatlng,
          zoom: 12, 
        });
        var marker=new google.maps.Marker({
          position: myLatlng,
          map:map
        })
        
    }

    // this makes red marker for position
    function createMarker(latlng,icn,id,name,address,district,pondImages){
        var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        icon: icn,
        // title:  name
      });
      
      marker.addListener('click', function () {
        
        $.post('http://127.0.0.1:8000/api/findPropic/'+id,function(match){
          // console.log(match);
          document.getElementById('propic').innerHTML = '';
          
            var x = document.createElement("IMG");
            x.setAttribute("src", "/public/image/"+match+".jpg");
            x.setAttribute("width", "80");
            x.setAttribute("height", "80");
            
            x.setAttribute("style", "display:block;border-radius:50%;margin:9px 9px");
          
            var id=document.getElementById('propic').appendChild(x);
      });

        $.post('http://127.0.0.1:8000/api/findPond/'+id,function(match){
        console.log(match);
            var id=document.getElementById('address').innerHTML = address;
            var id=document.getElementById('district').innerHTML = district;
            var id=document.getElementById('fname').innerHTML=match.fname;
            var id=document.getElementById('epic_no').innerHTML=match.epic_no;
            var id=document.getElementById('id').innerHTML=match.id;
            var id=document.getElementById('tehsil').innerHTML=match.tehsil;
      });
     
      $.post('http://127.0.0.1:8000/api/findImages/'+id,function(match){
          // console.log(match);
          document.getElementById('pondImages').innerHTML = '';
          
          $.each(match,function(i,val){
            var x = document.createElement("IMG");
            x.setAttribute("src", "/public/image/"+match[i]+".jpg");
            x.setAttribute("width", "300");
            x.setAttribute("height", "90");
            x.setAttribute("style", "display:block");
          
            var id=document.getElementById('pondImages').appendChild(x);
         
          
          });
      });
      document.getElementById("mySidenav").style.width = "350px";
    });

    }
    
    function searchPonds(lat,lng){
      $.post('http://127.0.0.1:8000/api/searchPondsAizawl',{lat:lat,lng:lng},function(match){
        // console.log(match);
        $.each(match,function(i,val){
            var glatval=val.lat;
            var glngval=val.lng;
            var gid=val.id;
            var gname=val.fname;
            var gaddress=val.address;
            var gdistrict=val.district;
            var gpondImages=val.pondImages;
            var GLatlng=new google.maps.LatLng(glatval,glngval);
            var gicn='https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
            createMarker(GLatlng,gicn,gid,gname,gaddress,gdistrict,gpondImages);
        });
      });
    }
});
 // AIzaSyBxbv_wIn2sTcqUkUpHwlCE47ak8WIcjmE
/* Close */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0%";
}
 