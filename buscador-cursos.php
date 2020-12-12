<?php

require 'vendor/autoload.php';
require 'src/Buscador.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use BuscaCursosPeloDOM\Web\Buscador;

//Cliente HTTP criado e passado um objeto que diz que a URL Base é tal URL
$client = new Client(['base_uri' => 'https://www.alura.com.br' ]);
$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);

$cursos = $buscador->getCursos(url: '/cursos-online-programacao/php');

 foreach($cursos as $curso){
     echo $curso. PHP_EOL;
 }
