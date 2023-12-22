document.addEventListener("DOMContentLoaded", function () {

    const select = document.querySelectorAll('select');
    select.forEach((select) => {
        select.addEventListener('keyup', showSelect);
        select.addEventListener('blur', showSelect);
    });


    const texto = document.querySelectorAll('input[type="text"]');
    texto.forEach((input) => {
        input.addEventListener('keyup', showText);
        input.addEventListener('blur', showText);
    });

    const txtAreas = document.querySelectorAll('textarea');
    txtAreas.forEach((input) => {
        input.addEventListener('keyup', showText);
        input.addEventListener('blur', showText);
    })
});





function previewImg(event) {
    const input = event.target
    const ext = ['jpg', 'jpeg', 'png'];
    const url2 = input.value
    var filext = url2.split(".").pop();
    var img = ext.includes(filext)
    if (!input.files.length) return
    file = input.files[0];
    objectURL = URL.createObjectURL(file);
    
    if(img){
        let img_prog = document.getElementById('img_prog');
        img_prog.src = objectURL
        img_prog.style.display='inline'
        video.style.display = 'none'; 
    }else{
        let video = document.getElementById('video');
        video.src = objectURL;
        video.style.display = 'inline';
        img_prog.style.display='none'

    }
}

function showSelect(e) {
    const select = e.target;
    const opcion = select.options[select.selectedIndex];
    const texto = opcion.textContent;
    if (texto !== 'Seleccione una opción' && select.name == 'nom_menu') {
        document.getElementById('divSec').style.display = 'inline';
        document.getElementById('secProg').innerHTML = texto;
    }else if(texto !== 'Seleccione una opción' && select.name == 'sName'){
        const btn1 = document.getElementById('btn1');
        const span = btn1.querySelector('span');
        span.textContent = texto;
        document.getElementById('divBtns').style.display = 'inline';
    }

}

function showText(e) {
    const input = e.target.name;
    const contenido = e.target.value;
    /* const label = document.querySelector("label[for='"+input+"']");
    console.log(label.textContent) */
    if (input == 'tit_prog') {
        document.getElementById('titProg').textContent = contenido;
    }
    else if (input == 'descripcion') {
        document.getElementById('descProg').style.display = 'block';
        document.getElementById('descProg').innerHTML = contenido;
    }
}