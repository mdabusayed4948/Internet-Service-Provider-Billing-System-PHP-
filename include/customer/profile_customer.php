



<div class="box box-default">
		<div class="box-header with-border">
		<h3 class="box-title">Client Profile </h3>	
		<button onclick="window.print();" class="btn btn-default" style="margin-left: 40px"><i class="glyphicon glyphicon-print"></i></button>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			
		</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					
			<table class="table table-bordered table-hover">
	<thead>
		
	</thead>

	<?php
		if(isset($_POST["txtCustomerId"])){

			$customer_id = $_POST["txtCustomerId"];

			$customer_table = $db->query("select c.id,c.name,c.gender,c.contact,c.email,c.blood_group,c.national_id,c.occupation,c.address,c.ip_address,c.connection_date,p.package_speed,c.status from bf_client as c,bf_package as p where p.id=c.package_id and c.id='$customer_id' ");

			list($id,$name,$gender,$contact,$mail,$blood,$national_id,$occupation,$addres,$ipaddress,$connection_date,$speed,$status) = $customer_table->fetch_row();
		}
	?>

	<tbody>
		<tr>
			<td>Customer Name :</td>
			<td><?php echo $name;?></td>
		</tr>

		<tr>
			<td>Gender :</td>
			<td><?php echo $gender;?></td>
		</tr>

		<tr>
			<td>Contact No :</td>
			<td><?php echo $contact;?></td>
		</tr>

		<tr>
			<td>E-mail :</td>
			<td><?php echo $mail;?></td>
		</tr>

		<tr>
			<td>Blood Group</td>
			<td><?php echo $blood;?></td>
		</tr>

		<tr>
			<td>National Id :</td>
			<td><?php echo $national_id;?></td>
		</tr>

		<tr>
			<td>Occupation :</td>
			<td><?php echo $occupation;?></td>
		</tr>

		<tr>
			<td>Address :</td>
			<td><?php echo $addres;?></td>
		</tr>

		<tr>
			<td>Ip Address :</td>
			<td><?php echo $ipaddress;?></td>
		</tr>

		<tr>
			<td>Connection Date :</td>
			<td><?php echo $connection_date;?></td>
		</tr>

		<tr>
			<td>Speed :</td>
			<td><?php echo $speed;?></td>
		</tr>

		<tr>
			<td>Status :</td>
			<td><?php echo $status;?></td>
		</tr>

	</tbody>

</table>

				

				</div>


			</div>

			 

		</div>
	</div>


































