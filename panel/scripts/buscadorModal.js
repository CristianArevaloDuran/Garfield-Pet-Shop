const buscadorButton = document.getElementById('buscadorButton');
const maxBuscador = document.getElementById('maxBuscador');
const maxBuscadorContent = document.getElementById('maxBuscadorContent');

buscadorButton.addEventListener('click', openBuscador);
maxBuscador.addEventListener('click', closeBuscador);

function openBuscador(e) {
    maxBuscador.style.display = 'flex';
    setTimeout(()=>{
        maxBuscadorContent.style.width = '70%';
    },1)
}

function closeBuscador(e) {
    if(e.target !== maxBuscador) {
        
    } else {
        setTimeout(()=>{
            maxBuscador.style.display = 'none';
        }, 200)
        maxBuscadorContent.style.width = '50%';
    }
}