    
<?php
if(isset($_POST["btnDelete"])){

  $bill_id = $_POST["txtbillincome"];

  $db->query("delete from bf_income where id=' $bill_id' ");

  echo "<div class='alert alert-success alert-dismissable'>
  <a class='close' data-dismiss='alert' aria-label='close'>x</a>
  <strong>Success !</strong> Successfully Deleted .
  </div>";
}
?>

<div class="box box-default">
        <div class="box-header with-border">
        <h3 class="box-title">Bill Collection Information </h3>    

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <a href="home.php?item=24" class="btn btn-default"><i class="fa fa-plus-square" ></i> Add New</a>
        </div>
        </div>

        <div class="box-body">

         <div class="row">
          <div class="col-md-12">
          <div style="background-color: gray; text-align: center; font-size: 25px; color: #1D3777; font-weight: bold">
            Total Income :
            <?php
            $all_income =  $db->query("select i.id,c.id,c.name,c.contact,c.email,c.address,c.ip_address,p.package_speed,sum(i.amount),sum(i.due_amount),i.income_date,i.status,s.name from bf_client as c,bf_package as p,bf_income as i, bf_source as s where p.id=c.package_id and c.id=i.customer_id and s.id=i.source_id");
            while(list($iid,$cid,$cname,$contact,$mail,$address,$ipaddress,$speed,$pamount,$damount,$date,$status,$sname)=$all_income->fetch_row()){
               echo $pamount." Tk and Due Amount: ".$damount." Tk Only";
            
             
            }
             
            ?>
          </div>
           
          </div>
        </div>
            <div class="row">
                <div class="col-md-12">
   

  
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
<section class="content">
 <div class="row">
  <div class="col-xs-12">
       

 <div class="">
  
            <!-- /.box-header -->
    <div class="box-body">
      
  <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Customer Name</th>
                <th>E-mail</th>
                <th>Contact No</th>
                <th>Speed</th>
                <th>Ip Address</th>
                <th>Paid Amount</th>
                <th>Due Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>Options</th>
                  
            </tr>
            </thead>

         <tbody>
         	<?php
         date_default_timezone_set("Asia/Dhaka");

         	  $income_table = $db->query("select i.id,c.id,c.name,c.contact,c.email,c.address,c.ip_address,p.package_speed,i.amount,i.due_amount,i.income_date,i.status,s.name from bf_client as c,bf_package as p,bf_income as i, bf_source as s where p.id=c.package_id and c.id=i.customer_id and s.id=i.source_id");
         	  while(list($iid,$cid,$cname,$contact,$mail,$address,$ipaddress,$speed,$pamount,$damount,$date,$status,$sname)=$income_table->fetch_row()){ ?>
            <?php
            $date = date("d M Y",strtotime($date));
            ?>
				<tr>
					<td>(Id=<?php echo $cid?>) <?php echo $cname?></td>
					<td><?php echo $mail;?></td>
					<td><?php echo $contact;?></td>
					<td><?php echo $speed;?></td>
					<td><?php echo $ipaddress;?></td>
					<td><?php echo $pamount;?></td>
					<td><?php echo $damount;?></td>

          <td><?php echo $status;?></td>
          <td><?php echo $date;?></td>
					<td>
					<div class="btn-group">
						<button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">Action <span class="caret">
							
						</span>
							
						</button>
						<ul class="dropdown-menu dropdown-default pull-right actionstyle">
						<div class="boxstyle">
								<li>
								<form method="POST" action="home.php?item=28">
								<input type="hidden" value="<?php echo $iid?>" name="txtbillincome"> &nbsp; &nbsp;
								<button type="submit" name="btnEdit" class="btn btn-primary"><i class='glyphicon glyphicon-edit'></i></button>	
								</form>
							</li>
						</div>
						<div class="boxstyle">
								<li>
								<form method="POST" action="home.php?item=27">
								<input type="hidden" value="<?php echo $iid?>" name="txtbillincome"> &nbsp; &nbsp;
								<button type="submit" name="btnEdit" class="btn btn-info"><i class='glyphicon glyphicon-th-list'></i></button>	
								</form>
							</li>
						</div>
						<div class="boxstyle">
								<li>
								<form method="POST" action="home.php?item=25" onsubmit="return confirm('Are you sure Delete this Record')">
								<input type="hidden" value="<?php echo $iid?>" name="txtbillincome"> &nbsp; &nbsp;
								<button  name="btnDelete" class="btn btn-danger"><i class='glyphicon glyphicon-trash'></i></button>	
								</form>
							</li>
						</div>
						</ul>
					</div>
					</td>
				</tr>
         	
         	 <?php }?>	
         </tbody>
            
           

        <tfoot>
            <tr>
                <th>Customer Name</th>
                <th>E-mail</th>
                <th>Contact No</th>
                <th>Speed</th>
                <th>Ip Address</th>
                <th>Paid Amount</th>
                <th>Due Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>Options</th>
            </tr>
        </tfoot>
        </table>


    </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
                

                </div>


            </div>

             

        </div>
    </div>












































































  








































































  






















  