window.onload = function () {
    const form = document.getElementById('login-form');

    form.onsubmit = function (e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        const elements = Object.fromEntries(formData);
        const isValid = validateForm(elements);
        if (isValid) {
            authUser(elements);
        }
    }

}

function validateForm (elements) {
    let response = true;
    for (const values in elements) {
        if (elements[values].length == 0 || elements[values] == "") {
            response = false;
            showErrorMessage("Por favor diligencie todos los campos para iniciar sesión");
            break;
        }
    }

    return response;
}

function showErrorMessage (message) {
    const messageContainer = document.getElementById('container-error-message');
    const errorMessage = document.getElementById('error-message');
    messageContainer.style.display = "block";
    errorMessage.innerText = message;
    setTimeout(function () {
        messageContainer.style.display = 'none';
    }, 5000)
}

function authUser (auth) {
    const api = window.location.origin + '/backend/api/controller/auth.php'
    fetch(api, {
        method: "POST",
        body: JSON.stringify(auth),
        header: {
            "Content-type" : "application/json; charset=UTF-8"
        }
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.error) {
                showErrorMessage(data.message);
            }

            if(data.auth) {
              //TODO: Redirect to Dashboard from backend
            }
        })
        .catch((data) => {
            showErrorMessage(data.message);
        });
}