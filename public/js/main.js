let phone = 320,
    tablet = 640,
    tabletXL = 768,
    laptop = 1024,
    desktop = 1280,
    desktopXL = 1536;
function initMap() {
  for (let i = 0; i < Number(document.getElementById('map-counter').textContent); i++) {
    let map_1cord = document.getElementById('first_cord' + i);
    let map_2cord = document.getElementById('second_cord' + i);

    map = new google.maps.Map(document.getElementById('map' + i), {
      center: new google.maps.LatLng(map_1cord.textContent, map_2cord.textContent),
    zoom: 15,
      disableDefaultUI: true,
      styles: [
        {
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#212121"
            }
          ]
        },
        {
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#757575"
            }
          ]
        },
        {
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#212121"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#37c564"
            }
          ]
        },
        {
          "featureType": "administrative.country",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#9e9e9e"
            }
          ]
        },
        {
          "featureType": "administrative.locality",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#bdbdbd"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#37c564"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#757575"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#181818"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#37c564"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#1b1b1b"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#a99d73"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#8a8a8a"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#373737"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#a99d73"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#3c3c3c"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#a99d73"
            }
          ]
        },
        {
          "featureType": "road.highway.controlled_access",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#4e4e4e"
            }
          ]
        },
        {
          "featureType": "road.highway.controlled_access",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#a99d73"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#616161"
            }
          ]
        },
        {
          "featureType": "transit",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#757575"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#3d3d3d"
            }
          ]
        }
      ],
    });
    let image = 'https://cdn.icon-icons.com/icons2/2104/PNG/32/map_location_icon_129048.png';

    const infowindow = new google.maps.InfoWindow({
        content: "A 24 hours mission to find and identify signal marks on the enemy territory with small fire team.\
        Number of enemy teams: unknown\
        Amount of locals on the territory: unknown",
    });

    let marker = new google.maps.Marker({
        position: new google.maps.LatLng(map_1cord.textContent, map_2cord.textContent),
        map,
        animation: google.maps.Animation.DROP,
        icon: image,
    });

    google.maps.event.addListener(map, 'click', function(event) {
        secondMarker = event.latLng;
        placeMarker(event.latLng);
    });
    function placeMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            animation: google.maps.Animation.DROP,
            icon: image,
        });
    }
    marker.addListener("click", () => {
    infowindow.open({
        anchor: marker,
        map,
        shouldFocus: false,
        });
    });
  }
}

window.initMap = initMap;


