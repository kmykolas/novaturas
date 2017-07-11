$(document).ready(function() {

var markersArray = [];    
            function map_init() {
            var lg=23.898697;
            var lt=54.890010;
            
            if($("#latitude").val()!='')var lt=$("#latitude").val();
            if($("#longitude").val()!='')var lg=$("#longitude").val();
            

            var myLatlng = new google.maps.LatLng(lt,lg);
            var mapOptions = {
                center: new google.maps.LatLng(lt,lg),
                zoom: 6,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById('map'),mapOptions);    
            google.maps.event.addListener(map, 'click', function(event) {
               addMarker(event.latLng);
            });
            
            if($("#latitude").val()!='' && $("#longitude").val()!=''){
                airport = new google.maps.LatLng(lt,lg);
                addMarker(airport);                                 
            }

            function addMarker(location) {
                clearOverlays();
                var marker = new google.maps.Marker({
                    position: location, 
                    map: map
                });
                markersArray.push(marker);
                $("#latitude").val(marker.position.lat().toFixed(6));
                $("#longitude").val(marker.position.lng().toFixed(6));
                }            
            }

    if ($("#map").length){
        map_init();
    }

function clearOverlays() {
  for (var i = 0; i < markersArray.length; i++ ) {
   markersArray[i].setMap(null);
  }
}
    
} );