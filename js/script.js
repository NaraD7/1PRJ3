function EmailValid(){
    var email = document.getElementsByClassName('input-email');
    const regex = /^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,}$/;

    input.addEventListener("input", () => {
    if (regex.test(input.value)) {
            message.textContent = "Valide";
            message.style.color = "green";
    } else {
            message.textContent = "Invalide";
            message.style.color = "red";
    }
 })
}