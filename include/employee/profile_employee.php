


<div class="box box-default">
        <div class="box-header with-border">
        <h3 class="box-title">Employee Profile </h3>    
		<button onclick="window.print();" class="btn btn-default" style="margin-left: 40px"><i class="glyphicon glyphicon-print"></i></button>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           
        </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                  
       <table class="table table-bordered table-hover">
	

	<?php
	date_default_timezone_set("Asia/Dhaka");
	
		if(isset($_POST["txtEmpId"])){

			$emp_id = $_POST["txtEmpId"];

			$emp_table = $db->query("select e.id,e.name,e.email,e.mobile,e.p_address,e.per_address,e.image,e.gender,e.status,e.join_date,d.name,d.salary from bf_employee as e,bf_designation as d where d.id=e.designation_id and e.id='$emp_id'");
			list($emp_id,$name,$email,$mobile,$paddress,$peraddress,$image,$gender,$status,$date,$designation,$salary)=$emp_table->fetch_row();
		}

		$date = date("d M Y",strtotime($date));

	?>
	<tbody>
		<tr>
			<th colspan="2" style="text-align: center;"><img src="<?php echo isset($image)?$image:""?>"></th>
		</tr>

		<tr>
			<th>Employee Name :</th>
			<th><?php echo isset($name)?$name:""?></th>
		</tr>

		<tr>
			<th>Designation :</th>
			<th><?php echo isset($designation)?$designation:""?></th>
		</tr>

		<tr>
			<th>Monthly Salary :</th>
			<th><?php echo isset($salary)?$salary:""?></th>
		</tr>

		<tr>
			<th>E-mail Address :</th>
			<th><?php echo isset($email)?$email:""?></th>
		</tr>

		<tr>
			<th>Contact No :</th>
			<th><?php echo isset($mobile)?$mobile:""?></th>
		</tr>

		<tr>
			<th>Present Address :</th>
			<th><?php echo isset($paddress)?$paddress:""?></th>
		</tr>

		<tr>
			<th>Permanent Address :</th>
			<th><?php echo isset($peraddress)?$peraddress:""?></th>
		</tr>

		<tr>
			<th>Gender :</th>
			<th><?php echo isset($gender)?$gender:""?></th>
		</tr>

		<tr>
			<th>Status :</th>
			<th>
				<?php echo $status?>
			</th>
		</tr>

		<tr>
			<th>Joining Date :</th>
			<th><?php echo isset($date)?$date:""?></th>
		</tr>
	</tbody>



</table>
                

                </div>


            </div>

             

        </div>
    </div>











































































