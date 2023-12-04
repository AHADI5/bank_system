let currentUrl = window.location.href;
let links = document.querySelectorAll("ul>a");
for (let i = 0; i <links.length ; i++) {
    if (links[i].href === currentUrl ){
        (links[i].querySelector("li")).classList.add("active-menu");
    }
}