let form = document.getElementById("form");
let results = document.getElementById("results")

buscador.addEventListener("input", (e)=>{

    let data = new FormData(form);

    fetch("scripts/buscador.php", {
        method: "POST",
        body: data
    })
        .then(res => res.json())
        .then(data => {
            if(data.bool == false) {
                console.log(data.value);
            } else {
                console.log(data.value);
            }
        })
})