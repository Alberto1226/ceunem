document.addEventListener("DOMContentLoaded", function () {
    obtenerWhats();
});

function obtenerWhats() {
    var baseURL = 'http://localhost/ceunem/public/home/getWhats';
    axios.post(baseURL).then((response) => {
       const link = document.getElementById('whats');
       link.href ="https://api.whatsapp.com/send?phone="+response.data.numero+"&text="+response.data.mensaje+"";
    });
}