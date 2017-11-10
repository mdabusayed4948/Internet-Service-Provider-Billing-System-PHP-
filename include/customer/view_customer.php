          
  
          
<?php

  if(isset($_POST["btnDelete"])){

    $customer_id = $_POST["txtCustomerId"];

    $db->query("delete from bf_client where id = '$customer_id' ");

    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>x</a>
      <strong>Success !</strong> Successfully Deleted.
    </div>";
  }

?>
          


  
          


<div class="box box-default">
        <div class="box-header with-border">
        <h3 class="box-title">Client Information </h3>    

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <a href="home.php?item=11" class="btn btn-default"><i class="fa fa-plus-square" ></i> Add New</a>
        </div>
        </div>

        <div class="box-body">
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
                <th>Status</th>
                <th>Options</th>
                  
            </tr>
            </thead>

            <tbody>
              <?php
                $customer_table = $db->query("select c.id,c.name,c.gender,c.contact,c.email,c.blood_group,c.national_id,c.occupation,c.address,c.ip_address,c.connection_date,p.package_speed,c.status from bf_client as c,bf_package as p where p.id=c.package_id");

                while(list($id,$name,$gender,$contact,$mail,$blood_group,$national_id,$occupation,$address,$idaddress,$cdate,$speed,$status) = $customer_table->fetch_row()){?>

            <tr>
              <td>(<?php echo $id;?>)<?php echo $name;?></td>
              <td><?php echo $mail;?></td>
              <td><?php echo $contact;?></td>
                 <td>
        <?php
        if($status=="Active"){
        echo "<i class='fa fa-check-square-o' style='color:green'></i>";  
        }else if($status=="InActive"){
        echo "<i class='glyphicon glyphicon-remove-circle' aria-hidden='true' style='color:red'></i>";  
        }
               
        ?>
                            
                </td>
              <td>
                <div class="btn-group">
                  <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
    Action <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-default pull-right actionstyle">
    <div class="boxstyle">
      <li>
         <form action='home.php?item=15' method='post'>
        <input type='hidden' value='<?php echo $id?>' name='txtCustomerId' />&nbsp;&nbsp;
       <button type="submit" name="btnEdit" class="btn btn-primary" ><i class='glyphicon glyphicon-edit'></i> </button>  
       
    </form> 
      </li>
    </div>

    <div class="boxstyle">
      <li>
        <form method="POST" action="home.php?item=14">
        <input type="hidden" name="txtCustomerId" value="<?php echo $id;?>">&nbsp;&nbsp;
        <button class="btn btn-info"><i class='glyphicon glyphicon-user'></i> </button> 
        </form>
      </li>
    </div>

    <div class="boxstyle">
      <li>
        <form method="POST" action="home.php?item=12" onsubmit="return confirm('Are you Sure Delete This Record ?')">
          <input type="hidden" name="txtCustomerId" value="<?php echo $id;?>">&nbsp;&nbsp;
          <button class="btn btn-danger" name="btnDelete"><i class='glyphicon glyphicon-trash'></i></button>
        </form>
      </li>
    </div>
      
    </ul>
  </div>

    </td>
    </tr>
                
          <?php } ?>
              
     </tbody>
            
           

        <tfoot>
            <tr>
              <th>Customer Name</th>
             
              <th>E-mail</th>
              <th>Contact No</th>
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












































































  








































































  






















  