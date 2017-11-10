
<?php

		if(isset($_POST["txtPackageId"])){

		$package_id = $_POST["txtPackageId"];

		$package_table = $db->query("select id,name,package_speed,amount from bf_package where id='$package_id'");

		list($package_id,$name,$speed,$amount)=$package_table->fetch_row();
	}

	if(isset($_POST["btnSubmit"])){

		$package_id = $_POST["txtPackageId"];

		$name   = $_POST["txtPackage"];
		$speed  = $_POST["txtSpeed"];
		$amount = $_POST["txtAmount"];

	

			$db->query("update bf_package set name='$name',package_speed='$speed',amount='$amount' where id='$package_id'");

				echo "<div class='alert alert-success alert-dismissable'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
				<strong>Success !</strong> Successfully Update.
			</div>";
			
	

		}
		
	
?>

<form method="POST" action="home.php?item=23">

	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Package Information Create Form</h3>

			<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget='collapse'><i class="fa fa-minus"></i></button>
			<a href="home.php?item=21" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-8">

				<div class="form-group" hidden="">
					  <label>Package Id :</label>	

					  <div class="input-group">
					  	<div class="input-group-addon">
					  		<i class="fa fa-list-alt" aria-hidden="true"></i>
					  	</div>
					  	<input type="text" name="txtPackageId" class="form-control" value="<?php echo isset($package_id)?$package_id:""?>" placeholder="Package Name">
					  </div>
					</div>


					<div class="form-group">
					  <label>Package Name :</label>	

					  <div class="input-group">
					  	<div class="input-group-addon">
					  		<i class="fa fa-list-alt" aria-hidden="true"></i>
					  	</div>
					  	<input type="text" name="txtPackage" class="form-control" value="<?php echo isset($name)?$name:""?>" placeholder="Package Name">
					  </div>
					</div>

					<div class="form-group">
						<label>Package Speed :</label>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class=""></i>
							</div>
						<input type="text" name="txtSpeed" class="form-control" placeholder="Package Speed" value="<?php echo isset($speed)?$speed:""?>">
						</div>
					</div>

					<div class="form-group">
						<label>Amount :</label>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class=""></i>
							</div>
						<input type="text" name="txtAmount" class="form-control" placeholder="Package Amount" value="<?php echo isset($amount)?$amount:""?>">
						</div>
					</div>

					

						 <div class="form-group ">
         
      <div class="col-sm-offset-5 col-sm-5">
      <input type="submit" name="btnSubmit" value="Update" class="btn btn-primary"/>
      
      </div>
     </div>

				</div>
			</div>
		</div>


	</div>
</form>



