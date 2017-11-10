    
<?php
if(isset($_POST["btnDelete"])){

  $Obill_id = $_POST["txtOincome"];

  $db->query("delete from bf_income where id=' $Obill_id' ");

  echo "<div class='alert alert-success alert-dismissable'>
  <a class='close' data-dismiss='alert' aria-label='close'>x</a>
  <strong>Success !</strong> Successfully Deleted .
  </div>";
}
?>

<div class="box box-default">
        <div class="box-header with-border">
        <h3 class="box-title">Total Expense Information </h3>    

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            
        </div>
        </div>
       

        <div class="box-body">
        <div class="row">
          <div class="col-md-12">
          <div style="background-color: gray; text-align: center; font-size: 25px; color: #1D3777; font-weight: bold">
            Total Expense :
            <?php
            $all_income =  $db->query("select sum(amount) from bf_expense");
            while(list($amount)=$all_income->fetch_row()){
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
               
                  
            </tr>
            </thead>

         <tbody>
         	<?php
         date_default_timezone_set("Asia/Dhaka");

         	  $income_table = $db->query("select ex.id,ex.amount,ex.exp_date,s.name from bf_expense as ex, bf_source as s where s.id=ex.source_id");
         	  while(list($iid,$amount,$date,$sname)=$income_table->fetch_row()){ ?>
            <?php
            $date = date("d M Y",strtotime($date));
            ?>
				<tr>
					
					<td><?php echo $sname;?></td>
					<td><?php echo $amount;?></td>
					<td><?php echo $date;?></td>
				
          
				</tr>
         	
         	 <?php }?>	
         </tbody>
            
           

        <tfoot>
            <tr>
                <th>Source Name</th>
                <th> Amount</th>
                <th>Date</th>
               
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












































































  








































































  






















  