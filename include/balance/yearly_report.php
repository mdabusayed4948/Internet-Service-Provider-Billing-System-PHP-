


<div class="box box-default">
	<div class="box-header with-border">
      <h3 class="box-title">Yearly Balance Report</h3>
      
      <div class="box-tools pull-right">
      	 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
         
      </div>
    </div>
    
 <div class="box-body">
    <div class="row">
      <div class="col-md-12">
      <form action="home.php?item=51" method="post">
      	<select class="selectpicker" data-show-subtext='true' data-live-search="true" data-size="10" name="txtSearch">
      		<option>--Year--</option>
      		<?php
      		for($y=1970;$y<=date("Y");$y++){
      			if($y<10){
      				$yy="0".$y;
      			}else{
      				$yy=$y;
      			}
      			?>
			<option value="<?php echo "$yy"?>"><?php echo "$yy"?></option>
      		
      	<?php }	?>
      	</select>

      	 <button type="submit" name='btnSearch'   class="btn btn-default">
	 <i class="glyphicon glyphicon-search"></i>   </button > 	
	<button class="btn btn-default" onclick="myFunction('location.reload()')"> <i class="glyphicon glyphicon-refresh"></i> </button>
      	
      </form>
      
      
       
        
      </div><!----end col-md-6------------>
      
     
      
    </div><!-----end row------------>
	
