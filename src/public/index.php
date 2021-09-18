<?php 
require 'Contact.php';
require 'FakeData.php';
require 'Server.php';

header('Content-Type: application/json; charset=utf-8');

$srv = new Server();
$dts = new FakeData();
$cto = new Contact();

$url = $_SERVER["REQUEST_URI"];
$id = ltrim($url, '/');

if($id){
    $cto->id          = $id; 
    //$cto->nome      = "Kleber 4 Mod"; 
    //$cto->telefone  = "Mod444444";
    //$cto->email     = "Modkleber.4@icloud.com";
}

$dts->Start("FakeData.json");

$srv->Start($dts,$cto);

echo $dts->return;
?>