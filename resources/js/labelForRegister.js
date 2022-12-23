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

document.getElementById('input_email_reg').addEventListener('focus', function() {
    upLabel('label_email_reg');
});
document.getElementById('input_password_reg').addEventListener('focus', function() {
    upLabel('label_password_reg');
});

document.getElementById('input_email_reg').addEventListener('blur', function() {
    downLabel('label_email_reg');
    if (document.getElementById('input_email_reg').value != '') {
        upLabel('label_email_reg');
    } else {
        downLabel('label_email_reg');
    }
});
document.getElementById('input_password_reg').addEventListener('blur', function() {
    downLabel('label_password_reg');
    if (document.getElementById('input_password_reg').value != '') {
        upLabel('label_password_reg');
    } else {
        downLabel('label_password_reg');
    }
});

function checkInputWithValidation(){
    downLabel('label_email_reg');
    if (document.getElementById('input_email_reg').value != '') {
        upLabel('label_email_reg');
    } else {
        downLabel('label_email_reg');
    }
    if (document.getElementById('input_password_reg').value != '') {
        upLabel('label_password_reg');
    } else {
        downLabel('label_password_reg');
    }
}

