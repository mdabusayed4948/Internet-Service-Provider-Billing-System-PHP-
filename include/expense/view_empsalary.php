    
<?php
if(isset($_POST["btnDelete"])){

  $exp_id = $_POST["txtexpid"];

  $db->query("delete from bf_expense where id=' $exp_id' ");

  echo "<div class='alert alert-success alert-dismissable'>
  <a class='close' data-dismiss='alert' aria-label='close'>x</a>
  <strong>Success !</strong> Successfully Deleted .
  </div>";
}
?>

<div class="box box-default">
        <div class="box-header with-border">
        <h3 class="box-title">Employee Salary Information </h3>    

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <a href="home.php?item=36" class="btn btn-default"><i class="fa fa-plus-square" ></i> Add New</a>
        </div>
        </div>

        <div class="box-body">

         <div class="row">
          <div class="col-md-12">
          <div style="background-color: gray; text-align: center; font-size: 25px; color: #1D3777; font-weight: bold">
            Total Income :
            <?php
            $all_income =  $db->query("select ex.id,sum(ex.amount),sum(ex.due_amount),ex.exp_date,ex.status,em.id,em.name,em.email,em.mobile,d.id,d.name,so.id,so.name from bf_expense as ex,bf_employee as em,bf_designation as d,bf_source as so where d.id=em.designation_id and em.id=ex.employee_id and so.id=ex.source_id");
            while(list($exid,$amount,$damount,$date,$status,$emid,$emname,$email,$mobile,$did,$dname,$sid,$sname)=$all_income->fetch_row()){
               echo $amount." Tk and Due Amount: ".$damount." Tk Only";
            
             
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
                <th>Employee Name</th>
                <th>E-mail</th>
                <th>Contact No</th>
                <th>Desination</th>
                <th>Source</th>
                <th>Paid Amount</th>
                <th>Due Amount</th>
              
                <th>Status</th>
                <th>Options</th>
                  
            </tr>
            </thead>

         <tbody>
         	<?php
         date_default_timezone_set("Asia/Dhaka");

         	  $exp_table = $db->query("select ex.id,ex.amount,ex.due_amount,ex.exp_date,ex.status,em.id,em.name,em.email,em.mobile,d.id,d.name,so.id,so.name from bf_expense as ex,bf_employee as em,bf_designation as d,bf_source as so where d.id=em.designation_id and em.id=ex.employee_id and so.id=ex.source_id");
         	  while(list($exid,$amount,$damount,$date,$status,$emid,$emname,$email,$mobile,$did,$dname,$sid,$sname)=$exp_table->fetch_row()){ ?>
            <?php
            $date = date("d M Y",strtotime($date));
            ?>
				<tr>
					<td><?php echo "(id= ".$emid.")"?><?php echo $emname;?></td>
					<td><?php echo $email;?></td>
					<td><?php echo $mobile;?></td>
					<td><?php echo $dname;?></td>
					<td><?php echo $sname;?></td>
					<td><?php echo $amount;?></td>
					<td><?php echo $damount;?></td>
                   <td><?php echo $status;?></td>
         
					<td>
					<div class="btn-group">
						<button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">Action <span class="caret">
							
						</span>
							
						</button>
						<ul class="dropdown-menu dropdown-default pull-right actionstyle">
						<div class="boxstyle">
								<li>
								<form method="POST" action="home.php?item=38">
								<input type="hidden" value="<?php echo $exid;?>" name="txtexpid"> &nbsp; &nbsp;
								<button type="submit" name="btnEdit" class="btn btn-primary"><i class='glyphicon glyphicon-edit'></i></button>	
								</form>
							</li>
						</div>
					
						<div class="boxstyle">
								<li>
								<form method="POST" action="home.php?item=37" onsubmit="return confirm('Are you sure Delete this Record')">
								<input type="hidden" value="<?php echo $exid;?>" name="txtexpid"> &nbsp; &nbsp;
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
                <th>Employee Name</th>
                <th>E-mail</th>
                <th>Contact No</th>
                <th>Desination</th>
                <th>Source</th>
                <th>Paid Amount</th>
                <th>Due Amount</th>
               
                <th>Status</th>
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












































































  








































































  






















  