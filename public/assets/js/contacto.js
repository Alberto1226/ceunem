document.addEventListener("DOMContentLoaded", function () {
  obtenerImagenBanner();
});

function obtenerImagenBanner() {
  var baseURL = APP_URL + "/public/contacto/getBanner";

  axios.post(baseURL).then((response) => {
    if (response.status == 200) {
      const ImgenAsc = response.data;
      // if(ImgenAsc === undefined){
      // console.log("SIn dato", ImgenAsc);
      const bannerImgAsc = document.querySelectorAll(".bannerImgAsc");
      bannerImgAsc.forEach(function (divAsc) {
        // console.log(divAsc.style);
        divAsc.style.background = "url(" + ImgenAsc + ") top center no-repeat";
        divAsc.style.backgroundSize = "cover";
      });
      // }
    }
  });
}
