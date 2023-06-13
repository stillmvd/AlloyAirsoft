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
document.getElementById('input_email_reg').addEventListener('focus', function() {
    upLabel('label_email_reg');
});
document.getElementById('input_password_reg').addEventListener('focus', function() {
    upLabel('label_password_reg');
});

document.getElementById('input_name_reg').addEventListener('focus', function() {
    upLabel('label_name_reg');
});
document.getElementById('input_surname_reg').addEventListener('focus', function() {
    upLabel('label_surname_reg');
});

document.getElementById('input_callsign_reg').addEventListener('focus', function() {
    upLabel('label_callsign_reg');
});
document.getElementById('input_number_reg').addEventListener('focus', function() {
    upLabel('label_number_reg');
});



document.getElementById('input_email_reg').addEventListener('blur', function() {
    downLabel('label_email_reg');
    if (document.getElementById('input_email_reg').value !== '') {
        upLabel('label_email_reg');
    } else {
        downLabel('label_email_reg');
    }
});
document.getElementById('input_password_reg').addEventListener('blur', function() {
    downLabel('label_password_reg');
    if (document.getElementById('input_password_reg').value !== '') {
        upLabel('label_password_reg');
    } else {
        downLabel('label_password_reg');
    }
});

document.getElementById('input_name_reg').addEventListener('blur', function() {
    downLabel('label_name_reg');
    if (document.getElementById('input_name_reg').value !== '') {
        upLabel('label_name_reg');
    } else {
        downLabel('label_name_reg');
    }
});
document.getElementById('input_surname_reg').addEventListener('blur', function() {
    downLabel('label_surname_reg');
    if (document.getElementById('input_surname_reg').value !== '') {
        upLabel('label_surname_reg');
    } else {
        downLabel('label_surname_reg');
    }
});

document.getElementById('input_callsign_reg').addEventListener('blur', function() {
    downLabel('label_callsign_reg');
    if (document.getElementById('input_callsign_reg').value !== '') {
        upLabel('label_callsign_reg');
    } else {
        downLabel('label_callsign_reg');
    }
});
document.getElementById('input_number_reg').addEventListener('blur', function() {
    downLabel('label_number_reg');
    if (document.getElementById('input_number_reg').value !== '') {
        upLabel('label_number_reg');
    } else {
        downLabel('label_number_reg');
    }
});

function checkInputWithValidation(){
    downLabel('label_email_reg');
    if (document.getElementById('input_email_reg').value !== '') {
        upLabel('label_email_reg');
    } else {
        downLabel('label_email_reg');
    }
    if (document.getElementById('input_password_reg').value !== '') {
        upLabel('label_password_reg');
    } else {
        downLabel('label_password_reg');
    }
}

