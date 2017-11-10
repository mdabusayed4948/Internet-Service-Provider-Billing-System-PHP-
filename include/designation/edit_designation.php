 
<?php

if(isset($_POST['txtDesigId'])){

	$designation_id = $_POST['txtDesigId'];

	$desig_table = $db->query("select id,name,salary from bf_designation where id ='$designation_id' ");

	list($designation_id,$name,$salary)=$desig_table->fetch_row();
}



	if(isset($_POST["btnSubmit"])){

		$designation_id = validate($_POST['txtDesigId']);

		$name   = validate($_POST["txtDesignation"]);
		$salary        = validate($_POST["txtSalary"]);
	

	
			$db->query("update bf_designation set name='',salary='' where id='$designation_id' ");

			echo "<div class='alert alert-success alert-dismissable'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
				<strong>Success !</strong> Successfully Updated.
			</div>";

		
	}

	function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}
?>

<form method="POST" action="home.php?item=40">

	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Designation Information Edit Form</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget='collapse'><i class="fa fa-minus"></i></button>
				<a href="home.php?item=41" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-8">

					<div class="form-group" hidden="">
					  <label>Designation Id :</label>	

					  <div class="input-group">
					  	<div class="input-group-addon">
					  		<i class="fa fa-list-alt" aria-hidden="true"></i>
					  	</div>
					  	<input type="text" name="txtDesigId" class="form-control" value="<?php echo isset($designation_id)?$designation_id:""?>">
					  </div>
					</div>

					<div class="form-group">
					  <label>Designation Name :</label>	

					  <div class="input-group">
					  	<div class="input-group-addon">
					  		<i class="fa fa-list-alt" aria-hidden="true"></i>
					  	</div>
					  	<input type="text" name="txtDesignation" class="form-control" value="<?php echo isset($name)?$name:""?>">
					  </div>
					</div>

					<div class="form-group">
						<label>Salary :</label>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-usd"></i>
							</div>
							<input type="text" name="txtSalary" class="form-control pull-right"  value="<?php echo isset($salary)?$salary:""?>">
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



