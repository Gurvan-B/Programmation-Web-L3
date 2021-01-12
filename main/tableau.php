<?php

require_once "../functions/db.php";
require_once "../functions/session.php";
force_connexion();


if ( isset($_GET["del"]) && $_GET["del"] != null){
	request('DELETE FROM carte WHERE nomCarte = ? ;',[$_GET["del"]]);
}

if ( isset($_POST["nomCarte"]) && $_POST['nomCarte'] != null){
	request('INSERT INTO carte VALUES( ? , ? , ? , ? );',[$_POST["nomCarte"],$_POST["classe"],$_POST["type"],$_POST["categorie"]]);
	//echo $query . "<br/>"; // AFFICHER LA REQUETE
 	// if ($success){
  	//   echo "La ligne a été ajoutée";
  	//} else {
  	//   echo "Erreur à l'ajout de la ligne: " . mysqli_error($db);
  	//}
}

$query = 'SELECT * FROM carte;';

$result = $pdo->query($query);
$resultNrows = $result->rowCount();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Tableau mySQL</title>
<link href="/css/mystyle.css?version=25" rel="stylesheet" type="text/css"/>
<link href="/css/tabstyle.css?version=130" rel="stylesheet" type="text/css"/>
<link rel="icon" href="/ressources/images/favicon.ico"/>
<?php $page_id = 2; ?>
</head>
<body>
<?php require_once "../misc/header.php"; ?>
<div class = body>
<h1 class="blue">Base de données </h1>

<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="my_form"></form>

<!-- width=80% height= <?php echo 60*($resultNrows+1) ."px"; ?> -->
<table>
  <thead>
    <tr class=topround>
		<th colspan='5'>Cartes</th>
	</tr>
	<tr>
      <th>Nom</th>
      <th>Classe</th>
      <th>Type</th>
      <th>Catégorie</th>
	  <th></th>
    </tr>
  </thead>
  <tbody>

<?php
// var_dump ($result);
if ($resultNrows > 0) :
	foreach ($result as $row) : ?>
		<tr>
			<td>
			<a href= " <?php echo "https://www.hearthstone-decks.com/carte/voir/" . $row['nomCarte']; ?> " class=tablink >  <?php echo $row['nomCarte']; ?>  </a>
			</td>

			<td>
			<?php echo $row['classe']; ?>
			</td>

			<td>
			<?php echo $row['type']; ?>
			</td>

			<td>
			<?php echo $row['categorie']; ?>
			</td>

			<td>
				<a href="<?php echo $_SERVER['PHP_SELF'] . "?del=" . $row['nomCarte']; ?>">
					<img src="/ressources/images/rouge.jpg" alt="Supprimer" height="20" width="20"/>
				</a>
			</td>
		</tr>
		<?php
	endforeach;
endif;
?>

<tr class=botround>
        <td>
            <input class=smallinput type="text" name="nomCarte" form="my_form" autocomplete="off"/>
        </td>

		<td>
            <select class=smallinput name="classe" form="my_form">
				<option value= "null" >Sélectionnez</option>
				<option value= "Chasseur de démon">Chasseur de démon</option>
				<option value= "Druide">Druide</option>
				<option value= "Chasseur">Chasseur</option>
				<option value= "Mage">Mage</option>
				<option value= "Paladin">Paladin</option>
				<option value= "Prêtre">Prêtre</option>
				<option value= "Voleur">Voleur</option>
				<option value= "Chaman">Chaman</option>
				<option value= "Démoniste">Démoniste</option>
				<option value= "Guerrier">Guerrier</option>
			</select>
		</td>

        <td>
			<select class=smallinput name="type" form="my_form">
				<option value= "null">Sélectionnez</option>
				<option value= "Serviteur">Serviteur</option>
				<option value= "Sort">Sort</option>
				<option value= "Arme">Arme</option>
				<option value= "Héro">Héro</option>
			</select>
	   </td>

        <td>
			<select class=smallinput name="categorie" form="my_form">
				<option value= "null">Sélectionnez</option>
				<option value= "Basique">Basique</option>
				<option value= "Commune">Commune</option>
				<option value= "Rare">Rare</option>
				<option value= "Épique">Épique</option>
				<option value= "Légendaire">Légendaire</option>
			</select>
		</td>

		<td>
			<input class=smallbutton type="submit" value="OK" form = "my_form"/>
		</td>
    </tr>

	</tbody>
</table>

<?php require_once "../misc/comments.php";?>
</div>
<?php require_once "../misc/footer.html";?>
</body>
</html>

<?php $pdo = null; ?>
