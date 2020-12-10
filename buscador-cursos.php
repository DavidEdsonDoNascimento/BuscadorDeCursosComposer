<?php

use GuzzleHttp\Client;

$cliente = new Client();

$response = $cliente->request(method: 'GET', uri: 'https://cursos.alura.com.br/category/programacao/php');

echo $response->getStatusCode();

$html = $response->getBody();