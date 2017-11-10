
<?php
error_reporting(0);

if(isset($_POST["btnDelete"])){

	$ids = $_POST["chkids"];

	foreach($ids as $id){
		$msg = $db->query("delete from bf_package where id='$id'");
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
	 <h3 class="box-title">Package Delete</h3>
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
						<form method="POST" action="home.php?item=22" onsubmit="return confirm('Are you sure Delete this record ?')">
							<button type="submit" name="btnDelete" class="btn btn-danger">
								<i class="glyphicon glyphicon-trash"></i> Delete
							</button>
							<a href="home.php?item=21" style="float: right" class="btn btn-primary"><i class="glyphicon glyphicon-log-out"></i>  Return</a>
						
					</th>
				</tr>

				<tr>
					<th>Action</th>
					<th>Package Id</th>
					<th>Package Name</th>
					<th>Package Speed</th>
					<th>Amount</th>
				</tr>
			</thead>

			<tbody>
			<?php
				$Customer_table = $db->query("select id,name,package_speed,amount from bf_package");
				while(list($id,$name,$speed,$amount)=$Customer_table->fetch_row()){ ?>
					
					<tr>
						<td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>";?></td>
						<td><?php echo $id;?></td>
						<td><?php echo $name;?></td>
						<td><?php echo $speed;?></td>
						<td><?php echo $amount;?></td>
					</tr>
			
				<?php } ?>
			</tbody>
			</form>			
		</table>
	</div>
</div>




