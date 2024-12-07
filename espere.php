<?php
// Configuración de redirección
header("Refresh: 15; url=otp.php"); // Redirige a otp.php después de 15 segundos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Carga Profesional</title>
    <style>
        /* Reset de Estilos Básicos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Fuente Moderna */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        body, html {
            height: 100%;
            font-family: 'Montserrat', sans-serif;
            background-color: #FFA500; /* Naranja */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Contenedor Principal */
        .loader-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 50px 70px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 90%;
            width: 450px;
            animation: fadeIn 1s ease-in-out;
        }

        /* Logo de la Empresa */
        .logo {
            width: 120px;
            max-width: 100%;
            height: auto;
            margin-bottom: 30px;
            filter: drop-shadow(2px 4px 6px rgba(0,0,0,0.3));
        }

        /* Animación de Carga (Spinner) */
        .spinner {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #FFA500;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            animation: spin 1.5s linear infinite;
            margin: 20px auto;
        }

        /* Barra de Progreso */
        .progress-bar {
            width: 100%;
            background-color: #f3f3f3;
            border-radius: 25px;
            overflow: hidden;
            height: 20px;
            margin: 30px 0;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.2);
        }

        .progress {
            height: 100%;
            width: 0%;
            background-color: #FFA500;
            border-radius: 25px;
            transition: width 1s linear;
        }

        /* Contador Regresivo */
        .countdown {
            font-size: 1.3em;
            color: #333;
            margin-top: 15px;
        }

        /* Animaciones Clave */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .loader-container {
                padding: 40px 50px;
                width: 80%;
            }

            .logo {
                width: 100px;
                margin-bottom: 25px;
            }

            .spinner {
                width: 70px;
                height: 70px;
                border-width: 7px;
            }

            .countdown {
                font-size: 1.1em;
            }
        }

        @media (max-width: 480px) {
            .loader-container {
                padding: 30px 40px;
                width: 90%;
            }

            .logo {
                width: 80px;
                margin-bottom: 20px;
            }

            .spinner {
                width: 60px;
                height: 60px;
                border-width: 6px;
            }

            .countdown {
                font-size: 1em;
            }
        }
    </style>
    <script>
        // Configuración del temporizador para la barra de progreso y el contador
        const redirectTime = 15;
        function iniciarContador() {
            let tiempoRestante = redirectTime;
            const contadorElemento = document.getElementById('countdown');
            const progressElemento = document.querySelector('.progress');

            // Inicializa la barra de progreso
            progressElemento.style.width = '0%';

            // Función para actualizar la barra de progreso y el contador
            const intervalo = setInterval(() => {
                tiempoRestante--;
                const porcentaje = ((redirectTime - tiempoRestante) / redirectTime) * 100;
                progressElemento.style.width = `${porcentaje}%`;
                contadorElemento.textContent = `Cargando en ${tiempoRestante} segundo${tiempoRestante !== 1 ? 's' : ''}...`;

                if (tiempoRestante <= 0) {
                    clearInterval(intervalo);
                }
            }, 1000); // 1000 milisegundos = 1 segundo
        }

        // Inicia el contador una vez que el DOM esté cargado
        document.addEventListener('DOMContentLoaded', iniciarContador);
    </script>
</head>
<body>
    <!-- Div de carga centrado -->
    <div class="loader-container">
        <!-- Logo de la Empresa -->
        <img class="logo" src="./recursos/logotipo.png" alt="Logotipo">

        <!-- Animación de Carga -->
        <div class="spinner"></div>

        <!-- Barra de Progreso -->
        <div class="progress-bar">
            <div class="progress"></div>
        </div>

        <!-- Contador regresivo -->
        <div class="countdown" id="countdown">
            Cargando en 15 segundos...
        </div>
    </div>
</body>
</html>
