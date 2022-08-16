function setIdAndNameInput(){
    let blocks = document.getElementsByClassName('block');
    for (let i = 0; i < blocks.length; i++){
        blocks[i].setAttribute('id', ('block'+i));
        blocks[i].childNodes[1].name = 'title' + i;
        blocks[i].childNodes[3].name = 'text' + i;
    };
}

function addColumns() {
    let block = document.getElementsByClassName('block')[0];
    let added = document.getElementById('added');
    added.insertAdjacentHTML('beforebegin', block.outerHTML);
    setIdAndNameInput();
}

function removeColumns() {
    let length = document.getElementsByClassName('block').length;
    if (length <= 1){

    }
    else{
        let block = document.getElementById('block' + (length-1));
        block.id = ''
        block.classList.add('hidden');
        block.classList.remove('block');
    }
}

