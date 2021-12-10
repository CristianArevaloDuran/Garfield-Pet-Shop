const profileModalButton1 = document.getElementById("profileModalButton1");
const profileModalButton2 = document.getElementById("profileModalButton2");
const profileModal = document.getElementById("profileModal");
const profileModalClose = document.getElementById("profileModalClose");
const profileModalContent = document.getElementById("profileModalContent");

profileModalButton1.addEventListener("click", openModal);
profileModalButton2.addEventListener("click", openModal);
profileModalClose.addEventListener("click", closeModal);

function openModal(event) {
    profileModal.style.display = "flex";
    setTimeout(()=>{
        profileModalContent.style.width = "70%";
    }, 50);
}

function closeModal(event) {
    profileModalContent.style.width = "50%";   
    setTimeout(()=>{
        profileModal.style.display = "none";
    }, 200);
}