<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Bill Details</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
			<i class="fa fa-minus"></i>
			</button>
			<a href="home.php?item=25" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i>  Return</a>
		</div>
	</div>	

	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered table-hover" >
				<tbody>
					
				
					<?php
					date_default_timezone_set("Asia/Dhaka");

						if(isset($_POST["txtbillincome"])){

							$bill_table = $db->query("select i.id,c.id,c.name,c.contact,c.email,c.address,c.ip_address,p.package_speed,i.amount,i.due_amount,i.income_date,i.status,s.name from bf_client as c,bf_package as p,bf_income as i,bf_source as s where p.id=c.package_id and c.id=i.customer_id and s.id=i.source_id");
							list($iid,$cid,$cname,$contact,$mail,$address,$ipaddress,$speed,$pamount,$damount,$date,$status,$sname) = $bill_table->fetch_row();
							$date = date("d M Y",strtotime($date));

						}
					?>
					<tr>
						<th>Customer Name:</th>
						<th><?php echo isset($cname)?$cname:""?></th>
					</tr>

					<tr>
						<th>Contact No :</th>
						<th><?php echo isset($contact)?$contact:""?></th>
					</tr>

					<tr>
						<th>E-Mail Address :</th>
						<th><?php echo isset($mail)?$mail:""?></th>
					</tr>

					<tr>
						<th>Present Address :</th>
						<th><?php echo isset($address)?$address:""?></th>
					</tr>

					<tr>
						<th>Paid Amount :</th>
						<th><?php echo isset($pamount)?$pamount:""?></th>
					</tr>

					<tr>
						<th>Due Amount :</th>
						<th><?php echo isset($damount)?$damount:""?></th>
					</tr>

					<tr>
						<th>Date :</th>
						<th><?php echo isset($date)?$date:""?></th>
					</tr>
					<tr>
						<th>Status</th>
						<th><?php echo isset($status)?$status:""?></th>
					</tr>

					<tr>
						<tr>
							<th>Source:</th>
							<th><?php echo isset($sname)?$sname:""?></th>
						</tr>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>