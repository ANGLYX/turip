function updateDateTime() {
    const now = new Date();
    const date = now.toLocaleDateString('es-ES', {
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric'
    });
    const time = now.toLocaleTimeString('es-ES');

    document.getElementById('date').textContent = date;
    document.getElementById('time').textContent = time;
}

setInterval(updateDateTime, 1000);
updateDateTime();