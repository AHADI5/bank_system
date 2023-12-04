var sendInformations = document.querySelector(".regiser");
var withDrawForm = document.querySelector(".page-content > form");
console.log(withDrawForm);
sendInformations.addEventListener("click", (ev) => {
    ev.preventDefault();
    sendDat(withDrawForm);
    withDrawForm.reset();

})


function sendDat(form) {
    let data  = new FormData(form); 
    let xhr  = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState==4)&& (xhr.status==200)){
            console.log("reponse",xhr.response,"end Answer");
            var response = xhr.response;
            var sectionResult = document.querySelector(".confirmations");
            
            if (response === 'Failed') {
                sectionResult.innerHTML = 'Incorrect Password';
            } else {
                var array = response.split(',');
                var operation = "Retrait";
                var status = "Success"
                for (let index = 0; index < array.length; index++) {
                    const element = parseInt(array[index]);
                    
                }
    
                Operation(array[1],status,operation,array[0], array[2]);
                setTimeout(() =>{
                    sectionResult.innerHTML = `
                    <div class="notifier">
                        <div class="notifier-message flex"> 
                            <div class= "il-icon flex" >
                                <img src="../../imgs/icons8-initiate-money-transfer-48.png" alt="">
                            </div>
                            <div class="notifier-msg flex"> 
                                <p>Withdraw done Successfully </p>
                            </div>
                        </div>
                        <div class="notifier-description flex">
                            <div class="amount-operation">Vous avez Retire ${array[1]},Il vous reste ${array[0]}</div>
                            
                        </div>
                    </div>
                    `;
                    sectionResult.style.background = 'green';
                    sectionResult.style.color = 'white';
    
                },900);

            }
        
            
        } else {
            console.log("request failed");
        }


    }

    xhr.open('POST', '../../controllers/section/withDraw.php');
    xhr.send(data);
    console.log(xhr);
}

function Operation(amount, operationStatus, operationType, balance, id) {
    let xhr = new XMLHttpRequest();

    // Prepare the data to be sent
    let formData = new FormData();
    formData.append('amount', amount);
    formData.append('status', operationStatus);
    formData.append('operationtype', operationType);
    formData.append('balance', balance);
    formData.append('id', id);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log("response", xhr.response, "end Answer");
                console.log("the amount" + amount);
            } else {
                console.log("request failed");
            }
        }
    };

    // Set up the request method and URL
    xhr.open('POST', '../../controllers/section/operations.php');

    // Send the FormData object as the request body
    xhr.send(formData);
}