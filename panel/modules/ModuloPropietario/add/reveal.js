const field = document.getElementById("pass");
const button = document.getElementById("reveal");
const eye = document.querySelector(".svgEye");
const eyeLash = document.querySelector(".svgEyeLash");
const svgEye = document.querySelector(".svgEye")

button.addEventListener("click", (event)=>{
    event.preventDefault();
    if(field.type == "password") {
        field.type = "text";
        setTimeout(()=>{
            svgEye.style.display = "none";
            eyeLash.style.display = "inline-block";
        },100);
        svgEye.classList.remove("rotate-svg"); 
        setTimeout(()=>{
            eyeLash.classList.add("rotate-svg");
        }, 250);
        
    } else {
        field.type = "password";
        setTimeout(()=>{
            svgEye.style.display = "inline-block";
            eyeLash.style.display = "none";
        },100);
        eyeLash.classList.remove("rotate-svg");
        setTimeout(()=>{
            svgEye.classList.add("rotate-svg");
        }, 250);
    }
})