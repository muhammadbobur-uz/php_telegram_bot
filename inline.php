<?php

ob_start();

define('TOKEN', '2015393431:AAH5GBbVKBUCqWHAcdsPhiUdshtSb6__aMw');

function bot($method, $datas = []) {
    $url = "https://api.telegram.org/bot" . TOKEN . "/$method";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$text = $message->text;
$query = $message->callback_query;

$inline = json_encode([
    'inline_keyboard' => [
        [['text' => 'inline1', 'callback_data' => 'in'], ['text' => 'inline12', 'callback_data' => 'in2']], [['text' => 'inline13', 'callback_data' => 'in3']]
    ]
        ]);

if ($text == "/start") {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'parse_mode' => 'markdown',
        'text' => "Assalomu alaykum bu mening php dagi birinchi botim",
        'reply_markup' => $inline,
    ]);
}
?>
