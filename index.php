<?php require "header.php"; ?>

	<?php if(isset($_GET['actualise'])) {
		shell_exec("sh taille_disk.sh");
	} ?>

        <section class="col-sm-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Bienvenue sur votre tableau de bord !</h3>
				</div>
				<div class="panel-body">
					<a href="?actualise" class="btn btn-primary">Actualiser</a>
		<?php 
		$date = date("Y-m-d");
		$query = 'SELECT * FROM stockage WHERE date=\''.$date.'\'';
		$rep = $bdd->query($query)->fetch();
		
		echo $rep['date'].' : '.$rep['utilise'].'G utilisé & '.$rep['disponible'].'G disponible';?>
				</div>
			</div>
        </section>

<?php include('footer.php'); ?>
