function getData() {
    let xhr  = new XMLHttpRequest();
    let number = document.querySelectorAll(".number");

    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");

            //Adding Lestiner to the Teacher .
            let teacherSelect = document.querySelector("#teachers");
            teacherSelect.innerHTML = xhr.response;


        } else {
            console.log("request failed");
        }

    }

    xhr.open('GET', '../../controllers/section/teachersSelect.php');
    xhr.send(null);

}
getData();

function Courses() {
    let xhr  = new XMLHttpRequest();
    let coursesContainer = document.querySelector("tbody");

    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");


            coursesContainer.innerHTML = xhr.response;
            let  accounts = document.querySelectorAll("tr");
            accounts.forEach(teacher =>{
                teacher.addEventListener("click", (e) =>{
                    let parent = e.currentTarget;
                    let number = parent.querySelector(".code");
                    console.log("The text is " + number.innerText);
                    getOperations(number.innerText);
                    getFullAccounInfo(number.innerText);
                    

                 
                })

            })
        } else {
            console.log("request failed");
        }

    }

    xhr.open('GET', '../../controllers/section/getCourse.php');
    xhr.send(null);

}
Courses();

function getOperations(id) {
    let xhr  = new XMLHttpRequest();
    
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            let operationContent = document.querySelector(".operation")
            operationContent.innerHTML =  xhr.response;
          

        } else {
            console.log("request failed");
        }
    }
    xhr.open('GET', `../../controllers/section/getOperations.php?id=${id}`);
    xhr.send(null);
    
}


function getFullAccounInfo(id) {
    let xhr  = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            let operationContent = document.querySelector(".fullInformations")
            operationContent.innerHTML =  xhr.response;
            var history = document.querySelectorAll(".history");
            console.log(history);
            for (let index = 0; index < history.length; index++) {
                const element = history[index];
                const type = element.querySelector(".type-op").innerText;
                console.log(type);
                if (type === 'Depot') {
                    element.querySelector(".icon").innerHTML = `
                    <i class="bi bi-arrow-right-circle"></i>
                    `;
                    element.querySelector(".icon").style.color = 'blue';
                } else {
                    element.querySelector(".icon").innerHTML = `
                    <i class="bi bi-arrow-left-circle"></i>
                    `;
                    element.querySelector(".icon").style.color = 'green';
                }
             
                
            }
        } else {
            console.log("request failed");
        }
    }
    xhr.open('GET', `../../controllers/section/getAccoutsOperations.php?id=${id}`);
    xhr.send(null);
    
}
