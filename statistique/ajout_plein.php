<?php 
require "../header.php"; 
if(!empty($_REQUEST)){
	extract($_REQUEST);
}
?>

        <section class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Ajout d'un plein</h3>
				</div>
				<div class="panel-body">
				
				<?php
				// Ajout d'un plein
				if(!empty($ajouter_plein)){
					$req=$bdd->exec('INSERT INTO essence VALUES ("", "'.$km.'", "'.$montant.'", "'.$quantite.'", "'.$prix_litre.'", "'.$date.'", "'.$carburant.'")');
					echo "Nouveau plein ajouté !!!";
					$fin = 1;
				}else{
					$fin = '';
				}
				
				if($fin !=1){
				
				?>
					<form method="post" action="ajout_plein.php">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label>Date</label>
								<input name="date" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Km parcourus</label>
								<input name="km" type="text" class="form-control" placeholder="500.00" required>
							</div>
							<div class="form-group col-md-4">
								<label>Montant (€)</label>
								<input name="montant" type="text" class="form-control" placeholder="55.99" required>
							</div>
							<div class="form-group col-md-4">
								<label>Quantité (L)</label>
								<input name="quantite" type="text" class="form-control" placeholder="42.01" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Carburant</label><br/>
								<label class="radio-inline"><input type="radio" name="carburant" value="Gazole">Gazole</label>
								<label class="radio-inline"><input type="radio" name="carburant" value="SP95" selected>SP95</label>
								<label class="radio-inline"><input type="radio" name="carburant" value="SP95-E10">SP95-E10</label>
								<label class="radio-inline"><input type="radio" name="carburant" value="SP98">SP98</label>
								<label class="radio-inline"><input type="radio" name="carburant" value="E85">E85</label>
								<label class="radio-inline"><input type="radio" name="carburant" value="GPL">GPL</label>
							</div>
							<div class="form-group col-md-6">
								<label>Prix au litre</label>
								<input name="prix_litre" type="text" class="form-control" placeholder="1.459">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<input type="submit" name="ajouter_plein" value="Envoi" class="btn btn-primary">
							</div>
						</div>
					</form>
				</div>
				<?php } ?>
			</div>

<?php include('../footer.php'); ?>