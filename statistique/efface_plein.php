<?php 
require "../header.php"; 
$id = $_GET['id']; 
?>

        <section class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Effacer un plein</h3>
				</div>
				<div class="panel-body">
				<?php
				// Ajout d'un plein
				if(isset($_POST['effacer_plein'])){
					$req=$bdd->exec('DELETE FROM essence WHERE id = "'.$id.'"');
					echo "Le plein a été effacé !!!";
					$fin = 1;
				}else{
					$fin = '';
				}
				
				if($fin !=1){
				
				?>
					<form method="post" action="">
					<div class="table-responsive">          
						<table class="table">
							<thead>
								<tr>
									<th>Date</th>
									<th>KM parcourus</th>
									<th>Montant</th>
									<th>Carburant</th>
									<th>Quantité</th>
									<th>Prix du litre</th>
								</tr>
							</thead>
				<?php
					// Récupération du contenu de la table véhicule
					$donnees = $bdd->query('SELECT * FROM essence WHERE id = "'.$id.'"')->fetch();

					$data = date_create($donnees['date']);
					$date = date_format($data, 'd/m/Y');						
				?>
							<tbody>
								<tr>
									<td><?php echo $date; ?></td>
									<td><?php echo $donnees['km_parcouru']; ?> Km</td>
									<td><?php echo $donnees['montant_reel']; ?> €</td>
									<td><?php echo $donnees['type_carburant']; ?></td>
									<td><?php echo $donnees['quantite']; ?> L</td>
									<td><?php echo $donnees['pu']; ?> €/L</td>
								</tr>
							</tbody>
						</table>
					</div>
					<input type="submit" name="effacer_plein" value="Effacer" class="btn btn-primary">
				</form>
				<?php } ?>

				</div>
			</div>

<?php include('../footer.php'); ?>