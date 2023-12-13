function imageHeader(event, querySelector) {
    const input = event.target;

    $imgBody = document.querySelector(querySelector);
    if (!input.files.length) return
    file = input.files[0];
    objectURL = URL.createObjectURL(file);
    showImgHeader(objectURL);
}

function showImgHeader(url) {

    const imgBodyMision = document.getElementById('imgBodyMision');
    imgBodyMision.src = url;
    imgBodyMision.style.display = "inline";

}

function showInputs(input) {

    var divFrase = document.getElementById('divFrase');
    var autorFrase = document.getElementById('autorFrase');
    var titMision = document.getElementById('titMision');
    var titFrase = document.getElementById('titFrase');
    var descMision = document.getElementById('descMision');
    var btnMision = document.getElementById('btnMision');

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
