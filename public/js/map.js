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
let body = document.getElementById("body");
checkInputWithValidation()

function initMap() {
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
    const contentString =
    "<p>" + document.getElementById('info').innerHTML + "</p>";

    let marker = new google.maps.Marker({
        position: new google.maps.LatLng(map_1cord.textContent, map_2cord.textContent),
        map,
        animation: google.maps.Animation.DROP,
        icon: image,
    });

    const infowindow = new google.maps.InfoWindow({
        content: contentString,
    });

    infowindow.open({
        anchor: marker,
        map,
        shouldFocus: false,
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

function checkInputWithValidation(){
    if (document.getElementById('input_name').value != '') {
        upLabel('name_label');
    } else {
        downLabel('name_label');
    }
    if (document.getElementById('input_surname').value != '') {
        upLabel('surname_label');
    } else {
        downLabel('surname_label');
    }
    if (document.getElementById('input_callsign').value != '') {
        upLabel('callsign_label');
    } else {
        downLabel('callsign_label');
    }
    downLabel('email_label');
    if (document.getElementById('input_email').value != '') {
        upLabel('email_label');
    } else {
        downLabel('email_label');
    }
    if (document.getElementById('input_phone').value != '') {
        upLabel('phone_label');
    } else {
        downLabel('phone_label');
    }
    downLabel('team_label');
    if (document.getElementById('input_team').value != '') {
        upLabel('team_label');
    } else {
        downLabel('team_label');
    }
}

var countDownDate = new Date(document.getElementById('countdown').textContent).getTime();
var x = setInterval(function() {
    var now = new Date().getTime();

    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById('days').setAttribute('style', ('--value:' + days));
    document.getElementById('hours').setAttribute('style', ('--value:' + hours));
    document.getElementById('min').setAttribute('style', ('--value:' + minutes));
    document.getElementById('sec').setAttribute('style', ('--value:' + seconds));

    if (distance < 0) {
        clearInterval(x);
        document.getElementById('days').setAttribute('style', ('--value:' + 0));
        document.getElementById('hours').setAttribute('style', ('--value:' + 0));
        document.getElementById('min').setAttribute('style', ('--value:' + 0));
        document.getElementById('sec').setAttribute('style', ('--value:' + 0));
    }
}, 1000);

function createInfoSquare() {
    setTimeout(() => {
        let infoSquare = document.getElementById('infoSquare');
        let infoBlockHeight = document.getElementById('infoBlock').clientHeight;
        let infoBlockWidth = document.getElementById('infoBlock').clientWidth;
        infoSquare.classList.add('duration-500');
        infoSquare.style.height = infoBlockHeight + 'px';
        infoSquare.style.width = infoBlockWidth + 'px';
        infoSquare.style.opacity = 70 + '%';
        infoSquare.style.right = -20 + 'px';
        infoSquare.style.bottom = -20 + 'px';
    }, 100);
}
function removeInfoSquare() {
    let infoSquare = document.getElementById('infoSquare');
    infoSquare.classList.remove('duration-500');
    infoSquare.style.height = 0 + 'px';
    infoSquare.style.width = 0 + 'px';
    infoSquare.style.opacity = 0 + '%';
    infoSquare.style.right = 0 + 'px';
    infoSquare.style.bottom = 0 + 'px';
}

function createRulesSquare() {
    setTimeout(() => {
        let rulesSquare = document.getElementById('rulesSquare');
        let rulesBlockHeight = document.getElementById('rulesBlock').clientHeight;
        let rulesBlockWidth = document.getElementById('rulesBlock').clientWidth;
        rulesSquare.classList.add('duration-500');
        rulesSquare.style.height = rulesBlockHeight + 'px';
        rulesSquare.style.width = rulesBlockWidth + 'px';
        rulesSquare.style.opacity = 70 + '%';
        rulesSquare.style.right = -20 + 'px';
        rulesSquare.style.bottom = -20 + 'px';
    }, 150);
}
function removeRulesSquare() {
    let rulesSquare = document.getElementById('rulesSquare');
    rulesSquare.classList.remove('duration-500');
    rulesSquare.style.height = 0 + 'px';
    rulesSquare.style.width = 0 + 'px';
    rulesSquare.style.opacity = 0 + '%';
    rulesSquare.style.right = 0 + 'px';
    rulesSquare.style.bottom = 0 + 'px';
}

document.getElementById('googleMap').setAttribute('href', 'https://www.google.ru/maps/@'+ map_1cord.textContent +','+ map_2cord.textContent +',17.75z');