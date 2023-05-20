$document.ready(() => {
$(function() {
    checkInputWithValidation();
  
    function upLabel(labelName) {
      $('#' + labelName).css({
        'top': '-18px',
        'font-size': '12px'
      });
    }
  
    function downLabel(labelName) {
      $('#' + labelName).css({
        'top': '0px',
        'font-size': '16px'
      });
    }
  
    function showForm(cardName) {
      $('#' + cardName).css({
        'top': '-18px',
        'font-size': '12px'
      });
    }
  
    function hideForm(cardName) {
      $('#' + cardName).css({
        'top': '0px',
        'font-size': '16px'
      });
    }
  
    $('#input_email_log').on('focus', function() {
      upLabel('label_email_log');
    });
  
    $('#input_password_log').on('focus', function() {
      upLabel('label_password_log');
    });
  
    $('#input_email_log').on('blur', function() {
      const inputElement = $(this);
      const labelName = inputElement.attr('id').replace('input_', 'label_');
      inputElement.val() !== '' ? upLabel(labelName) : downLabel(labelName);
    });
  
    $('#input_password_log').on('blur', function() {
      const inputElement = $(this);
      const labelName = inputElement.attr('id').replace('input_', 'label_');
      inputElement.val() !== '' ? upLabel(labelName) : downLabel(labelName);
    });
  
    function checkInputWithValidation() {
      const inputEmailLog = $('#input_email_log');
      const inputPasswordLog = $('#input_password_log');
  
      downLabel('label_email_log');
      inputEmailLog.val() !== '' ? upLabel('label_email_log') : downLabel('label_email_log');
  
      downLabel('label_password_log');
      inputPasswordLog.val() !== '' ? upLabel('label_password_log') : downLabel('label_password_log');
    }
  });
})