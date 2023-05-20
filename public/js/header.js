$document.ready(() => {
function openMenu() {
  let links = $('#links');
  let menu = $('#menu');

  links.removeClass('invisible');
  links.css('width', '20%');
  menu.css({
    'padding': '8px 40px 8px 40px',
    'border-radius': '16px'
  });
}

function closeMenu() {
  let links = $('#links');
  let menu = $('#menu');
  setTimeout(() => {
    links.addClass('invisible');
    links.css('width', '10%');
  }, 100);
  setTimeout(() => {
    menu.css({
      'padding': '8px',
      'border-radius': '9999px'
    });
  }, 400);
}
})