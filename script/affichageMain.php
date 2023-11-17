<?php
while ($ligne = $query->fetch()) {
  echo '<div class="conteneur"> 
		<div class="afficher-image"> <img src=' . htmlspecialchars($ligne['image']) . ' itemprop="image" onerror="this.onerror=null;this.src=' . "'Image/404_mal.webp'" . ';" alt="affiche"> ' . '</div>' .
    '<div class="afficher-titre"> <span class="centrer-info">' . htmlspecialchars($ligne['titre']) . '</span> </div>' .
    '<div class="afficher-nombre-saison"> <span class="centrer-info">' . htmlspecialchars($ligne['nombre_saison']) . '</span> </div>' .
    '<div class="afficher-nombre-saison-vue"> <span class="centrer-info">' . htmlspecialchars($ligne['nombre_saison_vue']) . '</span> </div>' .
    '<div class="espace"> <span class="centrer-info span-espace">' . '</span> </div>' .
    '<div class="afficher-nombre-film"> <span class="centrer-info">' . htmlspecialchars($ligne['nombre_film']) . '</span> </div>' .
    '<div class="afficher-nombre-film-vue"> <span class="centrer-info">' . htmlspecialchars($ligne['nombre_film_vue']) . '</span> </div>' .
    '</div>';
}
