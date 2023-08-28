// Funzione per la validazione del modulo di login
function validateForm() {

    var nickname = document.getElementById("nickname");
    var password = document.getElementById("password");

    var valid = true;

    if (nickname.value.trim() === "") {
        nickname.classList.add("is-empty-label");
        valid = false;
        showError(nickname, "Nickname is required");
    } else {
        clearError(nickname);
        nickname.classList.remove("is-empty-label");
    }

    if (password.value === "") {
        password.classList.add("is-empty-label");
        valid = false;
        showError(password, "Password is required");
    } else {
        clearError(password);
        password.classList.remove("is-empty-label");
    }

    return valid;
}



// Funzione per rimuovere il messaggio di errore sotto un campo
function clearError(element) {
    var errorElement = element.nextElementSibling;
    if (errorElement && errorElement.classList.contains("error-message")) {
        errorElement.remove();
    }
}

// Funzione per mostrare il messaggio di errore sotto un campo
function showError(element, message) {
    clearError(element);

    var errorElement = document.createElement("div");
    errorElement.textContent = message;
    errorElement.classList.add("error-message", "text-danger");

    element.parentNode.insertBefore(errorElement, element.nextSibling);
}


//Ho fatto il controllo con l'if per non lasciare un try catch vuoto, il js viene caricato prima della creazione del div in html e dava errore, soluzione brutta ma efficace
var nicknameInput = document.getElementById("nickname");
if (nicknameInput) {
    nicknameInput.addEventListener("input", function () {
        clearError(this);
    });
}

var passwordInput = document.getElementById("password");
if (passwordInput) {
    passwordInput.addEventListener("input", function () {
        clearError(this);
    });
}



