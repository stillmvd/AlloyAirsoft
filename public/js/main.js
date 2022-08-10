let count_maps = document.getElementById("count_maps").textContent;

function initMap() {

  for (let i = 0; i < count_maps; i++) {
    let map1_cord = document.getElementById("first_cord" + i);
    let map2_cord = document.getElementById("second_cord" + i);

    map = new google.maps.Map(document.getElementById("map" + i), {
      center: new google.maps.LatLng(map1_cord.textContent, map2_cord.textContent),
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
              "color": "#ead02a"
            }
          ]
        },
        {
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#a9ab26"
            }
          ]
        },
        {
          "featureType": "administrative.country",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#cfd219"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "labels",
          "stylers": [
            {
              "color": "#b5b021"
            },
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative.locality",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#b5b021"
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
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
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
              "color": "#cbb23a"
            },
            {
              "visibility": "simplified"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#616161"
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
              "color": "#3d3d3d"
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
          "featureType": "road.highway",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#3c3c3c"
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
          "featureType": "road.local",
          "elementType": "labels",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#ffffff"
            },
            {
              "visibility": "on"
            }
          ]
        },
        {
          "featureType": "transit",
          "stylers": [
            {
              "visibility": "off"
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
      ]
    });
  }

}

window.initMap = initMap;

let open = true;
function openinfo() {
    if (open) {
      let block = document.getElementById("infoblock");
      block.classList.remove('h-[200px]');
      block.classList.add('h-[400px]');

      let titleinfo = document.getElementById('titleinfo');
      titleinfo.classList.remove('text-white/75');
      titleinfo.style.color = '#f59e0b';
      titleinfo.classList.add('mt-6');
      
      let text = document.getElementById('textinfo');
      text.classList.add('mt-6');
      text.classList.remove('text-white/50');
      text.classList.add('text-white/75');
      
      let undertext = document.getElementById('undertext');
      undertext.classList.remove('text-white/50');
      undertext.classList.add('text-white/75');

      let arrows = document.getElementById('arrows');
      arrows.style.transform = 'rotate(90deg)';

      open = false;
    } else {
      let block = document.getElementById("infoblock");
      block.classList.add('h-[200px]');
      block.classList.remove('h-[400px]');

      let titleinfo = document.getElementById('titleinfo');
      titleinfo.style.color = '#ffffffbf';
      titleinfo.classList.remove('mt-6');
      
      let text = document.getElementById('textinfo');
      text.classList.remove('mt-6');
      text.classList.remove('text-white/75');
      text.classList.add('text-white/50');
      
      let undertext = document.getElementById('undertext');
      undertext.classList.remove('text-white/75');
      undertext.classList.add('text-white/50');

      let arrows = document.getElementById('arrows');
      arrows.style.transform = 'rotate(0deg)';

      open = true;
    }
}