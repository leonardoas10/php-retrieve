<?php 
require 'vendor/autoload.php';

// GUZZLE para hacer las consultas HTTP al proyecto 'php-storage'
use GuzzleHttp\Client;

// Creamos un cliente usando la BASE_URI 'php-storage'
$client = new GuzzleHttp\Client(['base_uri' => 'http://localhost/php-display/']); 

// Mandamos un request a http://localhost/php-display/export_images.php
$response = $client->request('GET', 'export_images.php');

// Respuesta JSON con el contenido
$json = $response->getBody()->getContents();

// json_decode y obtenemos el array con los objetos
$response_array = json_decode($json);

// Finalmente almacenamos las imagenes en la carpeta 'images'
foreach($response_array as $file_info) {
    $file_url = "http://localhost/php-display/images/" . rawurlencode($file_info->url);
    $file_body = file_get_contents($file_url);
    file_put_contents('/Applications/XAMPP/xamppfiles/htdocs/php-retrieve/images/' . $file_info->name, $file_body);
}







