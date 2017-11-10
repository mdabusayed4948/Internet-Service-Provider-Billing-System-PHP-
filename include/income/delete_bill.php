

<?php
error_reporting(0);

if(isset($_POST["btnDelete"])){

	$ids = $_POST["chkIds"];

	foreach($ids as $id){

		
		
		$msg = $db->query("delete from bf_income where id='$id' ");

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
		<h3 class="box-title">Bill Delete</h3>

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
						<form method="POST" action="home.php?item=26" onsubmit="return confirm('Are you sure Delete This Record ?')">
						<button type="sumbit" name="btnDelete" class="btn btn-danger">
						<i class="glyphicon glyphicon-trash"></i> Delete
						</button>
						<a href="home.php?item=25" style="float: right" class="btn btn-primary"><i class="glyphicon glyphicon-log-out"></i>  Return</a>	
						
					</th>
				</tr>

				<tr>
					<th>Action</th>
					
					<th>Client Name</th>
					<th>Contact No</th>
					<th>E-Mail</th>
					<th>Package Speed</th>
					<th>Ip Address</th>
					<th>Paid Amount</th>
				</tr>

			</thead>
			<tbody>
			<?php
$emp_table = $db->query("select i.id,c.id,c.name,c.contact,c.email,c.address,c.ip_address,p.package_speed,i.amount,i.due_amount,i.income_date,i.status,s.name from bf_client as c,bf_package as p,bf_income as i, bf_source as s where p.id=c.package_id and c.id=i.customer_id and s.id=i.source_id");
	while(list($iid,$cid,$cname,$contact,$mail,$address,$ipaddress,$speed,$pamount,$damount,$date,$status,$sname)=$emp_table->fetch_row()){ ?>
				
					<tr>
						<td><?php echo "<input type='checkbox' name='chkIds[]' value='$iid'/>";?></td>
						
						<td>(<?php echo $cid;?>)<?php echo $cname;?></td>
						<td><?php echo $contact;?></td>
						<td><?php echo $mail;?></td>
						<td><?php echo $speed;?></td>
						<td><?php echo $ipaddress;?></td>
						<td><?php echo $pamount;?></td>
					</tr>
				
	
			<?php } ?>
			</tbody>
			</form>
		</table>
	</div>

</div>