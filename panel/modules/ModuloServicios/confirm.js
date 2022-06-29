let buttons = document.querySelectorAll(".trash");
let cancel = document.getElementById("cancel");
let confirm = document.getElementById("confirm");
let modal = document.getElementById("modal");
let mensajeContainer = document.querySelector(".mensaje");

let id = '';

buttons.forEach(button => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        id = button.getAttribute("href");
        modal.style.display = "flex";
    });
});

modal.addEventListener('click', (e) => {
    if(e.target.id === "modal"){
        modal.style.display = "none";
    }
});

cancel.addEventListener("click", (e) => {
    modal.style.display = "none";
});

confirm.addEventListener("click", (e) => {
    fetch(`delete.php?id=${id}`)
        .then(res => res.json())
        .then(data => {
            if(data.bool == false) {
                mensajeOpen('mensaje-active-bad', data.value, data.bool);
            } else {
                mensajeOpen('mensaje-active-ok', data.value, data.bool);
            }
        })
});

function openModal(event) {
    profileModal.style.display = "flex";
    setTimeout(()=>{
        profileModalContent.style.width = "70%";
    }, 1);
}

function mensajeOpen(status, value, bool) {
    mensajeContainer.classList.add(status);
    mensajeContainer.querySelector("p").innerText = value;
    mensajeContainer.querySelector(".icon").addEventListener("click", ()=> {
        mensajeContainer.classList.remove(status);
    })
    setTimeout(()=>{
        mensajeContainer.classList.remove(status);
    }, 2500);
    if(bool) {
        setTimeout(()=>{
            mensajeContainer.classList.remove("mensaje-active-ok");
        }, 2000);
        setTimeout(()=>{
            window.location.replace("servicios");
        },2050)
    }
}