<hr>
	 <div class="row">
      <div class="col-md-6">
      
		<?php
		 if(isset($_POST["btnSearch"])) : ?>


		 	<?php
		 	date_default_timezone_set("Asia/Dhaka");

		 	$yearly_income = $_POST["txtSearch"];

		 	$yearlyincome_table = $db->query("select s.id,s.name,i.id,i.amount,i.income_date from bf_source as s,bf_income as i where s.id=i.source_id and year(i.income_date) like '%".$yearly_income."%' ");
		 	echo "<table  class='table table-bordered table-hover'>

				<thead>
				<tr>
					<th style='font-size: 20px; text-align: center;'>Yearly Income</th>
				</tr>
					<tr style='background-color:gray; color:#FCFCFC'>
						<th>Source Name</th>
						<th>Date</th>
						<th>Amount</th>
					</tr>
				</thead>
		 	";
		 	while(list($sid,$sname,$iid,$amount,$date)=$yearlyincome_table->fetch_row()) :?>
		 	<?php
		 	$date = date("d M Y", strtotime($date));
		 	?>

		 	<tbody>
		 		<tr>
		 			<td><?php echo $sname;?></td>
		 			<td><?php echo $date;?></td>
		 			<td><?php echo $amount;?> tk</td>
		 		</tr>
		 	</tbody>

		 	
		 	<?php endwhile ?>


	

		 	</table>
		<?php endif ?>
      
      
      
        
      </div><!----end col-md-6------------>
     
		
       <div class="col-md-6">
      <?php
		 if(isset($_POST["btnSearch"])) : ?>


		 	<?php
		 	date_default_timezone_set("Asia/Dhaka");

		 	$yearly_exp = $_POST["txtSearch"];

		 	$yearlyincome_table = $db->query("select s.id,s.name,ex.id,ex.amount,ex.exp_date from bf_source as s,bf_expense as ex where s.id=ex.source_id and year(ex.exp_date) like '%".$yearly_exp."%'  ");
		 	echo "<table  class='table table-bordered table-hover'>

				<thead>
				<tr>
					<th style='font-size: 20px; text-align: center;'>Yearly Expenses</th>
				</tr>
					<tr style='background-color:gray; color:#FCFCFC'>
						<th>Source Name</th>
						<th>Date</th>
						<th>Amount</th>
					</tr>
				</thead>
		 	";
		 	while(list($sid,$sname,$iid,$amount,$date)=$yearlyincome_table->fetch_row()) :?>
		 	<?php
		 	$date = date("d M Y", strtotime($date));
		 	?>

		 	<tbody>
		 		<tr>
		 			<td><?php echo $sname;?></td>
		 			<td><?php echo $date;?></td>
		 			<td><?php echo $amount;?> tk</td>
		 		</tr>
		 	</tbody>

		 	
		 	<?php endwhile ?>

		 	</table>
		<?php endif ?>
      
      
       
        
      </div><!----end col-md-6------------>
      
     
      
    </div><!-----end row------------>

    <div class="row">
    	<div class="col-md-6">
    		<?php
		 if(isset($_POST["btnSearch"])) : ?>
    		<?php

			$yearly_income = $_POST["txtSearch"];

				$yearlyincome_table = $db->query("select s.id,s.name,i.id,sum(i.amount),i.income_date from bf_source as s,bf_income as i where s.id=i.source_id and year(i.income_date) like '%".$yearly_income."%' ");
				echo "<table class='table table-bordered'>";
				while(list($sid,$sname,$iid,$amount,$date)=$yearlyincome_table ->fetch_row()) : ?>
				<?php $date = date("d M Y", strtotime($date)); ?>
				<tbody style="background-color: gray; color: #FCFCFC">
					<tr>
						<th colspan="3" style="font-size: 20px; text-align: center">Total Yearly Income :

						    <?php 
						    if($amount==true){
						    	  echo $amount." tk";
						    }else{
						     echo "0 tk";	
						    }

						   ?>


						 </th>

					</tr>
					
				</tbody>

		<?php endwhile;?>
			</table>
	<?php endif?>

    	</div>
    	<div class="col-md-6">
    		<?php
		 if(isset($_POST["btnSearch"])) : ?>
    		<?php

			$yearly_exp = $_POST["txtSearch"];

				$yearlyexp_table = $db->query("select s.id,s.name,ex.id,sum(ex.amount),ex.exp_date from bf_source as s,bf_expense as ex where s.id=ex.source_id and year(ex.exp_date) like '%".$yearly_exp."%'   ");
				echo "<table class='table table-bordered '>";
				while(list($sid,$sname,$iid,$amount,$date)=$yearlyexp_table ->fetch_row()) : ?>
				<?php $date = date("d M Y", strtotime($date)); ?>

				<tbody style="background-color: gray; color: #FCFCFC">
					<tr>
						<th  style="font-size: 20px; text-align: center;">Total Yearly Expenses :

						    <?php
						    if($amount==true){


						     echo $amount.' tk';
						 }else{
						 	echo "0 tk";
						 }
						      ?>
						
						 </th>

					</tr>
					
				</tbody>


		<?php endwhile;?>
			</table>
	<?php endif?>

    	</div><!----end col sm 6------->
    </div><!---end row--------->
	

	<div class="row">
		<div class="col-md-12" >

			<?php
		 if(isset($_POST["btnSearch"])) : ?>
    		<?php

			$yearly_income = $_POST["txtSearch"];

				$yearlyincome_table = $db->query("select s.id,s.name,i.id,sum(i.amount),i.income_date from bf_source as s,bf_income as i where s.id=i.source_id and year(i.income_date) like '%".$yearly_income."%' ");
				echo "<table class='table'>";
				while(list($sid,$sname,$iid,$amount,$date)=$yearlyincome_table ->fetch_row()){
	

				 $GLOBALS['i']=$amount;
					
				}


					$yearly_income = $_POST["txtSearch"];

				$yearlyincome_table = $db->query("select s.id,s.name,ex.id,sum(ex.amount),ex.exp_date from bf_source as s,bf_expense as ex where s.id=ex.source_id and year(ex.exp_date) like '%".$yearly_income."%' ");
				echo "<table class='table'>";
				while(list($sid,$sname,$iid,$amount,$date)=$yearlyincome_table ->fetch_row()){
	
					 $GLOBALS['e']=$amount;
				}
				
				
					
				?>
				
				<tbody style="background-color: gray; color: #FCFCFC">
					<tr>
						<th colspan="3" style="font-size: 20px; text-align: center">

						 <?php 
							$balance=$i-$e;

							echo "Balance Report : Total Amount = ".$balance." tk";
						 ?>
							

						 </th>

					</tr>
					
				</tbody>

				<tfoot style="background-color: gray; color: #FCFCFC">
					<tr>
					  <th>
						<?php
						$ones = array(

						"",
						" one",
						" two",
						" three",
						" four",
						" five",
						);

						?>
					  </th>
					</tr>
				</tfoot>

		
			</table>
	<?php endif; ?>


	
			
		</div>
	
	</div>
    
 </div><!---end box body--------->
    
</div> <!---end box box-default----->



