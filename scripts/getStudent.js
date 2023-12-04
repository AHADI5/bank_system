let studentZone = document.querySelector(".list-table");
function getData() {
    let xhr  = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            studentZone.innerHTML = xhr.response;

        } else {
            console.log("request failed");
        }

    }

    xhr.open('GET', '../../controllers/section/getStudent.php');
    xhr.send(null);

}
getData();