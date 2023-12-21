document.addEventListener("DOMContentLoaded", function () {

    const select = document.getElementById('nom_menu');
    select.addEventListener('keyup', seccionMenu);
    select.addEventListener('blur', seccionMenu);


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





function previewImg(event, querySelector) {
    const input = event.target
    $img_prog = document.querySelector(querySelector);
    if (!input.files.length) return
    file = input.files[0];
    url = URL.createObjectURL(file);
    $img_prog.src = url;
    $img_prog.style.display = 'inline'
}

function seccionMenu(e) {
    const select = e.target;
    const opcion = select.options[select.selectedIndex];
    const texto = opcion.textContent;
    if(texto !== 'Seleccione una opción'){
        document.getElementById('divSec').style.display = 'inline';
        document.getElementById('secProg').innerHTML = texto;
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
    } else if (input == 'btn_name1') {
        const btn1 = document.getElementById('btn1');
        const span = btn1.querySelector('span');
        span.textContent = contenido;
        document.getElementById('divBtns').style.display = 'inline';
    } else if (input == 'btn_name2') {
        const btn2 = document.getElementById('btn2');
        const span = btn2.querySelector('span');
        span.textContent = contenido;
        document.getElementById('divBtns').style.display = 'inline';
    }
}