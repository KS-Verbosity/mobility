{{-- <div  id="map" class="flex-1"> --}}
<div  id="map" class="flex-1 w-full bg-gray-300 h-96 lg:max-w-full lg:flex">
   
  
		{!! Mapper::render() !!}
	

</div>


  
@section('map-scripts')
<script type="text/javascript">
  
  
function markerdragstart() {
  alertify.success('Pin is being moved');
}

function markerdragend(lat, lng) {
  alertify.success('Pin has been moved Lat=' + lat + ' Lng=' + lng);
}

function centermap(map) {

  map.addListener('center_changed', function() {
                setTimeout(function () {
                    console.log('center_changed');
                    if (typeof navigator !== 'undefined' && navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            maps[0].markers[0].setPosition(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
                        });
                    }
                }, 200);
            });

}

function stylemap(map) {



styles = [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#523735"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#c9b2a6"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#dcd2be"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ae9e90"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#93817c"
      }
    ]
  },
  {
    "featureType": "poi.business",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.medical",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "stylers": [
      {
        "visibility": "simplified"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#a5b076"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#447530"
      }
    ]
  },
  {
    "featureType": "poi.place_of_worship",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.school",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.sports_complex",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#fdfcf8"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f8c967"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#e9bc62"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e98d58"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#db8555"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#806b63"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8f7d77"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#b9d3c2"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#92998d"
      }
    ]
  }
];


map.setOptions({styles: styles});

//alert("Map Before");

}

function alertme(map, markers){
    //alert("Alert");
    mapInstance = map;

    mapBounds = mapInstance.getBounds();
    mapZoom = mapInstance.getZoom();
    mapInstance.fitBounds(mapBounds);
    mapInstance.setZoom(mapZoom);
}


function delayThenResizeMap(pMapInstance)
{
  //alert("Resizing");
    mapInstance = pMapInstance;
    mapBounds = mapInstance.getBounds();
    console.log(mapBounds );
    
    mapZoom = mapInstance.getZoom();
    setTimeout(resizeMap, 100);
}

function resizeMap()
{
    mapInstance.fitBounds(mapBounds);
    mapInstance.setZoom(mapZoom);
}


function sizepolygon(map){
  alert("sizing");

  var gbounds = new google.maps.LatLngBounds();
  var global_points = [];
  var o = bounds;

  for (k = 0; k < o.bounding_box.length; k++) {
            o.bounding_box[k].lat = Number(o.bounding_box[k].lat);
            o.bounding_box[k].lng = Number(o.bounding_box[k].lng);
            global_points.push(o.bounding_box[k]);
        }

        geo = o.geometry;

        if (global_points.length===0) return;

map.fitBounds(gbounds);
map.panToBounds(gbounds);

}

function showBounds(){


  alert("Show");

var gbounds = new google.maps.LatLngBounds();
var global_points = [];
var o = bounds;

console.log('BOUNDS', o);
switch(o.data.shape){
    case 'circle':
        for (k = 0; k < o.bounding_box.length; k++) {
            o.bounding_box[k].lat = Number(o.bounding_box[k].lat);
            o.bounding_box[k].lng = Number(o.bounding_box[k].lng);
            global_points.push(o.bounding_box[k]);
            gbounds.extend(o.bounding_box[k]);


        }

        geo = o.geometry;

        for (j = 0; j < geo.length; j++) {

            g = geo[j];
            circle = new google.maps.Circle({
                center: {lat: Number(g.ui.lat), lng: Number(g.ui.lng)},
                radius: Number(g.ui.radius),
                strokeColor: '#1CAAF1',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#1CAAF1',
                fillOpacity: 0.35,
                zIndex: 300
            });


            circle.setMap(sz.map);

            site.locationShapes.push(circle);
        }

        break;
    case 'polygon':

        for (k = 0; k < o.bounding_box.length; k++) {
            o.bounding_box[k].lat = Number(o.bounding_box[k].lat);
            o.bounding_box[k].lng = Number(o.bounding_box[k].lng);
            global_points.push(o.bounding_box[k]);



        }

        geo = o.geometry;

        for (j = 0; j < geo.length; j++) {

            g = geo[j];


            //create the correct shape
            switch (g.ui.type) {
                case "polygon":

                    for (k = 0; k < g.bounds.length; k++) {
                        g.bounds[k].lat = Number(g.bounds[k].lat);
                        g.bounds[k].lng = Number(g.bounds[k].lng);

                        gbounds.extend(g.bounds[k]);
                    }


                    polygon = new google.maps.Polygon({
                        paths: g.bounds,
                        strokeColor: '#1CAAF1',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#1CAAF1',
                        fillOpacity: 0.35,
                        zIndex: 300
                    });


                    polygon.setMap(sz.map);

                    site.locationShapes.push(polygon);

                    google.maps.event.addListener(polygon, 'click', function (event) {

                        if (geo_editor.blockShapeEvents) return;


                        var editing = this.getEditable();

                        if (editing) {

                            //this.setEditable(false);
                            //this.setDraggable(false);


                            this.setOptions({strokeColor: '#F1CE1C', fillColor: '#F1CE1C'});
                            geo_editor.hideDetailsNotMap();


                        } else {
                            //this.setEditable(true);
                            //this.setDraggable(true);


                            this.setOptions({strokeColor: '#7FBF3F', fillColor: '#7FBF3F'});
                            geo_editor.showDetailsAndMap(this.zIndex - 100);
                        }
                    });
            }
        }

        break;
    case 'point':

        site.isMarker = true;

        for (k = 0; k < o.bounding_box.length; k++) {
            o.bounding_box[k].lat = Number(o.bounding_box[k].lat);
            o.bounding_box[k].lng = Number(o.bounding_box[k].lng);
            global_points.push(o.bounding_box[k]);

        }


        geo = o.geometry;

        for (j = 0; j < geo.length; j++) {

            g = geo[j];
            marker = new google.maps.Marker({
                icon: image_blue,
                position: new google.maps.LatLng({lat: Number(g.ui.lat), lng: Number(g.ui.lng)}),
                title: bounds.data.name,
                zIndex: 300,
                clickable: true
            });

            gbounds.extend({lat: Number(g.ui.lat), lng: Number(g.ui.lng)});

            marker.setMap(sz.map);


            site.locationShapes.push(marker);


            google.maps.event.addListener(marker, 'click', function (event) {


            });
        }




        break;

}

if (global_points.length===0) return;

sz.map.fitBounds(gbounds);
sz.map.panToBounds(gbounds);

zoomChangeBoundsListener =
    google.maps.event.addListenerOnce(sz.map, 'bounds_changed', function(event) {
        if (this.getZoom()){

            this.setZoom(gestimateZoom(gbounds)-3);

        }
    });
setTimeout(function(){google.maps.event.removeListener(zoomChangeBoundsListener)}, 2000);

}

  </script>
  
@endsection


