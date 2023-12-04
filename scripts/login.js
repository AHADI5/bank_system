let forgotten = document.querySelector(".forgotten");
let showBlock = document.querySelector(".show");
let hideBlock = document.querySelector(".hide");


forgotten.addEventListener ("click", () => {
    
    hideBlock.classList.add('show');

  // Remplacez le bloc courant par le bloc à afficher
    showBlock.replaceWith(hideBlock);
    hideBlock.classList.add("animate");
  
    setTimeout(() => {
      hideBlock.classList.remove('animate');
    }, 1000);

    console.log("hello");
})