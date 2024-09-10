  //Define the name of your categories

  var categoryOne = 'Servicio Totalplay'
  var categoryTwo = 'Independencia de Mexico'
  var categoryThree = 'Historia de México'
  var categoryFour = 'Cultura General de Mexico'
  




 let preguntas = {
    'Independencia de Mexico': [
        {
            pregunta: '¿Cuándo fue el inicio de la Independencia de México?',
            respuestas: ['a) 14 septiembre 1810', 'b) 16 septiembre 1810', 'c) 16 septiembre 1710'],
            respuestaCorrecta: 1
        },
        {
            pregunta: '¿Lugar en donde el cura Miguel Hidalgo y Costilla dio el Grito de Independencia?',
            respuestas: ['a) Dolores, Hidalgo', 'b) El Zócalo', 'c) Cholula, Puebla'],
            respuestaCorrecta: 0
        },
        {
            pregunta: '¿Por qué los criollos se reunían en secreto?',
            respuestas: ['a) Por represión', 'b) Para platicar', 'c) Para celebrar'],
            respuestaCorrecta: 0
        },
        {
            pregunta: '¿Quién es el siervo de la nación?',
            respuestas: ['a) José María Morelos y Pavón', 'b) Miguel Hidalgo', 'c) Venustiano Carranza'],
            respuestaCorrecta: 0
        },
        {
            pregunta: '¿Cuál era la imagen del estandarte del cura Miguel Hidalgo?',
            respuestas: ['a) La Virgen de Fátima', 'b) La Virgen de Guadalupe', 'c) Ninguna de las anteriores'],
            respuestaCorrecta: 1
        }
    ],
    'Historia de México': [
        {
            pregunta: '¿De dónde provenían los aztecas, también conocidos como mexicas?',
            respuestas: ['a) Tulum', 'b) Aztlán', 'c) Caribe'],
            respuestaCorrecta: 1
        },
        {
            pregunta: '¿A cuál cultura se le conoce como la "madre de las civilizaciones mesoamericanas"?',
            respuestas: ['a) Olmeca', 'b) Chichimeca', 'c) Mexica'],
            respuestaCorrecta: 0
        },
        {
            pregunta: 'El presidente que nacionalizó la industria petrolera en México fue:',
            respuestas: ['a) Lázaro Cárdenas', 'b) Venustiano Carranza', 'c) Benito Juarez'],
            respuestaCorrecta: 0
        },
        {
            pregunta: '¿Qué se celebra el cinco de mayo en México?',
            respuestas: ['a) Independencia de México', 'b) Revolución Mexicana', 'c) La victoria de la Batalla de Puebla vs el ejército francés'],
            respuestaCorrecta: 2
        },
        {
            pregunta: '¿En que año comenzó la Revolución Mexicana?',
            respuestas: ['a) 1810', 'b) 1910', 'c) 1519'],
            respuestaCorrecta: 1
        }
    ],
    'Cultura General de Mexico': [
        {
            pregunta: '¿Cuál es el nombre oficial y constitucional de México?',
            respuestas: ['a) Estados Unidos Mexicanos', 'b) Imperio Mexicano', 'c) Virreinato de Mexico'],
            respuestaCorrecta: 0
        },
        {
            pregunta: '¿Cómo se llaman el río que divide la frontera territorial entre México y Estados Unidos?',
            respuestas: ['a) Río Grande', 'b) Río Hondo', 'c) Río Bravo'],
            respuestaCorrecta: 2
        },
        {
            pregunta: '¿En cuántas ocasiones ha sido México el país anfitrión de la Copa Mundial de Fútbol?',
            respuestas: ['a) Una, en 1982', 'b) Dos, en 1970 y 1986', 'c) Tres, en 1962, 1970 y 1982'],
            respuestaCorrecta: 1
        },
        {
            pregunta: 'La "noche triste" es el nombre que se le da a:',
            respuestas: ['a) Al fusilamiento del archiduque Maximiliano de Habsburgo', 'b) A la captura de Antonio López de Santa Anna', 'c) La derrota de Hernán Cortes vs los Mexicas'],
            respuestaCorrecta: 2
        },
        {
            pregunta: 'Esta película mexicana fue la ganadora del premio Óscar como mejor película internacional en el año 2019:',
            respuestas: ['a) Roma', 'b) El crimen del padre Amaro', 'c) Amores perros'],
            respuestaCorrecta: 0
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
