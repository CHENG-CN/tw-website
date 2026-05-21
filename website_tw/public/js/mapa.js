document.addEventListener("DOMContentLoaded", function() {
    var mapaContenedor = document.getElementById('mapa-incidencias');
    if (!mapaContenedor) return; 

    var map = L.map('mapa-incidencias').setView([37.1773, -3.5986], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var incidencias = window.datosIncidencias || []; 

    incidencias.forEach(function(incidencia) {
        if (!incidencia.ubicacion) return;

        if (incidencia.estado) {
            var estadoComprobar = incidencia.estado.toLowerCase().trim();
            if (estadoComprobar === 'sin_validar' || estadoComprobar === 'rechazado') {
                return;
            }
        } else {
            return; 
        }

        if (incidencia.ubicacion.includes('|')) {
            var partes = incidencia.ubicacion.split('|');
            var coordenadasTexto = partes[1].trim();

            var coordenadas = coordenadasTexto.split(',');
            var lat = parseFloat(coordenadas[0]);
            var lng = parseFloat(coordenadas[1]);

            if (!isNaN(lat) && !isNaN(lng)) {
                var marker = L.marker([lat, lng]).addTo(map);
                
                var badgeColor = 'bg-secondary';
                var estadoFormateado = 'PENDIENTE';
                var estadoLimpio = incidencia.estado.toLowerCase().trim();
                
                if (estadoLimpio === 'solucionado') {
                    badgeColor = 'bg-success';
                    estadoFormateado = 'SOLUCIONADO';
                } else if (estadoLimpio === 'en_proceso') {
                    badgeColor = 'bg-primary';
                    estadoFormateado = 'EN PROCESO';
                } else if (estadoLimpio === 'pendiente') {
                    badgeColor = 'bg-warning text-dark';
                    estadoFormateado = 'PENDIENTE';
                }
                
                marker.bindPopup(`
                    <div style="font-family: 'Inter', sans-serif; min-width: 140px;">
                        <h6 style="font-weight:700; margin-bottom:4px; color:#002d5e;">${incidencia.titulo}</h6>
                        <p style="font-size:12px; color:#666; margin-bottom:2px;"><b>Lugar:</b> ${partes[0].trim()}</p>
                        <p style="font-size:12px; color:#666; margin-bottom:8px;">${incidencia.detalle || ''}</p>
                        <span class="badge ${badgeColor}" style="text-transform:uppercase; font-size:10px; font-weight:700; padding: 4px 8px;">
                            ${estadoFormateado}
                        </span>
                    </div>
                `);
            }
        }
    });
});