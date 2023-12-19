var baseURL = 'http://localhost/proyectos/ceunem/admin/';
function imgSlider(event, querySelector) {
    const input = event.target;
    $img = document.querySelector(querySelector);
    let idInput = $img.id;

    if (!input.files.length) return
    file = input.files[0];
    url = URL.createObjectURL(file);
    showSlider(url, idInput);
}

function showSlider(url, idInput) {
    let imgPrin = document.getElementById('imgPrincipal');
    let imgSec = document.getElementById('imgSecundaria');
   
    if (idInput === 'img1' || idInput === 'img1Up' || idInput === 'img1Bd') {
        imgPrin.src = url;
    } 
    if(idInput === 'img2' || idInput === 'img2Up'|| idInput === 'img2Bd') {
        imgSec.src = url;
    }
}