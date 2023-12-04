let teachersZone = document.querySelector(".list-table");
function getData() {
    let xhr  = new XMLHttpRequest();
    let number = document.querySelectorAll(".number");

    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            teachersZone.innerHTML = xhr.response;
            //Adding Lestiner to the Teacher .
            let  teachers = document.querySelectorAll("tr");
            teachers.forEach(teacher =>{
                teacher.addEventListener("click", (e) =>{
                    let parent = e.currentTarget;
                    let number = parent.querySelector(".number").innerHTML;

                    getFullData(number);

                })

            })


        } else {
            console.log("request failed");
        }

    }

    xhr.open('GET', '../../controllers/section/getTeachers.php');
    xhr.send(null);

}
getData();

//Sending Data
function getFullData(number) {
    let xhr  = new XMLHttpRequest();
    let infoContainer = document.querySelector(".partial-info");
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("reponse",xhr.response,"end Answer");
            infoContainer.innerHTML = xhr.response;

        } else {
            console.log("request failed");
        }
    }
    let url = "../../controllers/section/getTeacherFull.php?number="+number;

    xhr.open('GET', url , true);
    xhr.send(null);
}
