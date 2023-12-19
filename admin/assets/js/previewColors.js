document.addEventListener("DOMContentLoaded", function () {

    const color = document.querySelectorAll('input[type="color"]');
    color.forEach((input) => {
        input.addEventListener('keyup', colorsAndFonts);
        input.addEventListener('blur', colorsAndFonts);
    });
   
});

const colorsAndFonts = (e) => {
  const divs = document.getElementById('D'+e.target.name);
  const input = e.target.name;
  const color = e.target.value;

  if(input == 'let_hf' || input == 'let_hover' || input == 'btn_font' || input == 'font' || input == 'btn_hfont'){
    divs.innerHTML='Letra';
    divs.style.fontSize='2vw'
    divs.style.color=color;
  }else{
    divs.style.background=color;
  }

}