
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title"> Yearly Income Report</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				
			</div>
		</div>

		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
			<form action="home.php?item=35" method="post">

			 <select class="selectpicker" data-show-subtext="true" data-live-search="true" data-size='10' name="txtSearch">
                
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
	<?php
	  }     
	?>
	</select>
	 <button type="submit" name='btnSearch'   class="btn btn-default">
	 <i class="glyphicon glyphicon-search"></i>   </button > 	
	<button class="btn btn-default" onclick="myFunction('location.reload()')"> <i class="glyphicon glyphicon-refresh"></i> </button>
			
			</form>	



		<?php
		 if(isset($_POST["btnSearch"])) : ?>


		 	<?php
		 	date_default_timezone_set("Asia/Dhaka");

		 	$yearly_income = $_POST["txtSearch"];

		 	$yearlyincome_table = $db->query("select s.id,s.name,i.id,i.amount,i.income_date from bf_source as s,bf_income as i where s.id=i.source_id and year(i.income_date) like '%".$yearly_income."%' ");
		 	echo "<table  class='table table-bordered table-hover'>

				<thead>
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



	

		<?php

			$yearly_income = $_POST["txtSearch"];

				$yearlyincome_table = $db->query("select s.id,s.name,i.id,sum(i.amount),i.income_date from bf_source as s,bf_income as i where s.id=i.source_id and year(i.income_date) like '%".$yearly_income."%' ");
				while(list($sid,$sname,$iid,$amount,$date)=$yearlyincome_table ->fetch_row()) : ?>
				<?php $date = date("d M Y", strtotime($date)); ?>
				<tfoot style="background-color: gray; color: #FCFCFC">
					<tr>
						<th colspan="2" style="font-size: 20px">Total Yearly Income :

						    <?php
$ones = array(
 "",
 " one",
 " two",
 " three",
 " four",
 " five",
 " six",
 " seven",
 " eight",
 " nine",
 " ten",
 " eleven",
 " twelve",
 " thirteen",
 " fourteen",
 " fifteen",
 " sixteen",
 " seventeen",
 " eighteen",
 " nineteen"
);
 
$tens = array(
 "",
 "",
 " twenty",
 " thirty",
 " forty",
 " fifty",
 " sixty",
 " seventy",
 " eighty",
 " ninety"
);
 
$triplets = array(
 "",
 " thousand",
 " million",
 " billion",
 " trillion",
 " quadrillion",
 " quintillion",
 " sextillion",
 " septillion",
 " octillion",
 " nonillion"
);
 
 // recursive fn, converts three digits per pass
function convertTri($num, $tri) {
  global $ones, $tens, $triplets;
 
  // chunk the number, ...rxyy
  $r = (int) ($num / 1000);
  $x = ($num / 100) % 10;
  $y = $num % 100;
 
  // init the output string
  $str = "";
 
  // do hundreds
  if ($x > 0)
   $str = $ones[$x] . " hundred";
 
  // do ones and tens
  if ($y < 20)
   $str .= $ones[$y];
  else
   $str .= $tens[(int) ($y / 10)] . $ones[$y % 10];
 
  // add triplet modifier only if there
  // is some output to be modified...
  if ($str != "")
   $str .= $triplets[$tri];
 
  // continue recursing?
  if ($r > 0)
   return convertTri($r, $tri+1).$str;
  else
   return $str;
 }
 
// returns the number as an anglicized string
function convertNum($num) {
 $num = (int) $num;    // make sure it's an integer
 
 if ($num < 0)
  return "negative".convertTri(-$num, 0);
 
 if ($num == 0)
  return "zero";
 
 return convertTri($num, 0);
}
 
 // Returns an integer in -10^9 .. 10^9
 // with log distribution
 function makeLogRand() {
  $sign = mt_rand(0,1)*2 - 1;
  $val = randThousand() * 1000000
   + randThousand() * 1000
   + randThousand();
  $scale = mt_rand(-9,0);
 
  return $sign * (int) ($val * pow(10.0, $scale));
 }
 

echo "<span style='color:#004185;'>".convertNum($amount)." Taka Only </span>";

?>


						</th>
						<th><?php
						if($amount==true){
							echo $amount;
						}else{
							echo 0;
						}
						
						?> 

						 Tk</th>

					</tr>
					
				</tfoot>

		<?php endwhile;?>

	</table>
		<?php endif ?>



       		
			
			</div>






		</div>

	</div>

