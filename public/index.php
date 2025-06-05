<?php 
,
$route = strpos($_SERVER['REQUEST_URI'], 'acao') > 0 ? '/../acao.php' : '';

if (!empty($route)) {
    require_once __DIR__ . $route;
}


require_once __DIR__ . "/../view/index.php";

include './teste.php';
const NAME = "Hello World";

$teste = 'ansiasnoi teste vitor sadsfasfasf';
echo str_contains($teste, 'troca'); 
echo $name;

$arreio = [
    'nome' => 'vitor',
    'idade' => 21,
    'estado' => [
        'nome' => 'Sao Paulo',
        'sigla' => 'SP'
    ],
];
echo $arreio['estado']['nome'];
//var_dump($arreio['estado']['nome']);