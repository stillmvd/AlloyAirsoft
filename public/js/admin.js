//Waiting for the document to be fully loaded before executing the code inside the function 
$document.ready(() => {
    // rules column mechanism
    let rulesCount = $('.rulesBlock').length;
   
    //The function sets the ID and name attributes of elements within a set of rules blocks
    const setRuleIdAndNameInput = () =>{
        $('.rulesBlock').each((idx, element) => {
            let $element = $(element);
            $element.attr('id', 'rulesBlock' + idx);
            $element.children().eq(1).attr('name', 'rulesTitle' + idx);
            $element.children().eq(3).attr('name', 'rulesText' + idx);
        });
        $('#rulesCount').val(rulesCount);
    }

    //Function adds a copy of a rules block before the "rulesAdded" element and sets the ID and 
    //name attributes of the input fields
    const addRulesColumns = () =>{
        let rulesBlock = $('.rulesBlock').first().clone();
        $('#rulesAdded').before(rulesBlock);
        setRuleIdAndNameInput();
    }
    
    // The function removes the last column of a set of rules blocks and updates the count of remaining blocks
    // Returns nothing (undefined) when the length of the rulesBlock is less than or equal to 1  
    const removeRulesColumns = () =>{
        let rulesBlock = $('.rulesBlock');
        if (rulesBlock.length <= 1){
            return;                              //! Return undefined?
        }
        else{
            rulesBlock.last().remove();
            rulesCount = rulesBlock.length;
            $('#rulesCount').val(rulesCount);
        }
    }

    // prices column mechanism
    let pricesCount = $('.pricesBlock').length;

    //Function sets the ID and name attributes for a group of price blocks in a page
    const setPriceIdAndNameInput = () =>{
        $('.pricesBlock').each((idx, element) => {
            let $element = $(element);
            $element.attr('id', 'pricesBlock' + idx);
            $element.children().eq(1).attr('name', 'pricesTitle' + idx);
            $element.children().eq(3).attr('name', 'pricesText' + idx);
        });
        $('#pricesCount').val(pricesCount);           
    }

    //The function adds a price column to a block of prices and sets the input ID and name.
    const addPriceColumns = () =>{
        let pricesBlock = $('.pricesBlock').first().clone();
        $('#pricesAdded').before(pricesBlock);
        setPriceIdAndNameInput();
    }

    //The function removes the last price column from a block of prices and updates the count of prices.
    //If the length of the pricesBlock is less than or equal to 1, nothing is returned.
    //Otherwise, the last pricesBlock is removed and the updated length is returned.
    const removePriceColumns = () =>{
        let pricesBlock = $('.pricesBlock');
        if (pricesBlock.length <= 1){
            return;                         //! Return undefined?
        }
        else{
            pricesBlock.last().remove();
            pricesCount = pricesBlock.length;
            $('#pricesCount').val(pricesCount);
        }
    }

    setRuleIdAndNameInput();
    setPriceIdAndNameInput();

    // $('#addRulesBtn').on('click', addRulesColumns);
    // $('#removeRulesBtn').on('click', removeRulesColumns);
    // $('#addPriceBtn').on('click', addPriceColumns);
    // $('#removePriceBtn').on('click', removePriceColumns);
})