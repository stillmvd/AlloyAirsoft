$document.ready(() => {
$(function() {
    const inputEmailReg = $('#input_email_reg');
    const inputPasswordReg = $('#input_password_reg');
    const labelEmailReg = $('#label_email_reg');
    const labelPasswordReg = $('#label_password_reg');
  
    checkInputWithValidation();
  
    function updateLabel(labelName, topValue, fontSizeValue) {
      $('#' + labelName).css({
        'top': topValue,
        'font-size': fontSizeValue
      });
    }
  
    $('#input_email_reg, #input_password_reg').on('focus', function() {
      const labelName = $(this).attr('id').replace('input_', 'label_');
      updateLabel(labelName, '-18px', '12px');
    });
  
    $('#input_email_reg, #input_password_reg').on('blur', function() {
      const labelName = $(this).attr('id').replace('input_', 'label_');
      const inputValue = $(this).val();
      inputValue !== '' ? updateLabel(labelName, '-18px', '12px') : updateLabel(labelName, '0px', '16px');
    });
  
    function checkInputWithValidation() {
      const emailValue = inputEmailReg.val();
      const passwordValue = inputPasswordReg.val();
  
      updateLabel('label_email_reg', '0px', '16px');
      emailValue !== '' ? updateLabel('label_email_reg', '-18px', '12px') : updateLabel('label_email_reg', '0px', '16px');
  
      updateLabel('label_password_reg', '0px', '16px');
      passwordValue !== '' ? updateLabel('label_password_reg', '-18px', '12px') : updateLabel('label_password_reg', '0px', '16px');
    }
  });
})