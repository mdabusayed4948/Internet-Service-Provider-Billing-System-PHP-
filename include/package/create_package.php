
<?php

	if(isset($_POST["btnSubmit"])){

		$name   = $_POST["txtPackage"];
		$speed  = $_POST["txtSpeed"];
		$amount = $_POST["txtAmount"];

		$errors = array();

		if($name== ""){
			array_push($errors,"Package Name field is Empty !!");
		}

		if($speed== ""){
			array_push($errors,"Package Speed field is Empty !!");
		}

		if($amount== ""){
			array_push($errors,"Amount field is Empty !!");
		}

		if(count($errors)==0){
			$db->query("insert into bf_package(name,package_speed,amount) values('$name','$speed','$amount')");

				echo "<div class='alert alert-success alert-dismissable'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
				<strong>Success !</strong> Successfully Created.
			</div>";
			$name = $speed = $amount = "";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
			<strong>Warning ! <br/></strong>".implode ("<br/>",$errors)." 
			</div>";

		}
	}
?>

<form method="POST" action="home.php?item=20">

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
						<input type="text" name="txtSpeed" class="form-control" placeholder="Package Speed">
						</div>
					</div>

					<div class="form-group">
						<label>Amount :</label>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class=""></i>
							</div>
						<input type="text" name="txtAmount" class="form-control" placeholder="Package Amount">
						</div>
					</div>

					

						 <div class="form-group ">
         
      <div class="col-sm-offset-5 col-sm-5">
      <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"/>
      <input type="reset"  value="Refresh" class="btn btn-success" />
      </div>
     </div>

				</div>
			</div>
		</div>


	</div>
</form>



