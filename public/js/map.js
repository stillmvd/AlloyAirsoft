let firstCord = document.getElementById("first_cord");
let secondCord = document.getElementById("second_cord");
let openRulesBlock = true;
let openInfoBlock = true;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(firstCord.textContent, secondCord.textContent),
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
          ]
    });
}

window.initMap = initMap;

function upLabel(labelName) {
  let label = document.getElementById(labelName);
  label.style.top = '-18px';
}

function downLabel(labelName) {
  let label = document.getElementById(labelName);
  label.style.top = '0px';
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
  let infoBlock = document.getElementById('info_block');
  let arrow = document.getElementById('info_arrow');
  let firstHeight = parseInt(window.getComputedStyle(document.getElementById('first_text'), null).height);
  let secondHeight = parseInt(window.getComputedStyle(document.getElementById('second_text'), null).height);
  let fullHeight = firstHeight + secondHeight + 70 + "px";
  if(openInfoBlock){
      infoBlock.classList.remove('h-[130px]');
      infoBlock.style.height = fullHeight;
      arrow.style.transform = 'rotate(90deg)';
      openInfoBlock = false;
  }
  else{
      infoBlock.classList.add('h-[130px]');
      infoBlock.style.height = "130px";
      arrow.style.transform = 'rotate(0deg)';
      openInfoBlock = true;
  }
}

function showRulesBlock() {
  let rulesBlock = document.getElementById('rules_block');
  let arrow = document.getElementById('rules_arrow');
    if(openRulesBlock){
        rulesBlock.classList.remove('h-[160px]');
        rulesBlock.style.height = '860px';
        arrow.style.transform = 'rotate(90deg)';
        openRulesBlock = false;
    }
    else{
        rulesBlock.classList.add('h-[160px]');
        rulesBlock.style.height = "160px";
        arrow.style.transform = 'rotate(0deg)';
        openRulesBlock = true;
    }
}
