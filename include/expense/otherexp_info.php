    
<?php
if(isset($_POST["btnDelete"])){

  $Oexp_id = $_POST["txtOexp"];

  $db->query("delete from bf_expense where id=' $Oexp_id' ");

  echo "<div class='alert alert-success alert-dismissable'>
  <a class='close' data-dismiss='alert' aria-label='close'>x</a>
  <strong>Success !</strong> Successfully Deleted .
  </div>";
}
?>

<div class="box box-default">
        <div class="box-header with-border">
        <h3 class="box-title">Others Expense Information </h3>    

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <a href="home.php?item=44" class="btn btn-default"><i class="fa fa-plus-square" ></i> Add New</a>
        </div>
        </div>

        <div class="box-body">

         <div class="row">
          <div class="col-md-12">
          <div style="background-color: gray; text-align: center; font-size: 25px; color: #1D3777; font-weight: bold">
            Total Others Expense :
            <?php
            $all_income =  $db->query("select ex.id,sum(ex.amount),ex.exp_date,s.name from bf_expense as ex, bf_source as s where s.id=ex.source_id and status='OthersExp'");
            while(list($iid,$amount,$date,$sname)=$all_income->fetch_row()){
              echo $amount." Tk Only";
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
              
                <th>Source Name</th>
                <th> Amount</th>
                <th>Date</th>
                <th>Options</th>
                  
            </tr>
            </thead>

         <tbody>
         	<?php
         date_default_timezone_set("Asia/Dhaka");

         	  $income_table = $db->query("select ex.id,ex.amount,ex.exp_date,s.name from bf_expense as ex, bf_source as s where s.id=ex.source_id and status='OthersExp'");
         	  while(list($exid,$amount,$date,$sname)=$income_table->fetch_row()){ ?>
            <?php
            $date = date("d M Y",strtotime($date));
            ?>
				<tr>
					
					<td><?php echo $sname;?></td>
					<td><?php echo $amount;?></td>
					<td><?php echo $date;?></td>
				
          
					<td>
					<div class="btn-group">
						<button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">Action <span class="caret">
							
						</span>
							
						</button>
						<ul class="dropdown-menu dropdown-default pull-right actionstyle">
						<div class="boxstyle">
								<li>
								<form method="POST" action="home.php?item=46">
								<input type="hidden" value="<?php echo $exid?>" name="txtOexp"> &nbsp; &nbsp;
								<button type="submit" name="btnEdit" class="btn btn-primary"><i class='glyphicon glyphicon-edit'></i></button>	
								</form>
							</li>
						</div>
						<div class="boxstyle">
								<li>
								<form method="POST" action="home.php?item=45" onsubmit="return confirm('Are you sure Delete this Record ?')">
								<input type="hidden" value="<?php echo $exid?>" name="txtOexp"> &nbsp; &nbsp;
								<button type="submit" name="btnDelete" class="btn btn-danger"><i class='glyphicon glyphicon-trash'></i></button>	
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
                <th>Source Name</th>
                <th> Amount</th>
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












































































  








































































  






















  