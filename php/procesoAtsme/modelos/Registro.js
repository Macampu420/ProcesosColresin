let RegistroForm = {
    //metodo que envia la primera parte del formulario al servidor
    enviarPrimeraParte: (event, datosPrimeraParte) => {
        fetch('./registroFrm.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(datosPrimeraParte)
          })
          .then(response => response.text())
          .then(data => console.log(data))
          .catch(error => console.error('Error al hacer la petición', error));
    }
}