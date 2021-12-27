let formUpdate = document.getElementById("updUserData");
let mensajeContainer = document.querySelector(".mensaje");

formUpdate.addEventListener("submit", (e)=>{
    e.preventDefault();

    let userData = new FormData(formUpdate);

    fetch("update.php", {
        method: "POST",
        body: userData
    })
        .then(res => res.json())
        .then(data => {
            if(data.bool == false) {
                mensajeContainer.classList.add("mensaje-active");
                mensajeContainer.querySelector("p").innerHTML = data.value;
                mensajeContainer.querySelector(".icon").addEventListener("click", ()=> {
                    mensajeContainer.classList.remove("mensaje-active");
                })
                setTimeout(()=>{
                    mensajeContainer.classList.remove("mensaje-active");
                }, 2500);
            } else {
                mensajeContainer.classList.add("mensaje-active-ok");
                mensajeContainer.querySelector("p").innerHTML = data.value;
                mensajeContainer.querySelector(".icon").addEventListener("click", ()=> {
                    mensajeContainer.classList.remove("mensaje-active-ok");
                })
                setTimeout(()=>{
                    mensajeContainer.classList.remove("mensaje-active-ok");
                }, 2000);
                setTimeout(()=>{
                    window.top.location.replace("../../../panel.php");
                },2050)
            }
        })
})