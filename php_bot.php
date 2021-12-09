
<?php

define('TOKEN', '2015393431:AAH5GBbVKBUCqWHAcdsPhiUdshtSb6__aMw');

// https://api.telegram.org/botTOKEN/setwebhook?url=https://muhammadbobur.iproger.net/pythonbot/tgbot.php

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
$contact = $messages->contact->phone_number;
$location = $messages->location->longitude;

$t1 = "\u{1F1FA}\u{1F1FF}" . " ¡çáåê÷à";
$t2 = "\u{1F1F7}\u{1F1FA}" . " Ðóñêèé";
$t3 = "\u{1F1FA}\u{1F1FF}" . " O'zbekcha";
$til = json_encode(
        array(
            'keyboard' => array([$t1], [$t2], [$t3]),
            'resize_keyboard' => true,
            'one_time_keyboard' => true,
            'selective' => true,
        ));

$tel = "\u{1F4F1}" . " Raqam yuborish";
$back = "\u{1F1FA}\u{1F1FF}" . " Tilni o'zagrtirish " . "\u{1F1F7}\u{1F1FA}";

$replyMarkup3 = [
    'keyboard' => [[['text' => $tel, 'request_contact' => true,], ['text' => $back, 'request_contact' => false,]]],
    'resize_keyboard' => true,
    'one_time_keyboard' => true,
];
$encodeMarkup = json_encode($replyMarkup3);

if ($text == "/start") {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'parse_mode' => 'markdown',
        'text' => "*Àññàëîìó àëàéêóì! Êåëèíã, àââàë õèçìàò ê¢ðñàòèø òèëèíè òàíëàá îëàéëèê.
                              \n\n Assalomu alaykum ! Keling, avval xizmat ko'rsatish tilini tanlab olaylik.
                              \n\n Çäðàñòâóéòå! Äàâàéòå äëÿ íà÷àëà âûáåðàåì ÿçûê îáñëóæèâàíèèÿ.*",
        'reply_markup' => $til,
    ]);
}

if ($text == $t1) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'parse_mode' => 'markdown',
        'text' => "Òåëåôîí ðà?àìèíãèçíè *+998(--) --- -- -- *\nøàêëäà þáîðèíã, ¸êè " . "\u{1F4F2}" . " Ðà?àì þáîðèø\nòóãìàñèíè áîñèíã",
        'reply_markup' => $encodeMarkup,
        'text' => 'keyin nima qilamiz',
    ]);
}
if ($text == $t2) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'parse_mode' => 'markdown',
        'text' => "Òåëåôîí ðà?àìèíãèçíè *+998(--) --- -- -- *\nøàêëäà þáîðèíã, ¸êè " . "\u{1F4F2}" . " Ðà?àì þáîðèø\nòóãìàñèíè áîñèíã",
        'reply_markup' => $encodeMarkup,
    ]);
}

if ($text == $t3) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'parse_mode' => 'markdown',
        'text' => "Telefon raqamingizni *+998(--) --- -- -- *\nshaklda yuboring, yoki " . "\u{1F4F2}" . " Raqam yuborish\ntugmasini bosing:",
        'reply_markup' => $encodeMarkup,
    ]);
}

if ($text == $back) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'parse_mode' => 'markdown',
        'text' => "*Qaytadan tilni tanlang..*",
        'reply_markup' => $til,
    ]);
}
?>
