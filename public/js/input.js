checkInputWithValidation();

function upLabel(labelName) {
    let label = document.getElementById(labelName);
    console.log('1');
    label.style.top = '-18px';
    label.style.fontSize = '12px';
}

function downLabel(labelName) {
    let label = document.getElementById(labelName);
    label.style.top = '0px';
    label.style.fontSize = '16px';
}

document.getElementById('input_email').addEventListener('focus', function() {
    upLabel('email_label');
});

document.getElementById('input_password').addEventListener('focus', function() {
    upLabel('password_label');
});

document.getElementById('input_email2').addEventListener('focus', function() {
    upLabel('email_label2');
});

document.getElementById('input_password2').addEventListener('focus', function() {
    upLabel('password_label2');
});

document.getElementById('input_email').addEventListener('blur', function() {
    downLabel('email_label');
    if (document.getElementById('input_email').value != '') {
        upLabel('email_label');
    } else {
        downLabel('email_label');
    }
});

document.getElementById('input_password').addEventListener('blur', function() {
    downLabel('password_label');
    if (document.getElementById('input_password').value != '') {
        upLabel('password_label');
    } else {
        downLabel('password_label');
    }
});

document.getElementById('input_email2').addEventListener('blur', function() {
    downLabel('email_label2');
    if (document.getElementById('input_email2').value != '') {
        upLabel('email_label2');
    } else {
        downLabel('email_label2');
    }
});

document.getElementById('input_password2').addEventListener('blur', function() {
    downLabel('password_label2');
    if (document.getElementById('input_password2').value != '') {
        upLabel('password_label2');
    } else {
        downLabel('password_label2');
    }
});

function checkInputWithValidation(){
    downLabel('email_label');
    if (document.getElementById('input_email').value != '') {
        upLabel('email_label');
    } else {
        downLabel('email_label');
    }
    if (document.getElementById('input_password').value != '') {
        upLabel('password_label');
    } else {
        downLabel('password_label');
    }
    downLabel('email_label2');
    if (document.getElementById('input_email2').value != '') {
        upLabel('email_label2');
    } else {
        downLabel('email_label2');
    }
    if (document.getElementById('input_password2').value != '') {
        upLabel('password_label2');
    } else {
        downLabel('password_label2');
    }
}
