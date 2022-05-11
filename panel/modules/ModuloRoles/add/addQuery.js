let formUpdate = document.getElementById("addRole");
let mensajeContainer = document.querySelector(".mensaje");

formUpdate.addEventListener("submit", (e)=>{
    e.preventDefault();

    let userData = new FormData(formUpdate);

    fetch("addQuery.php", {
        method: "POST",
        body: userData
    })
        .then(res => res.json())
        .then(data => {
            if(data.bool == false) {
                mensajeOpen('mensaje-active-bad', data.value, data.bool);
            } else {
                mensajeOpen('mensaje-active-ok', data.value, data.bool);
            }
        })
})

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
            window.location.replace("../roles");
        },2050)
    }
}