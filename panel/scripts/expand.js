const profileModalButton1 = document.getElementById("profileModalButton1");
const profileModalButton2 = document.getElementById("profileModalButton2");
const profileModalButton3 = document.getElementById("profileModalButton3");
const profileModalButton4 = document.getElementById("profileModalButton4");
const profileModal = document.getElementById("profileModal");
const profileModalClose = document.getElementById("profileModalClose");
const profileModalContent = document.getElementById("profileModalContent");

profileModalButton1.addEventListener("click", openModal);
profileModalButton2.addEventListener("click", openModal);
profileModalButton3.addEventListener("click", openModal);
profileModalButton4.addEventListener("click", openModal);
profileModalClose.addEventListener("click", closeModal);
profileModal.addEventListener('click', closeModal);

function openModal(event) {
    profileModal.style.display = "flex";
    setTimeout(()=>{
        profileModalContent.style.width = "70%";
    }, 1);
}

function closeModal(event) {
    profileModalContent.style.width = "50%";   
    setTimeout(()=>{
        profileModal.style.display = "none";
    }, 170);
}