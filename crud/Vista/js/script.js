let guardar = async (id=null) =>{
    const valores = Array.from(document.querySelectorAll('#frmIngresar input')).map(input => input.value);
    let nombre=document.getElementById("nombre").value;
    let email=document.getElementById("email").value;
    fetch('../Controlador/Usuario.php?Action=crear', {
    method: 'POST', // Método HTTP
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        nombre:nombre,
        email:email
   })
}).then(response => {
        if (!response.ok) {
            throw new Error('Error en la red: ' + response.statusText);
        }
    })
    .then(data => {
        console.log('Respuesta del servidor:', data);
       obtenerDatos();
    })
    .catch(error => {
        console.log('Hubo un problema con la solicitud Fetch:', error);
    });

}



let eliminar = async (id) =>{
    fetch('../Controlador/Usuario.php?Action=eliminar', {
    method: 'POST', // Método HTTP
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        id:id
   })
}).then(response => {
        if (!response.ok) {
            throw new Error('Error en la red: ' + response.statusText);
        }
    })
    .then(data => {
        console.log('Respuesta del servidor:', data);
       obtenerDatos();
    })
    .catch(error => {
        console.log('Hubo un problema con la solicitud Fetch:', error);
    });

}


onload(() => {
obtenerDatos();
});


let obtenerDatos = async () =>{

  const response= await fetch('../Controlador/Usuario.php?Action=listar', {
    method: 'POST', // Método HTTP
    headers: {
        'Content-Type': 'application/json'
    },
})

    // Verificar si la respuesta es exitosa
    if (!response.ok) {
        throw new Error('Error en la red: ' + response.statusText);
    }
    const datos= await response.json(); // Convertir la respuesta a JSON
    const tablaCuerpo = document.getElementById('tableUser').getElementsByTagName('tbody')[0];
    tablaCuerpo.innerHTML = '';
        // Recorrer los datos y agregar filas a la tabla
        datos.forEach(item => {
            const fila = document.createElement('tr');
            const celdaId = document.createElement('td');
            celdaId.textContent = item.id;
            fila.appendChild(celdaId);
            const celdaNombre = document.createElement('td');
            celdaNombre.textContent = item.nombre; 
            fila.appendChild(celdaNombre);
            const celdaEmail = document.createElement('td');
            celdaEmail.textContent = item.email; 
            fila.appendChild(celdaEmail);

           const celdaAction = document.createElement('td');
            celdaAction.innerHTML = `<button class="btn btn-success" onclick="guardar(${item.id})">Actualizar</button> <button onclick="eliminar(${item.id})" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg></button>`; 
            fila.appendChild(celdaAction);
            // Agregar la fila al cuerpo de la tabla
            tablaCuerpo.appendChild(fila);
        });

//editar
    const tds = document.querySelectorAll('td');
        tds.forEach(td => {
            td.addEventListener('dblclick', function() {
            // Crea un nuevo elemento de entrada
                const input = document.createElement('input');
                input.type = 'text';
                input.value = this.innerText; // Establece el valor del input al texto actual del td

                // Reemplaza el contenido del td con el input
                this.innerHTML = '';
                this.appendChild(input);

                // Enfoca el input y selecciona su contenido
                input.focus();
                input.select();

                // Al hacer clic fuera del input, se guarda el valor y se vuelve a mostrar el texto
                input.addEventListener('blur', () => {
                    this.innerText = input.value; // Actualiza el td con el nuevo valor
                    editar(this.cellIndex,input.value);
                });

                // También puedes guardar el valor al presionar Enter
                input.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter') {
                        this.innerText = input.value; // Actualiza el td con el nuevo valor
                    }
                });
            });
        });
}



/*
const obtenerDatos = async () => {
    try {
        const response = await fetch('../Controlador/Usuario.php?Action=Listar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ Action: 'Listar' })
        });

        // Verificar si la respuesta es exitosa
        if (!response.ok) {
            throw new Error('Error en la red: ' + response.statusText);
        }

        // Convertir la respuesta a JSON
        const datos = await response.json();

        // Llenar la tabla con los datos
        const tablaCuerpo = document.getElementById('tableUser').getElementsByTagName('tbody')[0];
        tablaCuerpo.innerHTML = ''; // Limpiar el cuerpo de la tabla

        // Recorrer los datos y agregar filas a la tabla
        datos.forEach(item => {
            const fila = document.createElement('tr');

            const celdaId = document.createElement('td');
            celdaId.textContent = item.id; // Asumiendo que el JSON tiene un campo 'id'
            fila.appendChild(celdaId);

            const celdaNombre = document.createElement('td');
            celdaNombre.textContent = item.nombre; // Asumiendo que el JSON tiene un campo 'nombre'
            fila.appendChild(celdaNombre);

            const celdaEmail = document.createElement('td');
            celdaEmail.textContent = item.email; // Asumiendo que el JSON tiene un campo 'email'
            fila.appendChild(celdaEmail);

            // Agregar la fila al cuerpo de la tabla
            tablaCuerpo.appendChild(fila);
        });
    } catch (error) {
        console.error('Hubo un problema con la solicitud Fetch:', error);
    }
};

// Llamar a la función para obtener los datos y llenar la tabla
obtenerDatos();
*/