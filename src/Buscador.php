<?php
namespace BuscaCursosPeloDOM\Web;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function getCursos(string $url) : array
    {
        $response = $this->httpClient->request('GET', $url);
        $html = $response->getBody();

        $this->crawler->addHtmlContent($html);

        $elementosDOM = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach($elementosDOM as $elemento)
        {
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }

}
