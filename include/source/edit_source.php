
<?php

	if(isset($_POST["txtSourceId"])){

		$source_id = $_POST["txtSourceId"];

		$source_table = $db->query("select id,name,create_date from bf_source where id='$source_id' ");
		list($id,$source,$date)=$source_table->fetch_row();
	}


	if(isset($_POST["btnUpdate"])){

		$source_id   = $_POST["txtSourceId"];
		$source      = $_POST["txtSource"];
		$date        = $_POST["txtDate"];
	

		$db->query("update bf_source set name='$source',create_date='$date' where id='$source_id'");

	}
?>

<form method="POST" action="home.php?item=18">
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Source Information Update Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget='collapse'><i class="fa fa-minus"></i></button>
				<a href="home.php?item=17" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-8">

					<div class="form-group" hidden="">
					<label>Source Id :</label>	
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-list-alt"></i>
						</div>
						<input type="text" name="txtSourceId" value="<?php echo isset($source_id)?$source_id:""?>">
					</div>
					</div>
					<div class="form-group">
						<label>Source Name :</label>
						<div class="input-group">
						  <div class="input-group-addon">
						  	<i class="fa fa-list-alt" aria-hidden="true"></i>
						  </div>
						  <input type="text" name="txtSource" class="form-control" value="<?php echo isset($source)?$source:""?>">	
						</div>
					</div>

					<div class="form-group">
					  <label>Date :</label>
					  <div class="input-group">
					  	<div class="input-group-addon">
					  		<i class="fa fa-calendar"></i>
					  	</div>

					  	<input type="text" name="txtDate" id="Date" class="form-control" value="<?php echo isset($date)?$date:""?>">
					  	
					  </div>
						
					</div>

				

					<div class="form-group">
						<div class="col-sm-offset-5 col-sm-5">
						  <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary">	
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</form>