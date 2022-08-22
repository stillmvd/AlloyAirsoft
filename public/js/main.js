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
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#ffffff"
            }
          ]
        },
        {
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#000000"
            },
            {
              "lightness": 13
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#000000"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#144b53"
            },
            {
              "lightness": 14
            },
            {
              "weight": 1.4
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "labels",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "landscape",
          "stylers": [
            {
              "color": "#08304b"
            }
          ]
        },
        {
          "featureType": "poi",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#0c4152"
            },
            {
              "lightness": 5
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#000000"
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#0b3d51"
            },
            {
              "lightness": 16
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#000000"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#0b434f"
            },
            {
              "lightness": 25
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#000000"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "labels",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "transit",
          "stylers": [
            {
              "color": "#146474"
            },
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "water",
          "stylers": [
            {
              "color": "#021019"
            }
          ]
        }
      ]
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

// window.onload = function () {
//     let width = document.documentElement.scrollWidth
//     if (width < tablet) {
//         document.getElementById('game-name').classList.add('hidden');
//         document.getElementById('game-gametime').classList.add('hidden');
//         document.getElementById('game-info').classList.add('hidden');
//         document.getElementById('game-polygon').classList.add('hidden');
//     }
// }

