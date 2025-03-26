function ajax(url, fun = null, formData = null, method = "POST") {
    fetch('../Controlador/' + url, {
        method: method,
        body: formData,
    })
        .then((res) => res.json())
        .catch((error) =>
            alert.fire({
                icon: "error",
                title: 'Error interno del servidor',
            })
        )
        .then(fun);
}

onload(() => {
  listar();
});
function listar() {
  ajax(
    "Usuario/listar/",
    (response) => {
      if (response.exito) {
        localStorage.setItem("clasificacion", JSON.stringify(response.data));
      } else {
        console.log(response.mensaje);
      }
    }
  );
}