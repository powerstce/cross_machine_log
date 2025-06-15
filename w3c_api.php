$validatorUrl = 'https://validator.w3.org/nu/?out=json';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $validatorUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $html);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/html; charset=utf-8']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // 10 seconds to connect
curl_setopt($ch, CURLOPT_TIMEOUT, 30);      // 30 seconds for the whole operation
$response = curl_exec($ch);

// Check for any cURL errors
if (curl_errno($ch)) {
    $errorMessage = curl_error($ch);
    curl_close($ch);
    die('cURL Error: ' . $errorMessage);
}

curl_close($ch);

var_dump($response);
