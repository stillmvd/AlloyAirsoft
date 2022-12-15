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

let toggle = document.getElementById('toggle');
let page = document.documentElement;
let moon = document.getElementById('moon');
let sun = document.getElementById('sun');
let count = 0;//Счетчик для смены темы
// Меняют общую тему сайта

/**
 * Устанавливает темную тему для сайта
 *
 * @returns {void}
 */
function setDark() {
    localStorage.setItem('userTheme', 'dark');
    page.classList.add('dark');
    page.classList.remove('light');
    toggle.classList.add('dark');
    toggle.classList.remove('light');
}

/**
 * Устанавливает свтелую тему для сайта
 *
 * @returns {void}
 */
function setLight() {
    localStorage.setItem('userTheme', 'light');
    page.classList.remove('dark');
    page.classList.add('light');
    toggle.classList.remove('dark');
    toggle.classList.add('light');
}

/**
 * Меняет тему сайта
 *
 * @returns {void}
 */
function switchMode() {
    count++;
    if (count % 2 != 0){
        localStorage.setItem('switch', 'off');
        if (! toggle.classList.contains('dark')) {
            setDark();
        } else {
            setLight()
        }
    }
}

if (localStorage.getItem('switch') == 'on') {
    if (window.matchMedia('(prefers-color-scheme: dark)').matches == true) {
        localStorage.setItem('userTheme', 'dark');
    }
}

if (localStorage.getItem('userTheme') == null) {
    if (window.matchMedia('(prefers-color-scheme: dark)').matches == true) {
        localStorage.setItem('userTheme', 'dark');
    } else {
        localStorage.setItem('userTheme', 'light');
    }
}

if (localStorage.getItem('userTheme') == 'dark') {
    setDark();
    moon.classList.remove('swap-on');
    sun.classList.remove('swap-off');
    moon.classList.add('swap-off');
    sun.classList.add('swap-on');
} else {
    setLight();
    moon.classList.add('swap-on');
    sun.classList.add('swap-off');
    moon.classList.remove('swap-off');
    sun.classList.remove('swap-on');
}

document.getElementById('blockPhone').addEventListener('click', ()=>{
    var range = document.createRange();
    range.selectNode(document.getElementById("phone"));
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
})

document.getElementById('blockEmail').addEventListener('click', ()=>{
    var range = document.createRange();
    range.selectNode(document.getElementById("email"));
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
})