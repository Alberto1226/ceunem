function imageHeader(event, querySelector) {
    const input = event.target;
    $imgHeader = document.querySelector(querySelector);
    $imgBody = document.querySelector(querySelector);

    if ($imgHeader.name === "img_header") {
        if (!input.files.length) return
        file = input.files[0];
        objectURL = URL.createObjectURL(file);
        showImgHeader(objectURL, "HEADER");
    }
    else if ($imgBody.name === "img_body") {
        if (!input.files.length) return
        file = input.files[0];
        objectURL = URL.createObjectURL(file);
        showImgHeader(objectURL, "BODY");
    }
}

function showImgHeader(url, name) {
    const imgMision = document.getElementById('imgMision');
    const titSec = document.getElementById('titSec');
    const imgBodyMision = document.getElementById('imgBodyMision');

    if (name === "HEADER") {
        imgMision.src = url;
        titSec.style.color = "white";
        titSec.style.display = "inline";
    } else if (name === "BODY") {
        imgBodyMision.src = url;
        imgBodyMision.style.display = "inline";
    }

}

function showInputs(input) {
 
    var divFrase = document.getElementById('divFrase');
    var autorFrase = document.getElementById('autorFrase');
    var titMision = document.getElementById('titMision');
    var titFrase = document.getElementById('titFrase');
    var descMision = document.getElementById('descMision');
    var btnMision = document.getElementById('btnMision');

    if (input.value.trim() === '') {
        console.log("campo vacio")
        
    } else {
        if (input.name === "frase") {
            titMision.style.display = "block";
            divFrase.style.display = "block";
            titFrase.style.display = "block"
            titFrase.textContent = input.value;
        } else if (input.name === "autor") {
            autorFrase.style.display = "block"
            autorFrase.textContent = input.value;
        } else if (input.name === "mision") {
            descMision.textContent = input.value;
            descMision.style.display = "block";
            btnMision.style.display = "inline";
        }
    }


}
