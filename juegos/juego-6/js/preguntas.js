 //Define the name of your categories

  var categoryOne = 'Personajes'
  var categoryTwo = 'Cultura Popular'
  var categoryThree = 'Series y Películas'
  var categoryFour = 'Servicio Totalplay'
  




 let preguntas = {
    'Cultura Popular': [
        {
            pregunta: '¿Qué día se celebra Halloween?',
            respuestas: ['a) 2 de noviembre', 'b) 31 de octubre', 'c) 1 de noviembre'],
            respuestaCorrecta: 1
        },
        {
            pregunta: '¿Cuál de estas no es una decoración tradicional de Halloween?',
            respuestas: ['a) Guirnalda', 'b) Velas', 'c) Esqueleto'],
            respuestaCorrecta: 0
        },
        {
            pregunta: '¿En que país se originó la celebración de Halloween?',
            respuestas: ['a) Estados Unidos', 'b) México', 'c) Inglaterra'],
            respuestaCorrecta: 2
        },
        {
            pregunta: '¿En qué animal supuestamente se pueden convertir los vampiros?',
            respuestas: ['a) Delfín', 'b) León', 'c) Murciélago'],
            respuestaCorrecta: 2
        },
        {
            pregunta: '¿Qué significa la palabra "Halloween"?',
            respuestas: ['a) Noche de miedo', 'b) Noche de los santos', 'c) Día del caramelo'],
            respuestaCorrecta: 1
        }
    ],
    'Series y Películas': [
        {
            pregunta: '¿Qué serie de ciencia ficción de Netflix está ambientada en la ciudad ficticia de Hawkins?',
            respuestas: ['a) Los locos Adams', 'b) Stranger Things', 'c) Tha Walking Dead'],
            respuestaCorrecta: 1
        },
        {
            pregunta: '¿Miércoles Addams es qué miembro de la familia Addams?',
            respuestas: ['a) Hija', 'b) Madre', 'c) Padre'],
            respuestaCorrecta: 0
        },
        {
            pregunta: '¿Cómo se llama el muñeco poseído por un demonio en la franquicia El Conjuro?',
            respuestas: ['a) Anabelle', 'b) El exorcista', 'c) El aro'],
            respuestaCorrecta: 0
        },
        {
            pregunta: '¿Qué película de 1976 se considera una de las primeras películas importantes del subgénero?',
            respuestas: ['a) El Exorcista', 'b) El presagio', 'c) La semilla del diablo'],
            respuestaCorrecta: 1
        },
        {
            pregunta: 'De todas estas películas, ¿cuál no está relacionada con la posesión demoníaca?',
            respuestas: ['a) La Monja', 'b) Cloverfield', 'c) Actividad Paranormal'],
            respuestaCorrecta: 1
        }
    ],
    'Personajes': [
        {
            pregunta: '¿Qué personaje de Halloween está hecho de huesos?',
            respuestas: ['a) Fantasma', 'b) Esqueleto', 'c) Vampiro'],
            respuestaCorrecta: 1
        },
        {
            pregunta: '¿Dónde duermen los vampiros?',
            respuestas: ['a) En un ataúd', 'b) En su cama', 'c) En el parque'],
            respuestaCorrecta: 0
        },
        {
            pregunta: '¿Qué animal es el mejor amigo de una bruja?',
            respuestas: ['a) Un gato negro', 'b) Un ajolote', 'c) Una ballena'],
            respuestaCorrecta: 0
        },
        {
            pregunta: '¿Dónde se originaron las momias reales?',
            respuestas: ['a) Antiguo Egipto', 'b) Tulum', 'c) Australia'],
            respuestaCorrecta: 0
        },
        {
            pregunta: '¿Cuál es el disfraz de Halloween más popular en EE.UU. según Google?',
            respuestas: ['a) Peter Pan', 'b) Bruja', 'c) Payaso'],
            respuestaCorrecta: 1
        }
    ],
    'Servicio Totalplay': [
        {
            pregunta: '¿En qué sección de tu App Totalplay puedes suscribirte a servicios de streaming?',
            respuestas: ['a) Estado de cuenta', 'b) Mi Paquete', 'c) Datos de la cuenta'],
            respuestaCorrecta: 1
        },
        {
            pregunta: '¿Qué función realiza el WiFi PRO de Totalplay?',
            respuestas: ['a) Línea de teléfono', 'b) Adorno', 'c) Extiende la cobertura de tu internet'],
            respuestaCorrecta: 2
        },
        {
            pregunta: '¿Dónde puedes consultar tu estado de cuenta Totalplay?',
            respuestas: ['a) Mi Totalplay', 'b) App Totalplay', 'c) Todas las anteriores'],
            respuestaCorrecta: 2
        },
        {
            pregunta: '¿En qué sección de tu App Totalplay puedes pagar tu servicio cada mes?',
            respuestas: ['a) Estado de cuenta', 'b) Mi Paquete', 'c) Datos de la cuenta'],
            respuestaCorrecta: 0
        }
    ]
};

