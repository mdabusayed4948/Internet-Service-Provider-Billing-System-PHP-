
<?php
error_reporting(0);

if(isset($_POST["btnDelete"])){

	$ids = $_POST["chkids"];

	foreach($ids as $id){
		$msg = $db->query("delete from bf_designation where id='$id'");
	}

	if($msg==TRUE){
		echo "<div class='alert alert-success alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
		<strong>Success !</strong> Successfully Deleted.
		</div>";
	}else{
		echo "<div class='alert alert-warning alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
		<strong>Warning !</strong> Please Select any Checkbok
		</div>";
	}
}

?>

<div class="box box-default">
	<div class="box-header with-border">
	 <h3 class="box-title">Designation Delete</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget='collapse'>
				<i class="fa fa-minus"></i>
			</button>	
		</div>
	</div>

	<div class="box-body">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th colspan="6">
						<form method="POST" action="home.php?item=43" onsubmit="return confirm('Are you sure Delete this record ?')">
							<button type="submit" name="btnDelete" class="btn btn-danger">
								<i class="glyphicon glyphicon-trash"></i> Delete
							</button>
							<a href="home.php?item=41" style="float: right" class="btn btn-primary"><i class="glyphicon glyphicon-log-out"></i>  Return</a>
						
					</th>
				</tr>

				<tr>
					<th>Action</th>
					
					<th>Designation Name</th>
					<th> Salary</th>
					
				</tr>
			</thead>

			<tbody>
			<?php
				$Customer_table = $db->query("select id,name,salary from bf_designation");
				while(list($id,$name,$salary)=$Customer_table->fetch_row()){ ?>
					
					<tr>
						<td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>";?></td>
						
						<td><?php echo $name;?></td>
						<td><?php echo $salary;?></td>
						
					</tr>
			
				<?php } ?>
			</tbody>
			</form>			
		</table>
	</div>
</div>




