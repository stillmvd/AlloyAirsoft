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

function showForm(cardName) {
    let card = document.getElementById(cardName);
    card.style.top = '-18px';
    card.style.fontSize = '12px';
}

function hideForm(cardName) {
    let card = document.getElementById(cardName);
    card.style.top = '0px';
    card.style.fontSize = '16px';
}

document.getElementById('input_email_log').addEventListener('focus', function() {
    upLabel('email_label_log');
});
document.getElementById('input_password_log').addEventListener('focus', function() {
    upLabel('password_label_log');
});
document.getElementById('input_email_reg').addEventListener('focus', function() {
    upLabel('email_label_reg');
});
document.getElementById('input_password_reg').addEventListener('focus', function() {
    upLabel('password_label_reg');
});

document.getElementById('input_email_reg').addEventListener('blur', function() {
    downLabel('email_label_reg');
    if (document.getElementById('input_email_reg').value != '') {
        upLabel('email_label_reg');
    } else {
        downLabel('email_label_reg');
    }
});
document.getElementById('input_password_reg').addEventListener('blur', function() {
    downLabel('password_label_reg');
    if (document.getElementById('input_password_reg').value != '') {
        upLabel('password_label_reg');
    } else {
        downLabel('password_label_reg');
    }
});
document.getElementById('input_email_log').addEventListener('blur', function() {
    downLabel('email_label_log');
    if (document.getElementById('input_email_log').value != '') {
        upLabel('email_label_log');
    } else {
        downLabel('email_label_log');
    }
});
document.getElementById('input_password_log').addEventListener('blur', function() {
    downLabel('password_label_log');
    if (document.getElementById('input_password_log').value != '') {
        upLabel('password_label_log');
    } else {
        downLabel('password_label_log');
    }
});

function checkInputWithValidation(){
    downLabel('email_label_reg');
    if (document.getElementById('input_email_reg').value != '') {
        upLabel('email_label_reg');
    } else {
        downLabel('email_label_reg');
    }
    if (document.getElementById('input_password_reg').value != '') {
        upLabel('password_label_reg');
    } else {
        downLabel('password_label_reg');
    }
    if (document.getElementById('input_email_log').value != '') {
        upLabel('email_label_log');
    } else {
        downLabel('email_label_log');
    }
    if (document.getElementById('input_password_log').value != '') {
        upLabel('password_label_log');
    } else {
        downLabel('password_label_log');
    }
}

