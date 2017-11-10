

<?php
error_reporting(0);

if(isset($_POST["btnDelete"])){

	$ids = $_POST["chkIds"];

	foreach($ids as $id){

		$getquery = "select image from employee where id='$id'";
	
		$getImg = $db->query($getquery);

		while($imgdata = $getImg->fetch_assoc()){
			$delimg = $imgdata['image'];
			unlink($delimg);
		}

		$msg = $db->query("delete from employee where id='$id' ");

	}

	if($msg==TRUE){
		echo "<div class='alert alert-success alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
		<strong>Success !</strong> Successfully Deleted.
		</div>";
	}else{
		echo "<div class='alert alert-warning alert-dismissable'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a><strong>Warning !</strong> Please Select any Checkbox.
		</div>";
	}
}

?>


<div class="box box-default">
	
	<div class="box-header with-border">
		<h3 class="box-title">Employee Delete</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

			<button type="button" class="btn btn-box-tool"><i class="fa fa-remove"></i></button>
		</div>
	</div>	

	<div class="box-body">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th colspan="6">
						<form method="POST" action="home.php?item=8" onsubmit="return confirm('Are you sure Delete This Record ?')">
						<button type="sumbit" name="btnDelete" class="btn btn-danger">
						<i class="glyphicon glyphicon-trash"></i> Delete
						</button>
						<a href="home.php?item=7" style="float: right" class="btn btn-primary"><i class="glyphicon glyphicon-log-out"></i>  Return</a>	
						
					</th>
				</tr>

				<tr>
					<th>Action</th>
					<th>Employee Id</th>
					<th>Employee Name</th>
					<th>E-Mail</th>
					<th>Contact No</th>
				</tr>

			</thead>
			<tbody>
			<?php
$emp_table = $db->query("select id,name,email,mobile from bf_employee");
	while(list($id,$name,$mail,$mobile)=$emp_table->fetch_row()){ ?>
				
					<tr>
						<td><?php echo "<input type='checkbox' name='chkIds[]' value='$id'/>";?></td>
						<td><?php echo $id;?></td>
						<td><?php echo $name;?></td>
						<td><?php echo $mail;?></td>
						<td><?php echo $mobile;?></td>
					</tr>
				
	
			<?php } ?>
			</tbody>
			</form>
		</table>
	</div>

</div>