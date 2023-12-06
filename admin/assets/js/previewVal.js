function imgVal(event, querySelector) {
    const input = event.target;
    
    $img_sec = document.querySelector(querySelector);
    if (!input.files.length) return
    file = input.files[0];
    objectURL = URL.createObjectURL(file);
    showImgVal(objectURL);
}

function showImgVal(url) {

    const imgVal = document.getElementById('imgVal');
    const cardBodyVal = document.getElementById('cardBodyVal');
    const titVal = document.getElementById('titVal');
    imgVal.src = url;
    imgVal.style.display = "block";
    cardBodyVal.style.display = "inline";
    titVal.style.display = "block";

}

function showInput(input) {
    const desVal = document.getElementById('desVal');

    if (input.value.trim() === '') {
        console.log("campo vacio")

    } else {
        if (input.name === "desc_sec") {
            desVal.style.display = "block";
            desVal.style.whiteSpace = "pre-wrap";
            desVal.textContent = input.value;
        }
    }

}