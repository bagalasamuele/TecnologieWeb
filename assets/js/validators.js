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
    var name = document.getElementById("name");
    var surname = document.getElementById("surname");
    var newNickname = document.getElementById("newNickname");
    var newPassword = document.getElementById("newPassword");
    var checkPassword = document.getElementById("checkPassword");
    var email = document.getElementById("email");

    var valid = true;

    if (newNickname.value.trim() === "") {
        newNickname.classList.add("is-empty-label");
        valid = false;
        showError(newNickname, "Nickname is required");
    } else {
        clearError(newNickname);
        newNickname.classList.remove("is-empty-label");
    }


    if (surname.value.trim() === "") {
        surname.classList.add("is-empty-label");
        valid = false;
        showError(surname, "Surname is required");
    } else {
        clearError(surname);
        surname.classList.remove("is-empty-label");
    }

    if (newPassword.value === "") {
        newPassword.classList.add("is-empty-label");
        valid = false;
        showError(newPassword, "Password is required");
    } else {
        clearError(newPassword);
        newPassword.classList.remove("is-empty-label");
    }




    if (name.value === "") {
        name.classList.add("is-empty-label");
        valid = false;
        showError(name, "Name is required");
    } else {
        clearError(name);
        name.classList.remove("is-empty-label");
    }


    if (checkPassword.value === "") {
        checkPassword.classList.add("is-empty-label");
        valid = false;
        showError(checkPassword, "Confirm Password is required");
    } else {
        clearError(checkPassword);
        checkPassword.classList.remove("is-empty-label");
    }


    if (email.value === "") {
        email.classList.add("is-empty-label");
        valid = false;
        showError(email, "Email is required");
    } else {
        clearError(email);
        email.classList.remove("is-empty-label");
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
    signUpForm.addEventListener("submit", function (event) {
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



