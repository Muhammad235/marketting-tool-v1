<?php

require __DIR__. '/vendor/autoload.php';

use \Orhanerday\OpenAi\OpenAi;

//require_once realpath(__DIR__. "/vendor/autoload.php");
// use Dotenv\Dotenv;
// $dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();

//$api_key = getenv('OPENAI_API_KEY');


$open_ai_key = '';
$open_ai = new OpenAi($open_ai_key);

$prompt = $_POST['product'];

$complete = $open_ai->completion([
    'model' => 'davinci',
    'prompt' => 'Write 5 marketing social media caption for'.$prompt,
    'temperature' => 0.9,
    'max_tokens' => 250,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
]);

$response = json_decode($complete, true);
$response = $response['choices'][0]['text'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?= $response ?>
    </div>
</body>
</html>