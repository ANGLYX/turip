// script.js
const botonAudio = document.querySelector('.boton-audio');
const audio = document.getElementById('audio');

botonAudio.addEventListener('click', () => {
  if (audio.paused) {
            audio.play();
            botonPlayPause.textContent = 'Pausar';
        } else {
            audio.pause();
            botonPlayPause.textContent = 'Reproducir';
        }
});