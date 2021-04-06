const selectedCategory = document.querySelector(".selected_category");
const selectedManufactory = document.querySelector(".selected_manufacturer");

const optionsContainerC = document.querySelector("#category");
// const optionsContainerM = document.querySelector("#manufacturer");
const optionsContainerM = document.querySelector("#filterform-manufacturer");

const optionsListC = optionsContainerC.querySelectorAll(".option");
const optionsListM = optionsContainerM.querySelectorAll(".option");

selectedCategory.addEventListener("click", () => {
  optionsContainerC.classList.toggle("active");
});
// selectedManufactory.addEventListener("click", () => {
//   optionsContainerM.classList.toggle("active");
// });

optionsListC.forEach(o => {
  o.addEventListener("click", () => {
    selectedCategory.innerHTML = o.querySelector("label").innerHTML;
    optionsContainerC.classList.remove("active");
  });
    let input = o.querySelector('input');
    // console.log(input);
    input.addEventListener('change', function (e) {
        if(this.checked){
            alert('true')
        }
    })
});

optionsListM.forEach(o => {
  o.addEventListener("click", () => {
    selectedManufactory.innerHTML = o.querySelector("label").innerHTML;
    optionsContainerM.classList.remove("active");

  });
    let input = o.querySelector('input');
    input.addEventListener('change', function (e) {
        if(this.checked){
            alert('true')
        }
    })
});

document.body.onload = function (){
    let formFilter = document.querySelector('#filter');
    // let selSecct = document.querySelector('.select2-selection__rendered');
    optionsContainerC.addEventListener('change', function () {
        formFilter.submit();
    });
    optionsContainerM.addEventListener('change', function () {
        formFilter.submit();
    });

};
