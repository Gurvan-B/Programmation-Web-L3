<?php
// require_once "../functions/session.php";
// session_start();

if (isset($_GET['tab_id'])){
    require_once "../functions/db.php";
	require_once "../functions/session.php";
	session_start();
	
	$tab_id = $_GET['tab_id'];
	
	$request = request("SELECT title,color FROM tableaux WHERE tab_id=?",[$tab_id]);
	$res= $request->fetch(PDO::FETCH_OBJ);
	if($res == null) header('Location:/misc/404');
	$title = $res->title;
	$color = $res->color;
    $query = "SELECT * FROM usertab_$tab_id ORDER BY cout";
    // var_dump($query);
    $result = $pdo->query($query); // try catch pour vérifier si la page existe TODO
	$resultNrows = $result->rowCount();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title><?=$title?>-Tableau</title>
<link href="/css/mystyle.css?version=26" rel="stylesheet" type="text/css"/>
<link href="/css/tabstyle.css?version=12" rel="stylesheet" type="text/css"/>
<link rel="icon" href="/ressources/images/favicon.ico"/>
<?php $page_id = "usertab_$tab_id"; ?>
</head>
<body>
<?php
 require_once "../misc/header.php"; ?>
<div class = body>
<h1 class="blue" style="color:<?=$color?>"><?=$title?></h1>
<form action = "/functions/user_lists/updateRows?tab_id=<?=$tab_id?>" method="post" id="my_form"></form>

<!-- width=80% height= <?php echo 60*($resultNrows+1) ."px"; ?> -->
<table>
  <thead style="background-color:<?=$color?>">
    <!-- <tr class=topround>
		<th colspan='5'>Cartes</th>
	</tr> -->
	<tr>
      	<th>Nom</th>
      	<th>Classe</th>
      	<th>Type</th>
		<th>Rareté</th>
		<th>Coût</th>
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
			<a href= "<?php echo "https://www.hearthstone-decks.com/carte/voir/" . $row['nom']; ?>" class=tablink ><?= $row['nom']; ?></a>
			</td>

			<td>
			<?php echo $row['classe']; ?>
			</td>

			<td>
			<?php echo $row['type']; ?>
			</td>

			<td>
			<?php echo $row['rarete']; ?>
			</td>

			<td>
			<?= $row['cout']; ?>
			</td>

			<td>
				<a href='<?= "/functions/user_lists/updateRows"."?tab_id=$tab_id&del=" . $row['row_id']; ?>'>
					<img src="/ressources/images/croix.png" alt="Supprimer" height="15" width="15"/>
				</a>
			</td>
		</tr>
		<?php
	endforeach;
endif;
?>

	<tr class=botround>
        <td>
            <input class=smallinput type="text" name="nom" form="my_form" autocomplete="off" />
        </td>

		<td>
            <select class=smallinput name="classe" form="my_form">
				<option value= "null" >Sélectionnez</option>
				<option value= "Neutre">Neutre</option>
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
			<select class=smallinput name="rarete" form="my_form">
				<option value= "null">Sélectionnez</option>
				<option value= "Basique">Basique</option>
				<option value= "Commune">Commune</option>
				<option value= "Rare">Rare</option>
				<option value= "Épique">Épique</option>
				<option value= "Légendaire">Légendaire</option>
			</select>
		</td>

		<td>
			<input class=miniinput type="number"  min="0" max="25" name="cout" form="my_form" autocomplete="off" />
		</td>

		<td>
			<input class=smallbutton type="submit" value="OK" form = "my_form"/>
		</td>
    </tr>

	</tbody>
</table>

<?php 
require_once "../misc/comments.php";?>
</div>
<?php 
require_once "../misc/footer.html";?>
</body>
</html>


<?php } else echo 'erreur' ?>