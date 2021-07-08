<?php
if($_SERVER["HTTP_HOST"] == "localhost"){
    define("URLBASE", "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
}

/* ==== Variaveis Globais ==== */
$urlBase = URLBASE;
$imgPath = URLBASE . "Assets/Images/";
$imgModal = "Assets/Modal/";
