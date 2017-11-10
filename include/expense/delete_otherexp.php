

<?php
error_reporting(0);

if(isset($_POST["btnDelete"])){

	$ids = $_POST["chkIds"];

	foreach($ids as $id){

		
		
		$msg = $db->query("delete from bf_expense where id='$id' ");

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
		<h3 class="box-title"></h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

			<button type="button" class="btn btn-box-tool"><i class="fa fa-remove"></i></button>
		</div>
	</div>	

	<div class="box-body">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th colspan="9">
						<form method="POST" action="home.php?item=47" onsubmit="return confirm('Are you sure Delete This Record ?')">
						<button type="sumbit" name="btnDelete" class="btn btn-danger">
						<i class="glyphicon glyphicon-trash"></i> Delete
						</button>
						<a href="home.php?item=45" style="float: right" class="btn btn-primary"><i class="glyphicon glyphicon-log-out"></i>  Return</a>	
						
					</th>
				</tr>

				<tr>
					<th>Action</th>
					
					<th>Source Name</th>
					<th>Amount</th>
					<th>Date</th>
					
				</tr>

			</thead>
			<tbody>
			<?php
        $emp_table = $db->query("select ex.id,ex.amount,ex.exp_date,s.name from bf_expense as ex, bf_source as s where s.id=ex.source_id and status='OthersExp'");
	while(list($exid,$amount,$date,$sname)=$emp_table->fetch_row()){ ?>
				
					<tr>
						<td><?php echo "<input type='checkbox' name='chkIds[]' value='$exid'/>";?></td>
						
						<td><?php echo $sname;?></td>
						<td><?php echo $amount;?></td>
						<td><?php echo $date;?></td>
					
						
					</tr>
				
	
			<?php } ?>
			</tbody>
			</form>
		</table>
	</div>

</div>