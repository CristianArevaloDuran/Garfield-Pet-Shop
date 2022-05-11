const sidebarButton = document.getElementById('sidebarContent');
const sidebarButton2 = document.getElementById('sidebarContent2');
const sidebarButton3 = document.getElementById('sidebarContent3');

const verCliente = document.getElementById('verCliente');

sidebarButton.addEventListener('click', ()=>{
    dropdownContent(sidebarButton);
})

sidebarButton2.addEventListener('click', ()=>{
    dropdownContent(sidebarButton2);
})

sidebarButton3.addEventListener('click', ()=>{
    dropdownContent(sidebarButton3);
})

function dropdownContent(buttonContent) {
    let dropdownArrow = buttonContent.querySelector('.arrow-down svg');
    let dropdownContent = buttonContent.nextElementSibling;
    let checkboxes = dropdownContent.querySelectorAll('.checkbox-input');
    let bases = dropdownContent.querySelectorAll('.base');

    if(buttonContent.classList.contains('dropdown-active')) {
        dropdownContent.style.maxHeight = 0;
        dropdownArrow.style.transform = 'rotate(0)';

        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });

        bases.forEach(base => {
            base.checked = false;
        });

        setTimeout(()=>{
            dropdownContent.classList.remove('dropdown-content-active');
            buttonContent.classList.remove('dropdown-active');
        },170)
    } else {
        buttonContent.classList.add('dropdown-active');
        dropdownContent.style.maxHeight = dropdownContent.scrollHeight + 85 + 'px';
        dropdownContent.classList.add('dropdown-content-active');
        dropdownArrow.style.transform = 'rotate(180deg)';
        bases.forEach(base => {
            base.checked = true;
        });
    }
}