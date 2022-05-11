let passConfirmForm = document.getElementById("passConfirmForm");
let mensajeContainer = document.querySelector(".mensaje");

passConfirmForm.addEventListener("submit", (e)=>{
    e.preventDefault();

    let passConfirmData = new FormData(passConfirmForm);

    fetch("passwordConfirm.php", {
        method: "POST",
        body: passConfirmData
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
                window.location.replace("editData/editData.php");
            } 
        })
})