let currentUrl = window.location.href;
let links = document.querySelectorAll("a");
for (let i = 0; i <links.length ; i++) {
    if (links[i].href === currentUrl ){
        links[i].classList.add("active");
    }
}


//droppring down informations

let toggle = document.querySelector(".info-drop-down");
let toggle_section = document.querySelector(".toggle-section");
toggle_section.addEventListener("mouseover", () => {
    toggle.classList.remove("inactive");
})
toggle_section.addEventListener("mouseout", () => {
    toggle.classList.add("inactive");
})