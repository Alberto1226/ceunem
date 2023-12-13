function vidInicio(event, querySelector){
    const input = event.target;

    $vid_url = document.querySelector(querySelector);
    if(!input.files.length) return
    file = input.files[0];
    objectURL = URL.createObjectURL(file);
    showVid(objectURL);
}

function showVid(url){
    const vidIni = document.getElementById('vidIni');
    vidIni.src =url;
}