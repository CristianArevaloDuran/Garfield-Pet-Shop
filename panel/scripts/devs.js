const devsModalButton1 = document.getElementById("devsModalButton1");
const devsModalButton2 = document.getElementById("devsModalButton2");
const devsModal = document.getElementById("devsModal");
const devsModalClose = document.getElementById("devsModalClose");
const devsModalContent = document.getElementById("devsModalContent");

devsModalButton1.addEventListener("click", openModal);
devsModalButton2.addEventListener("click", openModal);
devsModalClose.addEventListener("click", closeModal);
devsModal.addEventListener('click', (e)=>{
    if(e.target.classList.contains("devs-modal")) {
        devsModalContent.style.width = "50%";   
        setTimeout(()=>{
            devsModal.style.display = "none";
        }, 170);
    }
});

function openModal() {
    devsModal.style.display = "flex";
    setTimeout(()=>{
        devsModalContent.style.width = "70%";
    }, 1);
}

function closeModal(e) {
    devsModalContent.style.width = "50%";   
    setTimeout(()=>{
        devsModal.style.display = "none";
    }, 170);
}