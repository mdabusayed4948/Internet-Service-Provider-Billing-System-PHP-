  

<?php
  if(isset($_POST["btnDelete"])){

        $package_id = $_POST["txtPackageId"];

        $db->query("delete from bf_package where id='$package_id' ");

        echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Deleted.
  </div>";
  }

?>



<div class="box box-default">
        <div class="box-header with-border">
        <h3 class="box-title">Package Information </h3>    

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <a href="home.php?item=20" class="btn btn-default"><i class="fa fa-plus-square" ></i> Add New</a>
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
                <th>Package Id</th>
                <th>Package Name</th>
                <th>Package Speed</th>
                <th>Amount</th>
                <th>Option</th>
                
                  
            </tr>
            </thead>
            <tbody>
              <?php
                $package_table = $db->query("select id,name,package_speed,amount from bf_package");

                while(list($id,$name,$speed,$amount)=$package_table->fetch_row()){ ?>
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $name;?></td>
                      <td><?php echo $speed;?></td>
                      <td><?php echo $amount;?></td>
                      <td>
                        <div class="btn-group">
                           <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
                         Action <span class="caret"></span></button>
                      <ul class="dropdown-menu dropdown-default pull-right actionstyle">
                        <div class="boxstyle">
                          <li>
                            <form method="POST" action="home.php?item=23">
                             <input type="hidden" name="txtPackageId" value="<?php echo $id;?>"> &nbsp; &nbsp;<button class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></button>
                            </form>
                          </li>
                        </div>

                          <div class="boxstyle">
                          <li>
                            <form method="POST" action="home.php?item=21" onsubmit="return confirm('Are you sure delete this Record !!')">
                             <input type="hidden" name="txtPackageId" value="<?php echo $id;?>"> &nbsp; &nbsp;<button class="btn btn-danger" name="btnDelete"><i class="glyphicon glyphicon-trash"></i></button>
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
                <th>Package Id</th>
                <th>Package Name</th>
                <th>Package Speed</th>
                <th>Amount</th>
                <th>Option</th>
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












































































  