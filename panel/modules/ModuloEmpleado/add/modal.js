let imgModal = document.querySelector(".img-select-modal");
let userImg = document.querySelector(".user-img");
let cancelButton = document.querySelector(".cancel");
let modalContent = imgModal.querySelector(".content");

userImg.addEventListener("click", openModal);
cancelButton.addEventListener("click", closeModal);
imgModal.addEventListener("click", (e)=>{
    if(e.target == imgModal) {
        closeModal();
    }
})

function openModal(e) {
    imgModal.style.display = "flex";
    setTimeout(()=>{
        modalContent.style.width = "80%";
        modalContent.style.maxHeight = "80%";
    },1)
}

function closeModal(e) {
    modalContent.style.width = "60%";
    modalContent.style.maxHeight = "60%";
    setTimeout(()=>{
        imgModal.style.display = "none";
    },200)
}

let iconButtons = document.querySelectorAll(".imagen .icon");
let selectButton = document.querySelector(".actions .select");

iconButtons.forEach(iconButton => {
    iconButton.addEventListener("click", ()=>{
        let current = document.querySelector(".icon-active");
        if(current && current != iconButton){
            current.classList.remove("icon-active");
        }

        iconButton.classList.toggle("icon-active");
        selectButton.classList.add("select-active");
        
        if(!iconButton.classList.contains("icon-active")) {
            selectButton.classList.remove("select-active");
        }
    })
})

selectButton.addEventListener("click", ()=>{
    if(selectButton.classList.contains("select-active")) {
        let currentImg = document.querySelector(".icon-active").classList[1];
        let newUrl = document.querySelector(".icon-active").previousElementSibling.src;
        document.getElementById("currentImage").src = newUrl;
        document.getElementById("imagen").value = currentImg;
        
        closeModal();
    }
})
