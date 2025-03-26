function ajax(url, fun = null, formData = null, method = "POST") {
    fetch('../Controlador/' + url, {
        method: method,
        body: formData,
    })
        .then((res) => res.json())
        .catch((error) =>
          alert("error")
        )
        .then(fun);
}

onload(() => {
  list();
});


function listar() {

    let parametros = formData("#frmIngresar");
    parametros.append("Action", "Listar")
    ajax(
      "Usuario.php",
      (response) => {
        if (response.exito) {
          location.href = RUTA + "Set/Menu";
        } else {
          alert.fire({
            icon: "error"
            , title: response.mensaje
          })
        }
        title = response.mensaje;

      },
      parametros
    );
    return false;

}

function list(){
  fetch('../Controlador/Usuario.php', {
    method: 'POST', // Método HTTP
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        Action: 'Listar',
        clave2: 'valor2'
    })
})
.then(response => response.json())
.then(data => {
    console.log('Datos enviados correctamente:', data);
})
.catch((error) => {
    console.error('Error al enviar datos:', error);
});
  
}
