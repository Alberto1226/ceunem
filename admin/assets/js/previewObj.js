function imgObj(event, querySelector) {
    const input = event.target;

    $img_sec = document.querySelector(querySelector);
    if (!input.files.length) return
    file = input.files[0];
    objectURL = URL.createObjectURL(file);
    showImgObj(objectURL);
}

function showImgObj(url) {

    const imgVision = document.getElementById('imgObj');
    const cardBodyVision = document.getElementById('cardBodyObj');
    const titVision = document.getElementById('titObj');
    imgVision.src = url;
    imgVision.style.display = "block";
    cardBodyVision.style.display = "inline";
    titVision.style.display = "block";

}

function showInput(input) {
    const desVision = document.getElementById('desObj');

    if (input.name === "desc_sec") {
        desVision.style.display = "block"
        desVision.textContent = input.value;
    }
}