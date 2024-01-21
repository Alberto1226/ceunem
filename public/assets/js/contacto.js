document.addEventListener("DOMContentLoaded", function () {
    obtenerImagenBanner();
});



function obtenerImagenBanner() {
    var baseURL = 'http://localhost/ceunem/public/contacto/getBanner';  

    axios.post(baseURL).then((response) => {
        if(response.status == 200){            
            const ImgenAsc = response.data;
            // if(ImgenAsc === undefined){
                // console.log("SIn dato", ImgenAsc);
                const bannerImgAsc = document.querySelectorAll('.bannerImgAsc');
                bannerImgAsc.forEach(function (divAsc) {               
                    // console.log(divAsc.style);
                    divAsc.style.background = "linear-gradient(rgba(2, 73, 137, .8), rgba(2, 73, 137, .8)), url("+ImgenAsc+") top center no-repeat";
                    divAsc.style.backgroundSize = 'cover';
                });
            // }
        }
    })
    


  
}