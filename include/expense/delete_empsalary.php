

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
		<h3 class="box-title">Employee Salary Delete</h3>

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
						<form method="POST" action="home.php?item=39" onsubmit="return confirm('Are you sure Delete This Record ?')">
						<button type="sumbit" name="btnDelete" class="btn btn-danger">
						<i class="glyphicon glyphicon-trash"></i> Delete
						</button>
						<a href="home.php?item=37" style="float: right" class="btn btn-primary"><i class="glyphicon glyphicon-log-out"></i>  Return</a>	
						
					</th>
				</tr>

				<tr>
					<th>Action</th>
					<th>Employee Name</th>
					<th>Contact No</th>
					<th>E-Mail</th>
					<th>Designation</th>
					<th>Source</th>
					<th>Paid Amount</th>
					<th>Due Amount</th>
					<th>Status</th>
				</tr>

			</thead>
			<tbody>
			<?php
$emp_table = $db->query("select ex.id,ex.amount,ex.due_amount,ex.exp_date,ex.status,em.id,em.name,em.email,em.mobile,d.id,d.name,so.id,so.name from bf_expense as ex,bf_employee as em,bf_designation as d,bf_source as so where d.id=em.designation_id and em.id=ex.employee_id and so.id=ex.source_id");
	while(list($exid,$amount,$damount,$date,$status,$emid,$emname,$email,$mobile,$did,$dname,$sid,$sname)=$emp_table->fetch_row()){ ?>
				
					<tr>
						<td><?php echo "<input type='checkbox' name='chkIds[]' value='$exid'/>";?></td>
						
						<td>(<?php echo $emid;?>)<?php echo $emname;?></td>
						<td><?php echo $mobile;?></td>
						<td><?php echo $email;?></td>
						<td><?php echo $dname;?></td>
						<td><?php echo $sname;?></td>
						<td><?php echo $amount;?></td>
						<td><?php echo $damount;?></td>
						<td><?php echo $status;?></td>
					</tr>
				
	
			<?php } ?>
			</tbody>
			</form>
		</table>
	</div>

</div>