document.addEventListener("DOMContentLoaded", function () {
    obtenerWhats();
});

function obtenerWhats() {
    var baseURL = 'http://localhost/ceunem/public/home/getWhats';
    axios.post(baseURL).then((response) => {
       const link = document.getElementById('whats');
       link.href ="https://api.whatsapp.com/send?phone="+response.data.numero+"&text="+response.data.mensaje+"";

       const domicilio1 = document.getElementById('domicilio1'); // Elemento correspondiente al domicilio 1
       domicilio1.innerHTML = `<i class="fa fa-map-marker-alt me-3"></i>${response.data.domicilio1}`; // Actualiza el contenido del domicilio 1

       const domicilio2 = document.getElementById('domicilio2'); // Elemento correspondiente al domicilio 2
       domicilio2.innerHTML = `<i class="fa fa-map-marker-alt me-3"></i>${response.data.domicilio2}`; // Actualiza el contenido del domicilio 2

       const facebookLink = document.getElementById('facebook-link'); // Selecciona el enlace de Facebook
       facebookLink.href = response.data.link_facebook; // Actualiza el atributo href del enlace de Facebook

       const instagramLink = document.getElementById('instagram-link'); // Selecciona el enlace de Instagram
       instagramLink.href = response.data.link_instagram; // Actualiza el atributo href del enlace de Instagram

       // Agregar el ícono de Facebook
       facebookLink.innerHTML = '<i class="fab fa-facebook-f"></i>f';
       
       // Agregar el ícono de Instagram
       instagramLink.innerHTML = '<i class="fab fa-instagram"></i>i';

       const leyenda = document.getElementById('leyenda'); // Selecciona el elemento de la leyenda
       leyenda.innerHTML = response.data.leyenda; // Actualiza el contenido de la leyenda
    });
}
