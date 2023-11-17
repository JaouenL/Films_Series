<?php
require_once('connexion.php');
$querry = 'SELECT * FROM list';
$requete = $db->prepare($querry);
$requete->execute();
$i = 0;
while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $ligne;

    $id[] = $ligne['id'];
    $image[] = $ligne['image'];
    $image_sans_lien[] = substr($ligne['image'], 6, -4);
    $titre[] = $ligne['titre'];
    $alias[] = $ligne['alias'];
    $nombre_saison[] = $ligne['nombre_saison'];
    $nombre_saison_vue[] = $ligne['nombre_saison_vue'];
    $nombre_film[] = $ligne['nombre_film'];
    $nombre_film_vue[] = $ligne['nombre_film_vue'];

    $arr[] = array(
        'id' => $id[$i],
        'image' => $image_sans_lien[$i],
        'titre' => $titre[$i],
        'alias' => $alias[$i],
        'nombre_saison' => $nombre_saison[$i],
        'nombre_saison_vue' => $nombre_saison_vue[$i],
        'nombre_film' => $nombre_film[$i],
        'nombre_film_vue' => $nombre_film_vue[$i]
    );

    $arr2[] = array(
        'id' => $id[$i],
        'image' => $image[$i],
        'titre' => $titre[$i],
        'alias' => $alias[$i],
        'nombre_saison' => $nombre_saison[$i],
        'nombre_saison_vue' => $nombre_saison_vue[$i],
        'nombre_film' => $nombre_film[$i],
        'nombre_film_vue' => $nombre_film_vue[$i]
    );

    $i++;
}

require_once('deconnexion.php');

$encode_donnees = json_encode($arr);
file_put_contents("../json/jsonTel.json", $encode_donnees);
$encode_donnees = json_encode($arr2);
file_put_contents("../json/jsonSearch.json", $encode_donnees);
