// rules column mechanism
let rulesCount = document.getElementsByClassName('rulesBlock').length;
let rulesTitle = [],
    rulesText = [],
    rulesBlocks = [];
setRuleIdAndNameInput();
function setRuleIdAndNameInput(){
    let rulesBlocks = document.getElementsByClassName('rulesBlock');
    document.getElementById('rulesCount').value = rulesBlocks.length;
    for (let i = 0; i < rulesBlocks.length; i++){
        rulesBlocks[i].setAttribute('id', ('rulesBlock'+i));
        rulesBlocks[i].childNodes[1].name = 'rulesTitle' + i;
        rulesBlocks[i].childNodes[3].name = 'rulesText' + i;
    };
}

function addRulesColumns() {
    let rulesBlock = document.getElementsByClassName('rulesBlock')[0];
    let rulesAdded = document.getElementById('rulesAdded');
    rulesAdded.insertAdjacentHTML('beforebegin', rulesBlock.outerHTML);
    setRuleIdAndNameInput();
}

function removeRulesColumns() {
    let length = document.getElementsByClassName('rulesBlock').length;
    if (length <= 1){

    } else {
        let rulesBlock = document.getElementById('rulesBlock' + (length-1));
        rulesBlock.remove();
        document.getElementById('rulesCount').value = length;
    }
}

// prices column mechanism
let pricesCount = document.getElementsByClassName('pricesBlock').length;
let pricesTitle = [],
    pricesText = [],
    pricesBlocks = [];
setPriceIdAndNameInput();
function setPriceIdAndNameInput(){
    let pricesBlocks = document.getElementsByClassName('pricesBlock');
    document.getElementById('pricesCount').value = pricesBlocks.length;
    for (let i = 0; i < pricesBlocks.length; i++){
        pricesBlocks[i].setAttribute('id', ('pricesBlock'+i));
        pricesBlocks[i].childNodes[1].name = 'pricesTitle' + i;
        pricesBlocks[i].childNodes[3].name = 'pricesText' + i;
    };
}

function addPriceColumns() {
    let pricesBlock = document.getElementsByClassName('pricesBlock')[0];
    let pricesAdded = document.getElementById('pricesAdded');
    pricesAdded.insertAdjacentHTML('beforebegin', pricesBlock.outerHTML);
    setPriceIdAndNameInput();
}

function removePriceColumns() {
    let length = document.getElementsByClassName('pricesBlock').length;
    if (length <= 1){

    } else {
        let pricesBlock = document.getElementById('pricesBlock' + (length-1));
        pricesBlock.remove();
        document.getElementById('pricesCount').value = length;
    }
}