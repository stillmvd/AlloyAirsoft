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