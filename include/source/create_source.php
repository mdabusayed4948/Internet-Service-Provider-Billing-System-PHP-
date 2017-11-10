 
<?php

	if(isset($_POST["btnSubmit"])){

		$source      = validate($_POST["txtSource"]);
		$date        = validate($_POST["txtDate"]);
	

		$errors = array();

		if($source == ""){
			array_push($errors,"Source Name field is Empty !!");
		}

		if($date == ""){
			array_push($errors,"Creation date field is Empty !!");
		}

	

		if(count($errors)== 0){
			$db->query("insert into bf_source(name,create_date) values('$source','$date')");

			echo "<div class='alert alert-success alert-dismissable'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
				<strong>Success !</strong> Successfully Created.
			</div>";

			$source = $date =  "";
		}else{
			echo "<div class='alert alert-danger alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
			<strong>Warning ! <br/></strong>".implode ("<br/>",$errors)." 
			</div>";
		}
	}

	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}
?>

<form method="POST" action="home.php?item=16">

	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Source Information Create Form</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget='collapse'><i class="fa fa-minus"></i></button>
				<a href="home.php?item=17" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-8">
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
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="txtDate" class="form-control pull-right" id="Date" value="<?php echo isset($date)?$date:""?>">
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



