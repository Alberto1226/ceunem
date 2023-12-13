document.addEventListener("DOMContentLoaded", function () {
    const inputs = document.querySelectorAll('input[type="checkbox"]');
    inputs.forEach((input) => {
        input.addEventListener('change', mostrarInput);
    });
});

const mostrarInput = (e) => {
    const val = e.target.checked ? 1 : 0;
    const inputName = e.target.name;
    const inputForm = document.getElementById(inputName +"F");
    const labelForm = document.getElementById(inputName +"L");

    if(e.target.checked){
        inputForm.style.display = "block";
        labelForm.style.display = "block";
        campos[inputName] = val;
    }else{
        inputForm.style.display = "none";
        labelForm.style.display = "none";
        campos[inputName] = val;
    }
}