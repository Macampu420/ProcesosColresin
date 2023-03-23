const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const NumLote = urlParams.get('NumLote');

fetch(`./../controladores/registroFrm.php?NumLote=${NumLote}`)
.then(response => response.json())
.then((datosProceso) => {

    for(let clave in datosProceso[0]) {
        console.log(document.getElementById(`clave`));
    }

    console.log(datosProceso);
})