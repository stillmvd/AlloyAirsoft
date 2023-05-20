$document.ready(() => {
    let openRulesBlock = true;
    let openInfoBlock = true;
    let body = $('body');
    const inputFields = ['#input_name', '#input_surname', '#input_callsign', '#input_email', '#input_phone', '#input_team'];
    checkInputWithValidation();

    const upLabel = (labelName) => {
        $(`#${labelName}`).css({
            'top': '-18px',
            'fontSize': '12px'
        });
    };

    const downLabel = (labelName) => {
        $(`#${labelName}`).css({
            'top': '0px',
            'fontSize': '16px'
        });
    };

    inputFields.forEach((field) => {
        $(field).on('focus', () => {
            upLabel(`${field.slice(1)}_label`);
        });
    
        $(field).on('blur', () => {
            downLabel(`${field.slice(1)}_label`);
            $(field).val() !== '' ? upLabel(`${field.slice(1)}_label`) : downLabel(`${field.slice(1)}_label`);
        });
    });

    function checkInputWithValidation() {
        inputFields.forEach((field) => {
            $(field).val() !== '' ? upLabel(`${field.slice(1)}_label`) : downLabel(`${field.slice(1)}_label`);
        });
    }

    const countDownElement = $('#countdown');
    if (countDownElement.length) {
    const countDownDate = new Date(countDownElement.text()).getTime();
    const daysElement = $('#days');
    const hoursElement = $('#hours');
    const minutesElement = $('#min');
    const secondsElement = $('#sec');

    const updateCountdown = () => {
        const now = new Date().getTime();
        const distance = countDownDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        daysElement?.css('--value', days);
        hoursElement?.css('--value', hours);
        minutesElement?.css('--value', minutes);
        secondsElement?.css('--value', seconds);

        if (distance < 0) {
            clearInterval(interval);
            daysElement?.css('--value', 0);
            hoursElement?.css('--value', 0);
            minutesElement?.css('--value', 0);
            secondsElement?.css('--value', 0);
        }
    };

    updateCountdown();
    const interval = setInterval(updateCountdown, 1000);
    }

    const animateSquare = (square, block) => {
        setTimeout(() => {
            square.addClass('duration-500');
            square.css({
                'height': block.height() + 'px',
                'width': block.width() + 'px',
                'opacity': '.7',
                'right': '-20px',
                'bottom': '-20px'
            });
        }, 100);
    };
    
    const removeSquare = (square) => {
        square.removeClass('duration-500');
        square.css({
            'height': '0px',
            'width': '0px',
            'opacity': '0',
            'right': '0px',
            'bottom': '0px'
        });
    };
    
    const createInfoSquare = () => {
        const infoSquare = $('#infoSquare');
        const infoBlock = $('#infoBlock');
        animateSquare(infoSquare, infoBlock);
    };
    
    const removeInfoSquare = () => {
        const infoSquare = $('#infoSquare');
        removeSquare(infoSquare);
    };
    
    const createRulesSquare = () => {
        const rulesSquare = $('#rulesSquare');
        const rulesBlock = $('#rulesBlock');
        animateSquare(rulesSquare, rulesBlock);
    };
    
    const removeRulesSquare = () => {
        const rulesSquare = $('#rulesSquare');
        removeSquare(rulesSquare);
    };
    
    createInfoSquare();
    createRulesSquare();   

    const festivalPassFoodCheckbox = $('#Festival pass + food');
    const gamePassCheckbox = $('#Game pass');
    const rentCheckbox = $('#Rent');
    const finalPrice = $('#finalyPrice');
    const priceInput = $('#price');

    function updatePrice() {
        const gamePassChecked = gamePassCheckbox.is(':checked');
        const festivalPassChecked = festivalPassFoodCheckbox.is(':checked');
        const rentChecked = rentCheckbox.is(':checked');

        let price = 0;

        if (gamePassChecked && festivalPassChecked && rentChecked) {
            price = 130;
        } else if (gamePassChecked && !festivalPassChecked && !rentChecked) {
            price = 60;
        } else if (!gamePassChecked && festivalPassChecked && !rentChecked) {
            price = 40;
        } else if (!gamePassChecked && !festivalPassChecked && rentChecked) {
            price = 30;
        } else if (gamePassChecked && festivalPassChecked && !rentChecked) {
            price = 100;
        } else if (!gamePassChecked && festivalPassChecked && rentChecked) {
            price = 70;
        } else if (gamePassChecked && !festivalPassChecked && rentChecked) {
            price = 90;
        }

        finalPrice.text(`${price}$`);
        priceInput.val(price);
    }

    festivalPassFoodCheckbox.on('change', updatePrice);
    gamePassCheckbox.on('change', updatePrice);
    rentCheckbox.on('change', updatePrice);
})