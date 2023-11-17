<?php
require_once('connexion.php');

$querry = 'SELECT * FROM list WHERE id = :idElementModifier';
$requete = $db->prepare($querry);
$requete->execute([
    'idElementModifier' => $_POST['idElementModifier'],
]);
$resultatAfficherModifier = $requete->fetch();

$resultatAfficherModifierTitre = $resultatAfficherModifier['titre'];
$resultatAfficherModifierAlias = $resultatAfficherModifier['alias'];
$resultatAfficherModifierCheminImage = $resultatAfficherModifier['image'];
$resultatAfficherModifierNombreSaison = $resultatAfficherModifier['nombre_saison'];
$resultatAfficherModifierNombreSaisonVue = $resultatAfficherModifier['nombre_saison_vue'];
$resultatAfficherModifierNombreFilm = $resultatAfficherModifier['nombre_film'];
$resultatAfficherModifierNombreFilmVue = $resultatAfficherModifier['nombre_film_vue'];

require_once('deconnexion.php');

$arr = array(
    'resultatAfficherModifierTitre' => $resultatAfficherModifierTitre,
    'resultatAfficherModifierAlias' => $resultatAfficherModifierAlias,
    'resultatAfficherModifierCheminImage' => $resultatAfficherModifierCheminImage,
    'resultatAfficherModifierNombreSaison' => $resultatAfficherModifierNombreSaison,
    'resultatAfficherModifierNombreSaisonVue' => $resultatAfficherModifierNombreSaisonVue,
    'resultatAfficherModifierNombreFilm' => $resultatAfficherModifierNombreFilm,
    'resultatAfficherModifierNombreFilmVue' => $resultatAfficherModifierNombreFilmVue
);
echo json_encode($arr);
