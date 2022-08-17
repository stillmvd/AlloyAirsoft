let phone = 320,
    tablet = 640,
    tabletXL = 768,
    laptop = 1024,
    desktop = 1280,
    desktopXL = 1536;
let map_1cord = document.getElementById("first_cord");
let map_2cord = document.getElementById("second_cord");
let openRulesBlock = true;
let openInfoBlock = true;

function initMap() {
    let secondMarker;
    map = new google.maps.Map(document.getElementById("map"), {
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
                  "color": "#02df8f"
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
              "elementType": "geometry.fill",
              "stylers": [
                {
                  "color": "#00aa64"
                }
              ]
            },
            {
              "featureType": "administrative.country",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#02df8f"
                }
              ]
            },
            {
              "featureType": "administrative.land_parcel",
              "elementType": "labels",
              "stylers": [
                {
                  "color": "#02df8f"
                },
                {
                  "visibility": "off"
                }
              ]
            },
            {
              "featureType": "administrative.land_parcel",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#02df8f"
                }
              ]
            },
            {
              "featureType": "administrative.locality",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#02df8f"
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
              "elementType": "geometry.fill",
              "stylers": [
                {
                  "color": "#00aa64"
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
              "featureType": "poi.sports_complex",
              "elementType": "geometry.fill",
              "stylers": [
                {
                  "color": "#00aa64"
                },
                {
                  "visibility": "on"
                }
              ]
            },
            {
              "featureType": "road",
              "elementType": "geometry.fill",
              "stylers": [
                {
                  "color": "#234d3e"
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
              "featureType": "road.highway",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#02df8f"
                },
                {
                  "visibility": "on"
                }
              ]
            },
            {
              "featureType": "road.highway",
              "elementType": "labels.text.stroke",
              "stylers": [
                {
                  "color": "#000000"
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
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#02df8f"
                }
              ]
            },
            {
              "featureType": "road.highway.controlled_access",
              "elementType": "labels.text.stroke",
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
              "featureType": "road.local",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#02df8f"
                },
                {
                  "visibility": "on"
                }
              ]
            },
            {
              "featureType": "road.local",
              "elementType": "labels.text.stroke",
              "stylers": [
                {
                  "color": "#000000"
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
                  "color": "#02df8f"
                }
              ]
            },
            {
              "featureType": "transit.line",
              "elementType": "geometry.fill",
              "stylers": [
                {
                  "visibility": "on"
                }
              ]
            },
            {
              "featureType": "transit.station.bus",
              "elementType": "geometry.fill",
              "stylers": [
                {
                  "color": "#ff0000"
                },
                {
                  "visibility": "on"
                }
              ]
            },
            {
              "featureType": "water",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#000000"
                },
                {
                  "weight": 1
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

window.initMap = initMap;

function upLabel(labelName) {
  let label = document.getElementById(labelName);
  label.style.top = '-18px';
  label.style.fontSize = '12px';
}

function downLabel(labelName) {
  let label = document.getElementById(labelName);
  label.style.top = '0px';
  label.style.fontSize = '16px';
}

document.getElementById('input_name').addEventListener('focus', function() {
    upLabel('name_label');
});
document.getElementById('input_surname').addEventListener('focus', function() {
    upLabel('surname_label');
});
document.getElementById('input_callsign').addEventListener('focus', function() {
    upLabel('callsign_label');
});
document.getElementById('input_email').addEventListener('focus', function() {
    upLabel('email_label');
});
document.getElementById('input_phone').addEventListener('focus', function() {
    upLabel('phone_label');
});
document.getElementById('input_team').addEventListener('focus', function() {
    upLabel('team_label');
});

document.getElementById('input_name').addEventListener('blur', function() {
  downLabel('name_label');
  if (document.getElementById('input_name').value != '') {
      upLabel('name_label');
  } else {
      downLabel('name_label');
  }
});
document.getElementById('input_surname').addEventListener('blur', function() {
  downLabel('surname_label');
  if (document.getElementById('input_surname').value != '') {
      upLabel('surname_label');
  } else {
      downLabel('surname_label');
  }
});
document.getElementById('input_callsign').addEventListener('blur', function() {
  downLabel('callsign_label');
  if (document.getElementById('input_callsign').value != '') {
      upLabel('callsign_label');
  } else {
      downLabel('callsign_label');
  }
});
document.getElementById('input_email').addEventListener('blur', function() {
  downLabel('email_label');
  if (document.getElementById('input_email').value != '') {
      upLabel('email_label');
  } else {
      downLabel('email_label');
  }
});
document.getElementById('input_phone').addEventListener('blur', function() {
  downLabel('phone_label');
  if (document.getElementById('input_phone').value != '') {
      upLabel('phone_label');
  } else {
      downLabel('phone_label');
  }
});
document.getElementById('input_team').addEventListener('blur', function() {
  downLabel('team_label');
  if (document.getElementById('input_team').value != '') {
      upLabel('team_label');
  } else {
      downLabel('team_label');
  }
});

function showInfoBlock() {
  let infoBlock = document.getElementById('info-block');
  let arrow = document.getElementById('info-arrow');
  let fullHeight = parseInt(window.getComputedStyle(document.getElementById('info-text'), null).height);
  if(openInfoBlock){
      infoBlock.classList.remove('h-[154px]');
      infoBlock.style.height = fullHeight + 30 + 'px';
      arrow.style.transform = 'rotate(0deg)';
      openInfoBlock = false;
  }
  else{
      infoBlock.classList.add('h-[154px]');
      infoBlock.style.height = "154px";
      arrow.style.transform = 'rotate(-90deg)';
      openInfoBlock = true;
  }
}

function showRulesBlock() {
  let windowSize = window.screen.width;
  let rulesBlock = document.getElementById('rules-block');
  let arrow = document.getElementById('rules-arrow');
  if(openRulesBlock){
      rulesBlock.classList.remove('h-[180px]');
      rulesBlock.style.height = 1090 + 'px';
      arrow.style.transform = 'rotate(0deg)';
      openRulesBlock = false;
    }
    else{
      rulesBlock.classList.add('h-[180px]');
      rulesBlock.style.height = "180px";
      arrow.style.transform = 'rotate(-90deg)';
      openRulesBlock = true;
    }
}
