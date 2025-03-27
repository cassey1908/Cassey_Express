document.getElementById('login').addEventListener('submit', function (e) {
    e.preventDefault();

    let formData = new FormData(this);
    let xhr = new XMLHttpRequest();

    xhr.open('POST', 'php/login.php', true);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                let respuesta = JSON.parse(xhr.responseText);

                if (respuesta.status === 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: respuesta.message,
                        confirmButtonText: 'Continuar'
                    }).then(() => {
                        window.location.href = 'admin-dashboard.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: respuesta.message
                    });
                }
            } catch (error) {
                console.error("Error procesando la respuesta:", error);
            }
        }
    };

    xhr.send(formData);
});
