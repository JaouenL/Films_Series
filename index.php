<?php
require_once('script/pagination.php')
?>

<!DOCTYPE html>
<html>

<head>
	<title>Films Séries</title>
	<link rel="icon" type="image/x-icon" href="icons/mal.ico" />
	<meta charset="utf-8">
	<link rel="stylesheet" href="styles/styles.css">

	<script src="script/jquery-3.6.0.min.js"></script>
	<script type="module" src="script/COOKIE/node_modules/js-cookie/dist/js.cookie.mjs"></script>
	<script nomodule defer src="script/COOKIE/node_modules/js-cookie/dist/js.cookie.js"></script>
</head>

<body>
	<div id="add-area">
		<div class="row-1">
			<div class="box">
				<div> <span>Titre</span> </div>
				<div id="titre-input">
					<input list="titres" name="titre" id="titre" autocomplete="off" required>
					<span id="span-separation-ajout"></span>
					<button id="clear-icon-2" type="button">
						<img src="icons/clear-button.png" class="icon-clear" alt="clear button"></button>
					<datalist id="titres">
						<?php
						require('script/connexion.php');
						$resultat = $db->query('SELECT titre FROM list');
						while ($ligne = $resultat->fetch()) {
							echo "<option> " . htmlspecialchars($ligne['titre']) . " </option>";
						}
						require('script/deconnexion.php');
						?>
					</datalist>
				</div>
			</div>

			<div id="alias-boutton"><button type="button" id="plus"></button></div>


			<div class="box left-space">
				<div id="nombre_saison_description"> <span>Nombre saison</span> </div>
				<div> <input type="number" min=0 oninput="validity.valid||(value='');" id="nombre_saison" value="0"> </div>
			</div>
			<div class="box left-space">
				<div> <span>Nombre saison vue</span> </div>
				<div> <input type="number" min=0 oninput="validity.valid||(value='');" id="nombre_saison_vue" value="0"> </div>
			</div>
			<div class="box left-space">
				<div> <span>Nombre film</span> </div>
				<div> <input type="number" min=0 oninput="validity.valid||(value='');" id="nombre_film" value="0"> </div>
			</div>
			<div class="box left-space">
				<div> <span>Nombre film vue</span> </div>
				<div> <input type="number" min=0 oninput="validity.valid||(value='');" id="nombre_film_vue" value="0"> </div>
			</div>

			<div class="boutton">
				<button type="button" id="ajouter">Ajouer</button>
				<button type="button" id="supprimer">Supprimer</button>
			</div>
		</div>

		<div class="box hidden" id="alias-box">
			<div> <span>Alias</span> </div>
			<div> <input type="text" id="alias"> </div>
		</div>

		<div class="row-1">
			<div class="box">
				<div> <span>Titre</span> </div>
				<div id="titre-input-modifier-2">
					<input type="text" name="titre" autocomplete="off" required id="titre-input-list">
					<span id="span-separation"></span>
					<button id="clear-icon" type="button">
						<img src="icons/clear-button.png" class="icon-clear" alt="clear icon">
					</button>
					<div id="resultat-recherche" class="visually-hidden">
						<ul id="search-display-id" class="search-display"></ul>
					</div>
				</div>
			</div>
		</div>

		<div class="row-1">
			<div class="box">
				<div id="titre_description_modifier"> <span>Titre modifier</span> </div>
				<div id="titre-input-modifier"> <input type="text" name="titre" autocomplete="off" id="titre-input-list-modifier"> </div>
			</div>

			<div class="box left-space">
				<div id="chemin_image_description"> <span>Chemin image</span> </div>
				<div id="chemin-image-input"> <input type="text" id="chemin-image"> </div>
			</div>

			<div class="box left-space">
				<div id="nombre_saison_description_modifier"> <span>Nombre saison</span> </div>
				<div> <input type="number" min=0 oninput="validity.valid||(value='');" id="nombre_saison_modifer"> </div>
			</div>

			<div class="box left-space">
				<div> <span>Nombre saison vue</span> </div>
				<div> <input type="number" min=0 oninput="validity.valid||(value='');" id="nombre_saison_vue_modifer"> </div>
			</div>

			<div class="box left-space">
				<div> <span>Nombre film</span> </div>
				<div> <input type="number" min=0 oninput="validity.valid||(value='');" id="nombre_film_modifer"> </div>
			</div>

			<div class="box left-space">
				<div> <span>Nombre film vue</span> </div>
				<div> <input type="number" min=0 oninput="validity.valid||(value='');" id="nombre_film_vue_modifer"> </div>
			</div>

			<div class="boutton">
				<button type="button" id="modifier">Modifier</button>
			</div>
		</div>

		<div class="row-1">
			<div class="box">
				<div> <span>Alias</span> </div>
				<div> <input type="text" id='alias-modifier'> </div>
			</div>
			<div id="boutton-dump">
				<button type="button" id="dump">DUMP</button>
				<span id="last-dump">
					<?php
					if (isset($_COOKIE["last_dump_anime"])) {
						echo ($_COOKIE["last_dump_anime"]);
					} else {
						echo "+30 jours";
					}
					?>
				</span>
			</div>
			<div id="boutton-json">
				<button type="button" id="json">JSON</button>
			</div>
		</div>

		<div class="info-box hidden info-box-postion" id="box">
			<div class="box-info">
				<p>Ok!</p>
			</div>
		</div>
		<div class="info-box hidden info-box-postion-2" id="box2">
			<div class="box-info">
				<p>Ok!</p>
			</div>
		</div>

	</div>

	<nav class="pagination">
		<?php
		if ($page > 1) :
		?>
			<a href="?page=<?php echo 1; ?>">&laquo;</a>
			<a href="?page=<?php echo $page - 1; ?>">&lsaquo;</a>
		<?php
		endif;

		for ($i = 1; $i <= $nombreDePages; $i++) :
		?>
			<a <?php if ($page == $i) {
					echo 'class="page-actuelle"';
				} ?> href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php
		endfor;

		if ($page < $nombreDePages) :
		?>
			<a href="?page=<?php echo $page + 1; ?>">&rsaquo;</a>
			<a href="?page=<?php echo $nombreDePages; ?>">&raquo;</a>
		<?php
		endif;
		?>
	</nav>

	<div id="filtre-box">
		<hr style="margin-right: 0;">

		<?php
		if (!isset($_COOKIE["filtreSelect"])) {
			$_COOKIE["filtreSelect"] = "tout";
		}
		echo "
	<form method='POST' id='formFiltre' action=''>
		<select name='filtre' onchange=filtreOption(this.value)>
			<option " . (($_COOKIE["filtreSelect"] == "tout") ? "selected " : "") . " value='tout'>Tout</option>
			<option " . (($_COOKIE["filtreSelect"] == "fini") ? "selected " : "") . "value='fini'>Fini</option>
			<option " . (($_COOKIE["filtreSelect"] == "pas fini") ? "selected " : "") . "value='pas fini'>Pas Fini</option>
			<option " . (($_COOKIE["filtreSelect"] == "saison finie") ? "selected " : "") . "value='saison finie'>Saison Finie</option>
			<option " . (($_COOKIE["filtreSelect"] == "saison pas finie") ? "selected " : "") . "value='saison pas finie'>Saison Pas Finie</option>
			<option " . (($_COOKIE["filtreSelect"] == "film fini") ? "selected " : "") . "value='film fini'>Film Fini</option>
			<option " . (($_COOKIE["filtreSelect"] == "film pas fini") ? "selected " : "") . "value='film pas fini'>Film Pas Fini</option>
		</select>
	</form>";
		?>

		<hr style="margin-left: 0;">
	</div>

	<div id="contenu">
		<?php
		require_once('script/affichageMain.php')
		?>
	</div>

	<hr>

	<nav class="pagination">
		<?php
		if ($page > 1) :
		?>
			<a href="?page=<?php echo 1; ?>">&laquo;</a>
			<a href="?page=<?php echo $page - 1; ?>">&lsaquo;</a>
		<?php
		endif;

		for ($i = 1; $i <= $nombreDePages; $i++) :
		?>
			<a <?php if ($page == $i) {
					echo 'class="page-actuelle"';
				} ?> href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php
		endfor;

		if ($page < $nombreDePages) :
		?>
			<a href="?page=<?php echo $page + 1; ?>">&rsaquo;</a>
			<a href="?page=<?php echo $nombreDePages; ?>">&raquo;</a>
		<?php
		endif;
		?>
	</nav>

	<div id="to-top" class="to-top"></div>

	<script type="text/javascript" src="script/script.js"></script>
</body>

</html>