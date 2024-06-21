// =======Variables Globales======
let iconos = []
let selecciones = []

var puntaje = 0;
let parejasEncontradas = 0; // Inicializar el contador de parejas encontradas
let generar = document.getElementById('generar');
let puntuacionBoton = document.getElementById('subirPuntuacion');
function actualizarPuntaje(){
    let divPuntaje = document.getElementById('puntaje');
    divPuntaje.textContent = 'PUNTAJE: ' + puntaje;
}    
generarTablero()

function cargarIconos() {
    iconos = [
        '<img src="img/carta-1.png" class="imagen-card"></img>',
        '<img src="img/carta-2.png" class="imagen-card"></img>',
        '<img src="img/carta-3.png" class="imagen-card"></img>',
        '<img src="img/carta-4.png" class="imagen-card"></img>',
        '<img src="img/carta-5.png" class="imagen-card"></img>',
        '<img src="img/carta-6.png" class="imagen-card"></img>',
        '<img src="img/carta-7.png" class="imagen-card"></img>',
        '<img src="img/carta-8.png" class="imagen-card"></img>',
    ]
}

function generarTablero() {
    cargarIconos()
    selecciones = []
    
    let tablero = document.getElementById("tablero")
    let tarjetas = []
    for (let i = 0; i < 12; i++) {
        tarjetas.push(`
        <div class="area-tarjeta" onclick="seleccionarTarjeta(${i})">
            <div class="tarjeta" id="tarjeta${i}">
                <div class="cara trasera" id="trasera${i}">
                    ${iconos[0]}
                </div>
                <div class="cara superior">
                </div>
            </div>
        </div>        
        `)
        if (i % 2 == 1) {
            iconos.splice(0, 1)
        }
    }
    tarjetas.sort(() => Math.random() - 0.5)
    tablero.innerHTML = tarjetas.join(" ");
}

function seleccionarTarjeta(i) {
    let tarjeta = document.getElementById("tarjeta" + i)
    if (tarjeta.style.transform != "rotateY(180deg)") {
        tarjeta.style.transform = "rotateY(180deg)"
        selecciones.push(i)
    }
    if (selecciones.length == 2) {
        deseleccionar(selecciones)
        selecciones = []
    }
}

function deseleccionar(selecciones) {
    setTimeout(() => {
        let trasera1 = document.getElementById("trasera" + selecciones[0])
        let trasera2 = document.getElementById("trasera" + selecciones[1])
        if (trasera1.innerHTML != trasera2.innerHTML) {
            let tarjeta1 = document.getElementById("tarjeta" + selecciones[0])
            let tarjeta2 = document.getElementById("tarjeta" + selecciones[1])
            tarjeta1.style.transform = "rotateY(0deg)"
            tarjeta2.style.transform = "rotateY(0deg)"
        }else{
            trasera1.style.background = "plum"
            trasera2.style.background = "plum"
            puntaje += 100; 
            actualizarPuntaje();
            parejasEncontradas++; // Incrementar el contador de parejas encontradas
            if (parejasEncontradas == 6) { //  Verificar si todas las parejas han sido encontradas
                generar.style.display = 'block';
                puntuacionBoton.style.display = 'block';

            }
        }
    }, 500);
}

function subirPuntuacion(){
    if (puntaje > 0) {
        window.parent.postMessage(puntaje, '*');
    }
    actualizarPuntaje(); // Actualizar puntaje en la pantalla
    setTimeout(function() {
        window.location.href = '../../dashboard.php'; // Redirigir después de 2 segundos
    }, 1000); 
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('pantalla-juego').style.display = 'block';
    generarTablero();
});