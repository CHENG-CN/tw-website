document.addEventListener("DOMContentLoaded", function() {
    var formulario = document.querySelector('form');
    var inputCalle = document.getElementById('direccion_texto');
    var inputCoordenadas = document.getElementById('ubicacion_coordenadas');

    if (!formulario || !inputCalle || !inputCoordenadas) return;

    formulario.addEventListener('submit', function(evento) {
        evento.preventDefault(); 

        var calle = inputCalle.value;
        var busquedaCompleta = encodeURIComponent(calle + ", Granada, España");
        var url = `https://nominatim.openstreetmap.org/search?format=json&limit=1&q=${busquedaCompleta}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    // usuario | latitud,longitud"
                    inputCoordenadas.value = `${calle} | ${data[0].lat},${data[0].lon}`;
                } else {
                    inputCoordenadas.value = `${calle} | 37.1773,-3.5986`; 
                    alert("No se localizó la calle exacta. Se ubicará en el centro de Granada.");
                }
                formulario.submit(); 
            })
    });
});