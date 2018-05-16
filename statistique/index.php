<?php require "../header.php"; ?>

        <section class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Suivi du plein du véhicule</h3>
				</div>
				<div class="panel-body">
					<p align="center"><a href="ajout_plein.php"><button type="button" class="btn btn-success">Ajouter un nouveau plein</button></a><br/></p>
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
									<th>Conso L/100</th>
									<th>Action</th>
								</tr>
							</thead>
				<?php
					// Récupération du contenu de la table véhicule
					$reponse = $bdd->query('SELECT * FROM essence ORDER BY date DESC');
					
					// On affiche chaque entrée une par une
					while ($donnees = $reponse->fetch()){
						$data = date_create($donnees['date']);
						$date = date_format($data, 'd/m/Y');
						if($donnees['km_parcouru'] > 480){
							$class = "";
						}else if($donnees['km_parcouru'] <= 480 && $donnees['km_parcouru'] > 450){
							$class = 'warning';
						}else if($donnees['km_parcouru'] <= 450){
							$class = 'danger';
						}
						
				?>
							<tbody>
								<tr class="<?php echo $class; ?>">
									<td><?php echo $date; ?></td>
									<td><?php echo $donnees['km_parcouru']; ?> Km</td>
									<td><?php echo $donnees['montant_reel']; ?> €</td>
									<td><?php echo $donnees['type_carburant']; ?></td>
									<td><?php echo $donnees['quantite']; ?> L</td>
									<td><?php echo $donnees['pu']; ?> €/L</td>
									<td><?php echo $donnees['conso']; ?></td>
									<td><a href="efface_plein.php?id=<?php echo $donnees['id']; ?>"><img src="../images/delete.png"></a></td>
								</tr>
				<?php } ?>
							</tbody>
						</table>
					</div>
					<div align="center">
					<?php require "chart_plein.php"; ?>
					</div>
				</div>
			</div>

<?php include('../footer.php'); ?>