function imgVision(event, querySelector) {
    const input = event.target;
    
    $img_sec = document.querySelector(querySelector);
    if (!input.files.length) return
    file = input.files[0];
    objectURL = URL.createObjectURL(file);
    showImgVis(objectURL);
}

function showImgVis(url) {

    const imgVision = document.getElementById('imgVision');
    const cardBodyVision = document.getElementById('cardBodyVision');
    const titVision = document.getElementById('titVision');
    imgVision.src = url;
    imgVision.style.display = "block";
    cardBodyVision.style.display = "inline";
    titVision.style.display = "block";

}

function showInput(input) {
    const desVision = document.getElementById('desVision');

    if (input.value.trim() === '') {
        console.log("campo vacio")

    } else {
        if (input.name === "desc_sec") {
            desVision.style.display = "block"
            desVision.textContent = input.value;
        }
    }

}