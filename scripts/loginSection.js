var loginInformatons = document.querySelector(".loginInformations")
var userName = document.querySelector("#username");
var passWord = document.querySelector("#password");
var loginbutton = document.querySelector(".loginbutton");

loginbutton.addEventListener("click" , (ev) => {
    ev.preventDefault();
    if (userName.value != "" && passWord.value != "") {
        sendData(loginInformatons);
    } else {
        userName.style.border = '1px solid red';
        console.log(userName.value);
    }
})

function sendData(form) {
    let data  = new FormData(form); 
    let xhr  = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if ((xhr.readyState == 4) && (xhr.status==200)) {
            console.log("reponse",xhr.response,"end Answer");
            var response = xhr.response;
            var execution = new Function(response);
            execution();

            
        } else {
            console.log("Request failed")
        }
        
    }
    xhr.open('POST', '../../controllers/section/loginSction.php');
    xhr.send(data);
    console.log(xhr);


    
}