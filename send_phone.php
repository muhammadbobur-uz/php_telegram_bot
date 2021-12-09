<?php

define('TOKEN', '2015393431:hgfwdgfcwahegfcagvejfgseuhr');

// https://api.telegram.org/bot2015393431:hjdbfuaefsedrfsedhgfsehbrfuhse/setwebhook?url=https://muhammadbobur.iproger.net/pythonbot/tgbot.php

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
$name = $messages->from->first_name;
$message_id = $message->message_id;
$text = $message->text;
$data = $update->callback_query->data;



$tel = "\u{1F4F1}" . " Raqam yuborish";
$back = "\u{1F1FA}\u{1F1FF}" . " Tilni o'zagrtirish " . "\u{1F1F7}\u{1F1FA}";
if ($text == "/start") {
    $replyMarkup3 =[
        'keyboard' =>[ [ [
            'text'=>'Raqam yuborish',
            'request_contact'=>true,
        ],[$back]]],
        'resize_keyboard'=>true,
        'one_time_keyboard'=>true,
    ];
    $encodedMarkup = json_encode($replyMarkup3);
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $tel,
        'reply_markup' => $encodedMarkup,
    ]);
}
?>
