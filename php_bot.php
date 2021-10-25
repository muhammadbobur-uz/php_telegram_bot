<?php
ob_start();

function bot($method, $datas=[]){
    $url = "https://api.telegram.org/bot".TOKEN."/$method";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if (curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$text = $message->text;
$button1 = json_encode([
            'resize_keyboard' =>True,
            'keyboard' =>[ [['text' =>'Button1'], ['text' =>'Buton2']], [['text' =>'inline'],], ]
        ]);

if ($text == "/start"){
    bot('sendMessage', [
        'chat_id' =>$chat_id,
        'message_id' =>$message_id,
        'parse_mode' =>'markdown',
        'text' =>"Assalomu alaykum bu mening php dagi birinchi botim",
        'reply_markup' =>$button1
        
    ]);
}

$button2 = json_encode([
	'inline_keyboard' =>[
    [ ['text' =>'inline1']]
    ]
]);

if ($text == "inline"){
    bot('sendMessage', [
        'chat_id' =>$chat_id,
        'message_id' =>$message_id,
        'parse_mode' =>'markdown',
        'text' =>"PHP da mening birinchi InlineKeyboardim",
        'reply_markup' =>$button2
        
    ]);
}
?>
