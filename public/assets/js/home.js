document.addEventListener("DOMContentLoaded", function () {
    obtenerPrograma();
    obtenerSliders();
    obtenerBlog();
    obtenerOferta();
    obtenerEquipo();
    obtenerTestimonio();
});

function obtenerPrograma() {
    let linkAdmin = 'http://localhost/ceunem/admin/'
    let linkPublic = 'http://localhost/ceunem/public/'
    let vidProg = document.getElementById('vidProg');
    let imgProg = document.getElementById('imgProg');
    let nom_menu = document.getElementById('nom_menu');
    let titProg = document.getElementById('titProg');
    let descripcion = document.getElementById('descripcion');
    let btn_name = document.getElementById('btn_name');
    let linkProg = document.getElementById('linkProg');

    var baseURL = 'http://localhost/ceunem/public/home/getPrograma';
    axios.post(baseURL).then((response) => {
        const file = response.data.img_url;
        const ext = ['jpg', 'jpeg', 'png'];
        const url2 = linkAdmin + file
        var filext = file.split(".").pop();
        var fileType = ext.includes(filext);

        if (fileType) {
            imgProg.src = url2;
            imgProg.style.display = 'inline';
            vidProg.style.display = 'none'
        } else {
            vidProg.src = url2;
            vidProg.autoplay = true;
            vidProg.style.display = 'inline';
            imgProg.style.display = 'none';
        }

        var tip = response.data.tUrl;
        var enlace = response.data.link;
        var url = tip == 1 ? url = linkPublic + enlace : enlace;
        nom_menu.textContent = response.data.nom_menu;
        titProg.textContent = response.data.tit;
        descripcion.textContent = response.data.descripcion;
        btn_name.textContent = response.data.btn_name;
        linkProg.href = url;
    });
}

function obtenerSliders() {
    var baseURL = 'http://localhost/ceunem/public/home/getSliders';
    var urlImagen = 'http://localhost/ceunem/admin/';
    axios.post(baseURL).then((response) => {
        const sliders = response.data;
        for (let i = 0; i < sliders.length; i++) {
            const slider = Object.entries(sliders[i]);
            const item = document.getElementById(`item${i + 1}`);

            if (sliders[i]) {
                slider.forEach(([key, value]) => {
                    let img = document.getElementById(`img${i + 1}`);
                    let tit = document.getElementById(`tit${i + 1}`);
                    let desc = document.getElementById(`desc${i + 1}`);
                    let link = document.getElementById(`link${i + 1}`);
                    let btn_name = document.getElementById(`btn_name${i + 1}`);

                    if (key == "img") {
                        let imgUrl = urlImagen + value;
                        img.src = imgUrl;
                    }
                    if (key == "tit") tit.textContent = value;
                    if (key == "descripcion") desc.textContent = value;
                    if (key == "link") link.href = urlImagen + value;
                    if (key == "btn_name") btn_name.textContent = value;
                });

                item.style.display = 'inline';
            } else {
                item.style.display = 'none';
            }
        } 
    });
}

function obtenerBlog() {
    let enBlog = document.getElementById('enBlog');
    let descBlog = document.getElementById('descBlog');

    var baseURL = 'http://localhost/ceunem/public/home/getEncabezado';
    const data = { encabezado: 'Blog' }
    axios.post(baseURL, data).then((response) => {
        enBlog.textContent = response.data.encabezado;
        descBlog.textContent = response.data.descripcion;
    });
}

function obtenerOferta() {
    let enOferta = document.getElementById('enOferta');
    let descOferta = document.getElementById('descOferta');

    var baseURL = 'http://localhost/ceunem/public/home/getEncabezado';
    const data = { encabezado: 'Oferta Educativa' }
    axios.post(baseURL, data).then((response) => {
        enOferta.textContent = response.data.encabezado;
        descOferta.textContent = response.data.descripcion;
    })
}

function obtenerEquipo() {
    let enEquipo = document.getElementById('enEquipo');
    let descEquipo = document.getElementById('descEquipo');

    var baseURL = 'http://localhost/ceunem/public/home/getEncabezado';
    const data = { encabezado: 'Nuestro Equipo' }
    axios.post(baseURL, data).then((response) => {
        enEquipo.textContent = response.data.encabezado;
        descEquipo.textContent = response.data.descripcion;
    })
}

function obtenerTestimonio() {
    let enTestimonio = document.getElementById('enTestimonio');
    let descTestimonio = document.getElementById('descTestimonio');

    var baseURL = 'http://localhost/ceunem/public/home/getEncabezado';
    const data = { encabezado: 'Testimonios' }
    axios.post(baseURL, data).then((response) => {
        enTestimonio.textContent = response.data.encabezado;
        descTestimonio.textContent = response.data.descripcion;
    })
}