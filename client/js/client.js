$(document).ready(function () {
    $(".menu").click(function () {
        $(".keep").toggleClass("width");
    });

    $(".delete-control").on('click', function (e) {
        e.preventDefault();
        const controlId = $(this).data('id');
        const id = $("#control-" + controlId).val();
        const formData = {
            'controlId' : controlId
        }
        deleteControl(formData);
    })
});

function deleteControl(params) {
    const api = window.location.origin + '/backend/api/controller/control_delete.php'
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
