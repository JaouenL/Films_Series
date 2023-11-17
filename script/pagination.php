<?php
$option = isset($_COOKIE["filtreSelect"]) ? $_COOKIE["filtreSelect"] : false;
$selectedFilter = $option;
require_once('connexion.php');

$select = "SELECT image, titre, nombre_saison, nombre_saison_vue, nombre_film, nombre_film_vue FROM `list` ";

switch ($selectedFilter) {
    case "fini":
        $totalParam = 'WHERE nombre_saison=nombre_saison_vue AND nombre_film=nombre_film_vue';
        $query = $select . $totalParam . ' LIMIT :limite OFFSET :debut';
        break;
    case "pas fini":
        $totalParam = 'WHERE nombre_saison!=nombre_saison_vue OR nombre_film!=nombre_film_vue';
        $query = $select . $totalParam . ' LIMIT :limite OFFSET :debut';
        break;
    case "saison finie":
        $totalParam = 'WHERE nombre_saison=nombre_saison_vue';
        $query = $select . $totalParam . ' LIMIT :limite OFFSET :debut';
        break;
    case "saison pas finie":
        $totalParam = 'WHERE nombre_saison!=nombre_saison_vue';
        $query = $select . $totalParam . ' LIMIT :limite OFFSET :debut';
        break;
    case "film fini":
        $totalParam = 'WHERE nombre_film=nombre_film_vue';
        $query = $select . $totalParam . ' LIMIT :limite OFFSET :debut';
        break;
    case "film pas fini":
        $query = $select . $totalParam . ' LIMIT :limite OFFSET :debut';
        $totalParam = 'WHERE nombre_film!=nombre_film_vue';
        break;
    default:
        $query = $select . ' LIMIT :limite OFFSET :debut';
        $totalParam = "";
        break;
}

$resultat = $totalParam == "" ? $db->query('SELECT count(id) FROM `list`') : $db->query('SELECT count(id) FROM `list` ' . $totalParam . '');
$limite = 50;

$nombredElementsTotal = $resultat->fetchColumn();

if ($nombredElementsTotal <= 50) {
    $_GET['page'] = 1;
    echo '<script>window.history.replaceState("", "", "http://localhost:8081/PourGit/FilmsSeries/?page=1") </script>';
}
$nombreDePages = ceil($nombredElementsTotal / $limite);


$page = (!empty($_GET['page']) ? $_GET['page'] : 1);

$debut = ($page - 1) * $limite;

$query = $db->prepare($query);
$query->bindValue('debut', $debut, PDO::PARAM_INT);
$query->bindValue('limite', $limite, PDO::PARAM_INT);
$query->execute();

require_once('script/deconnexion.php');
