document.addEventListener('DOMContentLoaded', (event) => {
  //Instrucciones Juego

  //Can the player play multiple times?
  question1 = 1;  // or 0 if the player can only play once

  //Can the player play multiple times?
  question2 = 1;  // or 0 if the player has infinity spins

  //If the question 2 = 1 = Change the spins available
  let girosDisponibles = 3;

  //Modify the time they have per question
  var tiempoRestante = 15;

  // ============================Declaraciones Globales============================

  const ruleta = document.querySelector('#ruleta');
  let giros = 0;
  var categoriasJugadas = {};
  bloquearGiro = false;

  // ==========q========================Metodos======================
  // Controlador del evento de clic
  ruleta.addEventListener('click', function () {
    if (!bloquearGiro) { // Solo gira si bloquearGiro es false
      girar();
    }
  });

  document.querySelector('#contador-giros').innerText = 'Giros disponibles: ' + girosDisponibles;
  var contenedorBoton = document.getElementById('contenedor-boton');
  var enlace = document.getElementById('boton-guardar');
  // ==================================================================================

  //Función Padre Girar 
  function girar() {

    // =======Verificar la cantidad de giros=======
    if (question2 == 1) {
      if (giros >= 3) {
        document.querySelector('#contador-giros').style.display = 'none';
        document.querySelector('.vara').style.display = 'none';
        document.querySelector('.quizzSeleccionado').style.display = 'none';
        document.querySelector('.premio').style.display = 'none';

        // Mostrar mensaje final dependiendo de la puntuación
        mostrarMensajeFinal();
        // actualizarEstadoJuego(1);

        // Muestra el contenedor del botón
        contenedorBoton.style.display = 'block';

        return;
      }
    }

    // ===========Contador de Giros Disponibles============
    girosDisponibles--;

    // Actualiza el contenido de #contador-giros con girosDisponibles
    document.querySelector('#contador-giros').innerText = 'Giros disponibles: ' + girosDisponibles;

    let rand = Math.random() * 7200;
    calcular(rand);
    giros++;
    var sonido = document.querySelector('#audio');
    sonido.setAttribute('src', 'sonido/ruleta.mp3');
  }

  function mostrarMensajeFinal() {
    let mensaje = '';
    if (puntuacion <= 25000) {
      mensaje = 'PRINCIPIANTE. Disfrutas de los temas de terror y suspenso. ¡Sigue jugando!';
    } else if (puntuacion <= 50000) {
      mensaje = 'INTERMEDIO. Sabes lo básico sobre temas terror y suspenso. Sigue participando e incrementa tus conocimientos.';
    } else if (puntuacion <= 75000) {
      mensaje = 'AVANZADO. Tienes un buen conocimiento de temas de terror, suspenso y Halloween. Estás muy cerca de ser un experto';
    } else {
      mensaje = 'EXPERTO. Eres un amplio conocedor de temas de terror y suspenso, no solo de lo “popular” ¡Felicidades! Te esperamos en la siguiente trivia';
    }
    document.querySelector('#contenedor-preguntas').innerHTML = 'Juego Finalizado<br>' + mensaje;
  }

  function premio(premios) {
    var elemento = document.querySelector('.quizzSeleccionado');

    // Elimina las clases existentes
    elemento.className = '';

    // Agrega la clase 'quizzSeleccionado'
    elemento.classList.add('quizzSeleccionado');

    // Read the pull of questions
    switch (premios) {
      case categoryOne:
        mostrarPreguntas(categoryOne);
        break;
      case categoryTwo:
        mostrarPreguntas(categoryTwo);
        break;
      case categoryThree:
        mostrarPreguntas(categoryThree);
        break;
      case categoryFour:
        mostrarPreguntas(categoryFour);
        break;
     
    }

    elemento.innerHTML = premios;
  }

  function calcular(rand) {
    valor = rand / 360;
    valor = (valor - parseInt(valor.toString().split(".")[0])) * 360;
    ruleta.style.transform = "rotate(" + rand + "deg)";

    console.log(valor);

    setTimeout(() => {
      switch (true) {
        case valor > 0 && valor <= 90:
          premio(categoryOne);
          break;
        case valor > 90 && valor <= 180:
          premio(categoryTwo);
          break;
        case valor > 180 && valor <= 260:
          premio(categoryThree);
          break;
        case valor > 260 && valor <= 360:
          premio(categoryFour);
          break;
        
      }
    }, 5000);
  }

  var estadoJuego = 1;
  //Declaración Global

  // ======================Declaración Partidas Jugadas=================
  var puntuacion = 0;
  var categoriasJugadas = {};
  var contenedorPreguntas = document.querySelector('#contenedor-preguntas');

  function mostrarPreguntas(categoria) {
    //CONDICIÓN: Si la categoría ya ha sido jugada
    if (categoriasJugadas[categoria]) {
      contenedorPreguntas.innerHTML = 'Esta categoría ya ha sido jugada. </br> Gira Nuevamente';
      giros = giros - 1;
      girosDisponibles = girosDisponibles + 1;
      setTimeout(function () {
        contenedorPreguntas.innerHTML = ''; // Limpia el mensaje
        girar();
      }, 20000);
      return;
    }
    categoriasJugadas[categoria] = true;

    let preguntasSeleccionadas = [...preguntas[categoria]];
    preguntasSeleccionadas.sort(() => Math.random() - 0.5); // Mezcla las preguntas

    let contenedorTemporizador = document.querySelector('#temporizador-pregunta');
    let contenedorRespuestas = document.querySelector('#contenedor-respuestas'); // Mueve esta línea aquí
    let puntajeTotal = document.querySelector('#puntaje-total'); // Selecciona el elemento de puntuación total
    let preguntaActual = 0;
    let temporizador;

    contenedorPreguntas.style.display = 'block'; // Muestra el contenedor de preguntas  

    function mostrarPregunta() {
      // Detiene el temporizador anterior si existe
      if (temporizador) {
        clearInterval(temporizador);
      }

      bloquearGiro = true; // Bloquea el giro

      // Comprueba si ya se han mostrado todas las preguntas
      if (preguntaActual >= preguntasSeleccionadas.length) {
        contenedorPreguntas.innerHTML = 'La categoría ha finalizado. </br> Gira Nuevamente';
        bloquearGiro = false; // Desbloquea el giro

        contenedorRespuestas.innerHTML = ''; // Limpia las respuestas

        // Encuentra el contenedor del botón y el enlace dentro del contenedor
        enlace.addEventListener('click', function (event) {
          // Previene la acción por defecto del enlace
          event.preventDefault();

          // Imprime "Guardar & Salir" en la consola
          window.puntuacionGlobal = puntuacion; // Guarda la puntuación global
          console.log(window.puntuacionGlobal)

          // Crear un objeto FormData para enviar los datos
          var datos = new FormData();
          datos.append('puntuacionGlobal', window.puntuacionGlobal);

          // Crear la solicitud AJAX
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'guardarPuntuacion.php', true);

          // Establecer la función de callback para la respuesta
          xhr.onload = function () {
            if (this.status == 200) {
              console.log(this.responseText);
              // Espera 2 segundos después de enviar la solicitud
              setTimeout(function () {
                // Redirige a dashboard.php
                window.location.href = '../../dashboard.php';
              }, 2000); // 2000 milisegundos = 2 segundos
            } else {
              console.error('Error al guardar la puntuación');
            }
          };

          // Enviar la solicitud
          xhr.send(datos);

          puntajeTotal.textContent = 'Puntuación total: ' + puntuacion; // Actualiza la puntuación total

          // Muestra un mensaje de éxito
          enlace.textContent = 'Puntuación guardada';
          enlace.style.color = 'green';
        });

        return;
      }

      // Selecciona la pregunta actual
      let pregunta = preguntasSeleccionadas[preguntaActual];

      // Muestra la pregunta
      contenedorPreguntas.innerHTML = pregunta.pregunta;

      // Muestra las respuestas
      contenedorRespuestas.innerHTML = '';
      pregunta.respuestas.forEach((respuesta, index) => {
        let p = document.createElement('p');
        p.textContent = respuesta;

        // Agrega un evento click a cada respuesta
        p.addEventListener('click', () => {
          // Verifica si la respuesta es correcta
          if (index === pregunta.respuestaCorrecta) {
            p.classList.add('correcto_respuesta');
            puntuacion += 6666; // Incrementa la puntuación
            puntajeTotal.textContent = 'Puntuación total: ' + puntuacion; // Actualiza la puntuación total
          } else {
            p.classList.add('incorrecto_respuesta');
          }

          // Detiene el temporizador
          clearInterval(temporizador);

          // Espera 1 segundo y luego pasa a la siguiente pregunta
          setTimeout(mostrarPregunta, 1000);
        });

        contenedorRespuestas.appendChild(p);
      });

      // Muestra el temporizador
      contenedorTemporizador.style.display = 'block';
      tiempoRestante = 15;
      contenedorTemporizador.innerHTML = tiempoRestante;

      temporizador = setInterval(() => {
        tiempoRestante--;
        contenedorTemporizador.innerHTML = tiempoRestante;

        if (tiempoRestante <= 0) {
          clearInterval(temporizador);
          // Pasa a la siguiente pregunta
          mostrarPregunta();
        }
      }, 1000);

      // Incrementa la pregunta actual
      preguntaActual++;
    }

    // Comienza mostrando la primera pregunta
    mostrarPregunta();
  }
});
