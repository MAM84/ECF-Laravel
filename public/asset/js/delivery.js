const checkbox = document.getElementById("delivery")
const message = document.getElementById("message");
const payButton = document.getElementById("payButton");

checkbox.addEventListener("click",function(){
    if(checkbox.checked == true){
        payButton.hidden = !payButton.hidden;
        message.hidden = !message.hidden;
    }
    else{
        payButton.hidden = !payButton.hidden;
        message.hidden = !message.hidden;
    }
});