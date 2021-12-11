const minSidebar = document.getElementById('minSidebar');
const maxSidebar = document.getElementById('maxSidebar');
const openSidebar = document.getElementById('openSidebar');
const closeSidebar = document.getElementById('closeSidebar');
const blurMaxSidebar = document.getElementById('blurMaxSidebar');

openSidebar.addEventListener('click', sidebarToggle);
closeSidebar.addEventListener('click', sidebarToggle);

function sidebarToggle(event) {
    if(minSidebar.classList.contains('min-sidebar-close')) {
        minSidebar.classList.remove('min-sidebar-close');
        maxSidebar.classList.remove('max-sidebar-active');
        blurMaxSidebar.classList.remove('blur-max-sidebar-active');
    } else {
        minSidebar.classList.add('min-sidebar-close');
        maxSidebar.classList.add('max-sidebar-active');
        blurMaxSidebar.classList.add('blur-max-sidebar-active');
    }
}