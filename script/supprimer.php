<?php  
    require_once('connexion.php');

    $querry = 'SELECT id FROM list WHERE titre = :titre ';
    $requete = $db->prepare($querry);
    $requete->execute([
        'titre' => $_POST['titre'],
    ]);
    $resultatId = $requete->fetch();
    
    $querry = 'DELETE FROM list WHERE titre = :titre';
    $requete = $db->prepare($querry);
    $requete->execute([
        'titre' => $_POST['titre'],
    ]);

    $querry = 'UPDATE list SET id = id - 1 WHERE id > :resultatId';
    $requete = $db->prepare($querry);
    $requete->execute([
        'resultatId' => $resultatId['id'],
    ]);

    $querry = 'SELECT MAX(id) AS id FROM list';
    $requete = $db->prepare($querry);
    $requete->execute();
    $max_row[] = $requete->fetchColumn();
    $maxId = $max_row[0];
    $maxId+=1;
    $querry = 'ALTER TABLE list auto_increment = '.$maxId.'';
    $requete = $db->prepare($querry);
    $requete->execute();

    require_once('deconnexion.php');
?>