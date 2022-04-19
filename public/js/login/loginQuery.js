let loginForm = document.getElementById("loginForm");
let loginMensaje = document.getElementById("loginMensaje");
let loginMensajePar = loginMensaje.querySelector("p");
let logMenCloseButton = document.getElementById("logMenCloseSButton");
            
loginForm.addEventListener("submit", (e)=>{
    e.preventDefault();
    let loginData = new FormData(loginForm);

    fetch("loginQuery.php", {
        method: "POST",
        body: loginData
    })
        .then(res => res.json())
        .then(data =>{
            if(data.bool == false) {
                mensajeOpen("mensaje-active-bad", data.value);
            } else {
                window.location.replace("../panel/panel.php");
            }
        })
})

function mensajeOpen(status, value) {
    loginMensaje.classList.add(status);
    loginMensajePar.innerHTML = value;
    setTimeout(()=>{
        mensajeClose();
    },2000)
}

function mensajeClose(e) {
    if(loginMensaje.classList.contains("mensaje-active-ok") || loginMensaje.classList.contains("mensaje-active-bad")){
        loginMensaje.classList.remove("mensaje-active-ok");
        loginMensaje.classList.remove("mensaje-active-bad");
    }
}

logMenCloseButton.addEventListener("click", mensajeClose);