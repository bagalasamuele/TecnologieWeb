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


// Funzione validazione registrazione
function validateSingUp() {
    var nicknameInput = document.querySelector('input[name="nickname"]');
    var passwordInput = document.querySelector('input[name="pwd"]');
    var confirmPasswordInput = document.querySelector('input[name="checkpassword"]');

    var valid = true;

    if (nicknameInput.value.trim() === "") {
        nicknameInput.classList.add("is-empty-label");
        valid = false;
        showError(nicknameInput, "Nickname is required");
    } else {
        clearError(nicknameInput);
        nicknameInput.classList.remove("is-empty-label");
    }

    if (passwordInput.value === "") {
        passwordInput.classList.add("is-empty-label");
        valid = false;
        showError(passwordInput, "Password is required");
    } else {
        clearError(passwordInput);
        passwordInput.classList.remove("is-empty-label");
    }

    if (confirmPasswordInput.value === "") {
        confirmPasswordInput.classList.add("is-empty-label");
        valid = false;
        showError(confirmPasswordInput, "Confirm Password is required");
    } else {
        clearError(confirmPasswordInput);
        confirmPasswordInput.classList.remove("is-empty-label");
    }

    if (passwordInput.value !== confirmPasswordInput.value) {
        valid = false;
        showError(confirmPasswordInput, "Passwords do not match");
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


// Add event listener to the form submission
var signUpForm = document.getElementById("container_signup");
if (signUpForm) {
    signUpForm.addEventListener("submit", function(event) {
        if (!validateSingUp()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
}

// Add input event listeners to clear errors
var nicknameInput = document.querySelector('input[name="nickname"]');
if (nicknameInput) {
    nicknameInput.addEventListener("input", function () {
        clearError(this);
    });
}

var passwordInput = document.querySelector('input[name="pwd"]');
if (passwordInput) {
    passwordInput.addEventListener("input", function () {
        clearError(this);
    });
}

var confirmPasswordInput = document.querySelector('input[name="checkpassword"]');
if (confirmPasswordInput) {
    confirmPasswordInput.addEventListener("input", function () {
        clearError(this);
    });
}



