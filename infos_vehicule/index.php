<?php require "../header.php"; ?>
        <section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Vitesse Max</h3>
            </div>
				<div class="panel-body">
					<div class="speed">154 km/h</div>
				</div>
            </div>
        </section>
		<section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Vitesse Moyenne</h3>
            </div>
            <div class="panel-body">
				<div class="speed">70 km/h</div>
            </div>
          </div>
        </section>
		<section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">O à 100 km/h</h3>
            </div>
            <div class="panel-body">
				<div class="speed">15,4 s</div>
            </div>
          </div>
        </section>
		<section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Température du liquide de refroidissement</h3>
            </div>
            <div class="panel-body">
				<div id="chart_div3"></div>
            </div>
          </div>
        </section>
		<section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Consommation moyenne</h3>
            </div>
				
            <div class="panel-body">
				<div id="chart_div"></div>
            </div>
          </div>
        </section>
		<section class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Sonde lambda</h3>
            </div>
            <div class="panel-body">
				<div id="chart_div2"></div>
            </div>
          </div>
        </section>

<?php include('../footer.php'); ?>