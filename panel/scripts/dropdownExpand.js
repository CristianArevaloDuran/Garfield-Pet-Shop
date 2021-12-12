const sidebarButton1 = document.getElementById('sidebarContent1');
const sidebarButton2 = document.getElementById('sidebarContent2');
const sidebarButton3 = document.getElementById('sidebarContent3');
const sidebarButton4 = document.getElementById('sidebarContent4');
const sidebarButton5 = document.getElementById('sidebarContent5');
const sidebarButton6 = document.getElementById('sidebarContent6');

sidebarButton1.addEventListener('click', ()=>{
    sidebarToggle();
    dropdownContent(sidebarButton4, sidebarButton1);
})

sidebarButton2.addEventListener('click', ()=>{
    sidebarToggle();
    dropdownContent(sidebarButton5, sidebarButton2);
})

sidebarButton3.addEventListener('click', ()=>{
    sidebarToggle();
    dropdownContent(sidebarButton6, sidebarButton3);
})

sidebarButton4.addEventListener('click', ()=>{
    dropdownContent(sidebarButton4, sidebarButton1);
})

sidebarButton5.addEventListener('click', ()=>{
    dropdownContent(sidebarButton5, sidebarButton2);
})

sidebarButton6.addEventListener('click', ()=>{
    dropdownContent(sidebarButton6, sidebarButton3);
})



function dropdownContent(buttonContent, button) {
    let currentActive = document.querySelector('.dropdown-active');
    let dropdownArrow = buttonContent.querySelector('.arrow-down svg');
    let currentDropdownArrow = document.querySelector('.dropdown-active .arrow-down svg');
    let dropdownContentBlock = buttonContent.nextElementSibling;
    let anchorDropdown = dropdownContentBlock.querySelectorAll('.content a');
    let dropdownContent = buttonContent.nextElementSibling;
    let currentButton = document.querySelector('.button-active');

    if(currentActive && currentActive !== buttonContent) {
        let currentDropdownContentBlock = document.querySelector('.dropdown-active').nextElementSibling;
        let currentAnchorDropdown = currentDropdownContentBlock.querySelectorAll('.content a');
        currentActive.classList.toggle('dropdown-active');
        currentButton.classList.toggle('button-active');
        currentActive.nextElementSibling.style.maxHeight = 0;
        currentDropdownArrow.style.transform = 'rotate(0)';
        for(i = 0; i < currentAnchorDropdown.length; i ++) {
            currentAnchorDropdown[i].style.opacity = 0;
        }
        setTimeout(()=>{
            currentActive.nextElementSibling.classList.remove('dropdown-content-active');
        },250)
    }

    if(buttonContent.classList.contains('dropdown-active')) {
        dropdownContent.style.maxHeight = 0;
        button.classList.remove('button-active');
        dropdownArrow.style.transform = 'rotate(0)';
        for(i = 0; i < anchorDropdown.length; i ++) {
            anchorDropdown[i].style.opacity = 0;
        }
        setTimeout(()=>{
            dropdownContent.classList.remove('dropdown-content-active');
            buttonContent.classList.remove('dropdown-active');
        },170)
    } else {
        buttonContent.classList.add('dropdown-active');
        button.classList.add('button-active');
        dropdownContent.style.maxHeight = dropdownContent.scrollHeight + 85 + 'px';
        dropdownContent.classList.add('dropdown-content-active');
        dropdownArrow.style.transform = 'rotate(180deg)';
        for(i = 0; i < anchorDropdown.length; i ++) {
            anchorDropdown[i].style.opacity = 1;
        }
    }
}