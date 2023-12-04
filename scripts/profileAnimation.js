let label = document.querySelector(".labelImage");
let profileContainer = document.querySelector(".profile-picture");
label.classList.remove("labelImage");
label.classList.add("hiddenLabel");
profileContainer.addEventListener("mouseover", () => {
    label.classList.add("labelImage");
    label.classList.remove("hiddenLabel");
})

profileContainer.addEventListener("mouseout", () => {
    label.classList.remove("labelImage");
    label.classList.add("hiddenLabel");
})