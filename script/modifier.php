<?php
require_once('connexion.php');

$querry = 'UPDATE list SET 
                            image = :chemin_image,
                            titre = :titre_modifier,
                            alias = :alias_modifier, 
                            nombre_saison = :nombre_saison, 
                            nombre_saison_vue = :nombre_saison_vue, 
                            nombre_film = :nombre_film, 
                            nombre_film_vue = :nombre_film_vue  
                            WHERE titre = :titre';

$requete = $db->prepare($querry);
$requete->execute([
    'chemin_image' => $_POST['chemin_image'],
    'titre_modifier' => $titre_modifier = $_POST['titre_modifier'],
    'alias_modifier' => $alias_modifier = $_POST['alias'],
    'nombre_saison' => $_POST['nombre_saison'],
    'nombre_saison_vue' => $_POST['nombre_saison_vue'],
    'nombre_film' => $_POST['nombre_film'],
    'nombre_film_vue' => $_POST['nombre_film_vue'],
    'titre' => $_POST['titre'],
]);

require_once('deconnexion.php');
