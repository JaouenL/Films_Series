<?php    
    require_once('connexion.php');

	$querry = 'INSERT INTO list VALUES(null, :chemin_image, :titre, :alias, :nombre_saison, :nombre_saison_vue, :nombre_film, :nombre_film_vue)';
    $requete = $db->prepare($querry);
    $requete->execute([
        'chemin_image' => $_POST['chemin_image'],
        'titre' => $_POST['titre'],
        'alias' => $_POST['alias'],
        'nombre_saison' => $_POST['nombre_saison'],
        'nombre_saison_vue' => $_POST['nombre_saison_vue'],
        'nombre_film' => $_POST['nombre_film'],
        'nombre_film_vue' => $_POST['nombre_film_vue'],
    ]);

    require_once('deconnexion.php');
?>