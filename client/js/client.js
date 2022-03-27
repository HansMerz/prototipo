$(document).ready(function () {
    $(".menu").click(function () {
        $(".keep").toggleClass("width");
    });

    $(".delete-control").on('click', function (e) {
        e.preventDefault();
        const controlId = $(this).data('id');
        const id = $("#control-" + controlId).val();
        const formData = {
            'controlId' : id
        }
        deleteControl(formData);
    })

    $(".update-control").on('click', function (e) {
        e.preventDefault();
        const controlId = $(this).data('id');
        const id = $("#control-" + controlId).val();
        const formData = {
            'controlId' : id
        }
        getControlById(formData);
    })

    $("#btn-update").on('click', function (e) {
        e.preventDefault();
        const form = document.getElementById('control-form');
        const formData = new FormData(form);
        const elements = Object.fromEntries(formData);
        const isValid = validatesForm(elements);
        if (isValid) {
            updateControls(elements);
        }
    })
});

function deleteControl(params) {
    const api = '../backend/api/controller/control_delete.php'
    fetch(api, {
        method: "POST",
        body: JSON.stringify(params),
        header: {
            "Content-type": "application/json; charset=UTF-8"
        }
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.error) {
                showErrorMessage(data.message);
            }

            if (data.deleted) {
                showSuccessMessage(data.message);
                setTimeout(function () {
                    location.reload();
                }, 3000)
            }
        })
        .catch((data) => {
            showErrorMessage(data.message);
        });
}

function getControlById(params) {
    const api = '../backend/api/controller/control_search_by_id.php'
    fetch(api, {
        method: "POST",
        body: JSON.stringify(params),
        header: {
            "Content-type": "application/json; charset=UTF-8"
        }
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.error) {
                showErrorMessage(data.message);
            } else {
                showDataInFields(data.data);
            }
        })
        .catch((data) => {
            showErrorMessage(data.message);
        });
}

function showDataInFields(data) {
    $("#profesional").val(data.profesional);
    $("#especializacion").val(data.especializacion);
    $("#fecha").val(data.fecha);
    $("#observacion").val(data.observacion);
    $("#control-update-value").val(data.idcontrol);
    switchButtons(false);
}

window.onload = function () {
    const form = document.getElementById('control-form');

    form.onsubmit = function (e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        const elements = Object.fromEntries(formData);
        const isValid = validatesForm(elements);
        if (isValid) {
            registerControls(elements);

        }
    }

}

function validatesForm (elements) {
    let response = true;
    for (const values in elements) {
        if (elements[values].length == 0 || elements[values] == "") {
            response = false;
            showErrorMessage("Por favor diligencie todos los campos para registrar el control");
            break;
        }
    }

    return response;
}


function registerControls(control) {
    const api =  '../backend/api/controller/controls_register.php'
    fetch(api, {
        method: "POST",
        body: JSON.stringify(control),
        header: {
            "Content-type": "application/json; charset=UTF-8"
        }
    })
        .then((res) => res.json())
        .then((data) => {

            if (data.error) {
                
                showErrorMessage(data.message);

            }

            if (data.registered) {
                 showSuccessMessage(data.message);
                setTimeout(function () {
                    location.reload();
                }, 3000)
               
            }
        })
        .catch((data) => {
            showErrorMessage(data.message);
        });
}

function updateControls(control) {
    const api =  '../backend/api/controller/controls_update.php'
    fetch(api, {
        method: "POST",
        body: JSON.stringify(control),
        header: {
            "Content-type": "application/json; charset=UTF-8"
        }
    })
        .then((res) => res.json())
        .then((data) => {

            if (data.error) {
                showErrorMessage(data.message);
            }

            if (data.updated) {
                $("#control-update-value").val("");
                showSuccessMessage(data.message);
                setTimeout(function () {
                    location.reload();
                }, 3000)
            }
        })
        .catch((data) => {
            showErrorMessage(data.message);
        });
}

function showErrorMessage(message) {
    const messageContainer = document.getElementById('container-error-message');
    const errorMessage = document.getElementById('error-message');
    messageContainer.style.display = "block";
    errorMessage.innerText = message;
    setTimeout(function () {
        messageContainer.style.display = 'none';
    }, 5000)
}

function showSuccessMessage(message) {
    const messageContainer = document.getElementById('success-container-message');
    const successMessage = document.getElementById('success-message');
    messageContainer.style.display = "block";
    successMessage.innerText = message;
    setTimeout(function () {
        messageContainer.style.display = 'none';
    }, 3000)
}

function switchButtons(showRegister) {
    if (showRegister) {
        $("#btn-register").show();
        $("#btn-update").hide();
    } else {
        $("#btn-register").hide();
        $("#btn-update").show();
    }
}
