checkInputWithValidation();

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
    upLabel('label_name');
});
document.getElementById('input_name').addEventListener('blur', function() {
    downLabel('label_name');
    if (document.getElementById('input_name').value != '') {
        upLabel('label_name');
    } else {
        downLabel('label_name');
    }
});

document.getElementById('input_surname').addEventListener('focus', function() {
    upLabel('label_surname');
});
document.getElementById('input_surname').addEventListener('blur', function() {
    downLabel('label_surname');
    if (document.getElementById('input_surname').value != '') {
        upLabel('label_surname');
    } else {
        downLabel('label_surname');
    }
});

document.getElementById('input_callsign').addEventListener('focus', function() {
    upLabel('label_callsign');
});
document.getElementById('input_callsign').addEventListener('blur', function() {
    downLabel('label_callsign');
    if (document.getElementById('input_callsign').value != '') {
        upLabel('label_callsign');
    } else {
        downLabel('label_callsign');
    }
});

document.getElementById('input_phone').addEventListener('focus', function() {
    upLabel('label_phone');
});
document.getElementById('input_phone').addEventListener('blur', function() {
    downLabel('label_phone');
    if (document.getElementById('input_phone').value != '') {
        upLabel('label_phone');
    } else {
        downLabel('label_phone');
    }
});

function checkInputWithValidation() {
    downLabel('input_name');
    if (document.getElementById('input_name').value != '') {
        upLabel('label_name');
    } else {
        downLabel('label_name');
    }
    downLabel('input_surname');
    if (document.getElementById('input_surname').value != '') {
        upLabel('label_surname');
    } else {
        downLabel('label_surname');
    }
    downLabel('input_callsign');
    if (document.getElementById('input_callsign').value != '') {
        upLabel('label_callsign');
    } else {
        downLabel('label_callsign');
    }
    downLabel('input_phone');
    if (document.getElementById('input_phone').value != '') {
        upLabel('label_phone');
    } else {
        downLabel('label_phone');
    }
}

function findFile() {
    document.getElementById('hiddenFile').click();
}

var input = document.getElementById('hiddenFile');

input.oninput = function () {
    document.forms["avatarForm"].submit();
};

function deleteFile() {
    document.forms["deleteForm"].submit();
}

function onResponse(d) {  
    eval('var obj = ' + d + ';');  
    if (obj.success != 1) {
        alert('Ошибка!\nФайл ' + obj.filename + " не загружен - "+obj.myres); 
        return;
    } else {
        alert('Файл загружен');
    };
}