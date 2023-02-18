<?php

require __DIR__. '/vendor/autoload.php';

use \Orhanerday\OpenAi\OpenAi;

$open_ai_key = getenv('OPENAI_API_KEY');
$open_ai = new OpenAi($open_ai_key);


$complete = $open_ai->completion([
    'model' => 'davinci',
    'prompt' => 'Hello',
    'temperature' => 0.9,
    'max_tokens' => 150,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
]);

var_dump($complete);

?>