function openMenu() {
    let links = document.getElementById('links');
    let menu = document.getElementById('menu');

    links.classList.remove('invisible');
    links.style.width = 20 + '%';
    menu.style.padding = '8px 40px 8px 40px';
    menu.style.borderRadius = '16px';
}

function closeMenu() {
    let links = document.getElementById('links');
    let menu = document.getElementById('menu');
    setTimeout(() => {
      links.classList.add('invisible');
      links.style.width = 10 + '%';
    }, 100);
    setTimeout(() => {
      menu.style.padding = '8px';
      menu.style.borderRadius = '9999px';
    }, 400);
}
