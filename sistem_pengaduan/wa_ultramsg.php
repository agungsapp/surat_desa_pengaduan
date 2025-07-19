<?php
function kirimWhatsApp($no_hp, $pesan) {
    $instance_id = 'instance131871';  // Ganti sesuai Ultramsg kamu
    $token = 'y49o94mt6k9o6sc8';      // Token dari Ultramsg
    $url = "https://api.ultramsg.com/$instance_id/messages/chat";

    $params = [
        'token' => $token,
        'to' => $no_hp,
        'body' => $pesan
    ];

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($params),
        CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        return "cURL Error: $err";
    } else {
        return $response;
    }
}
