let first_cord = document.getElementById("first_cord");
let second_cord = document.getElementById("second_cord");

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(first_cord.textContent, second_cord.textContent),
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

// Register inputs and labels
function upFirstLineLabel (labelName) {
    let label = document.getElementById(labelName);
    label.classList.remove('mt-6');
    label.classList.remove('text-[20px]');
    label.classList.add('mt-2');
    label.classList.add('text-[13px]');
}
function downFirstLineLabel (labelName){
    let label = document.getElementById(labelName);
    label.classList.remove('mt-2');
    label.classList.remove('text-[13px]');
    label.classList.add('mt-6');
    label.classList.add('text-[20px]');
}
function upSecondLineLabel (labelName) {
    let label = document.getElementById(labelName);
    label.classList.remove('mt-[117px]');
    label.classList.remove('text-[20px]');
    label.style.margin = "100px 0px 0px 0px";
    label.classList.add('text-[13px]');
}
function downSecondLineLabel (labelName){
    let label = document.getElementById(labelName);
    label.style.margin = "0px 0px 0px 0px";
    label.classList.remove('text-[13px]');
    label.classList.add('text-[20px]');
    label.style.margin = "117px 0px 0px 0px";
}
function upThirdLineLabel (labelName) {
    let label = document.getElementById(labelName);
    label.classList.remove('mt-[214px]');
    label.classList.remove('text-[20px]');
    label.style.margin = "195px 0px 0px 0px";
    label.classList.add('text-[13px]');
}
function downThirdLineLabel (labelName){
    let label = document.getElementById(labelName);
    label.style.margin = "0px 0px 0px 0px";
    label.classList.remove('text-[13px]');
    label.classList.add('text-[20px]');
    label.style.margin = "214px 0px 0px 0px";
}

document.getElementById('input_first_name').addEventListener('focus', function() {
    upFirstLineLabel('label_input_first_name');
});
document.getElementById('input_email').addEventListener('focus', function() {
    upFirstLineLabel('label_input_email');
});

document.getElementById('input_second_name').addEventListener('focus', function() {
    upSecondLineLabel('label_input_second_name');
});
document.getElementById('input_phone').addEventListener('focus', function() {
    upSecondLineLabel('label_input_phone');
});

document.getElementById('input_call').addEventListener('focus', function() {
    upThirdLineLabel('label_input_call');
});
document.getElementById('input_team').addEventListener('focus', function() {
    upThirdLineLabel('label_input_team');
});

// blur
document.getElementById('input_first_name').addEventListener('blur', function() {
    downFirstLineLabel('label_input_first_name');
    if (document.getElementById('input_first_name').value != '') {
        upFirstLineLabel('label_input_first_name');
    }
    else{
        downFirstLineLabel('label_input_first_name');
    }
});
document.getElementById('input_email').addEventListener('blur', function() {
    downFirstLineLabel('label_input_email');
    if (document.getElementById('input_email').value != '') {
        upFirstLineLabel('label_input_email');
    }
    else{
        downFirstLineLabel('label_input_email');
    }
});

document.getElementById('input_second_name').addEventListener('blur', function() {
    downSecondLineLabel('label_input_second_name');
    if (document.getElementById('input_second_name').value != '') {
        upSecondLineLabel('label_input_second_name');
    }
    else{
        downSecondLineLabel('label_input_second_name');
    }
});
document.getElementById('input_phone').addEventListener('blur', function() {
    downSecondLineLabel('label_input_phone');
    if (document.getElementById('input_phone').value != '') {
        upSecondLineLabel('label_input_phone');
    }
    else{
        downSecondLineLabel('label_input_phone');
    }
});

document.getElementById('input_call').addEventListener('blur', function() {
    downThirdLineLabel('label_input_call');
    if (document.getElementById('input_call').value != '') {
        upThirdLineLabel('label_input_call');
    }
    else{
        downThirdLineLabel('label_input_call');
    }
});
document.getElementById('input_team').addEventListener('blur', function() {
    downThirdLineLabel('label_input_team');
    if (document.getElementById('input_team').value != '') {
        upThirdLineLabel('label_input_team');
    }
    else{
        downThirdLineLabel('label_input_team');
    }
});

