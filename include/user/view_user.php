    
          

  <?php
  if(isset($_POST["btnDelete"])){
    
    $user_id = $_POST["txtUserId"];
    
    $getquery = "select image from bf_users where id='$user_id'";
    
    $getImg = $db->query($getquery);
    
    while($imgdata = $getImg->fetch_assoc()){
     $delimg = $imgdata['image']; 
     unlink($delimg);
     }
     
     $db->query("delete from bf_users where id='$user_id'");
     
      echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Deleted.
  </div>";
  }
  
  ?>

  
          


<div class="box box-default">
        <div class="box-header with-border">
        <h3 class="box-title">Employee Information </h3>    

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <a href="home.php?item=6" class="btn btn-default"><i class="fa fa-plus-square" ></i> Add New</a>
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
                <th>User Name</th>
                <th>User Type</th>
                <th>E-mail</th>
                <th>Contact No</th>
                <th>Status</th>
                <th>Options</th>
                  
            </tr>
            </thead>
    <tbody> 
            <?php
            $user_table=$db->query("select u.id,u.username,u.email,u.mobile,u.address,u.image,u.office_location,u.status,u.gender,r.id,r.name from bf_users as u,bf_role as r where r.id=u.role_id ");
        
        while(list($uid,$uname,$email,$mobile,$address,$image,$oflocation,$status,$gender,$rid,$rname)=$user_table->fetch_row()){?>
      
            <tr>
                <td><?php echo "(Id=".$uid.")";?> | <?php echo $uname;?></td>
                <td><?php echo $rname;?></td>
                <td><?php echo $email;?></td>
                <td><?php echo $mobile;?></td>
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
    <ul class="dropdown-menu dropdown-default pull-right actionstyle" >
             
               
    <div class="boxstyle">
   <li> 
   <form action='home.php?item=3' method='post'>
        <input type='hidden' value='<?php echo $uid?>' name='txtUserId' />&nbsp;&nbsp;
       
     
         <button type="submit" name="btnEdit" class="btn btn-primary" ><i class='glyphicon glyphicon-edit'></i> </button>  
       
    </form> 
  
                         
   </li>
    </div>
    
    <div class="boxstyle">
      <li>
          <form action="home.php?item=4" method="post">
              <input type="hidden" value="<?php echo $uid;?>" name="txtUserId"/>&nbsp;&nbsp;
                <span>
                <button type="submit" name="btnProfile" class="btn btn-success" ><i class='glyphicon glyphicon-user'></i> </button>  
                </span>
            </form>
        </li>
    </div>
    
    <div class="boxstyle">
      <li>
          <form action="" method="post" onSubmit="return confirm('Are you sure Delete this record?');">
              <input type="hidden" value="<?php echo $uid;?>" name="txtUserId"/>&nbsp;&nbsp;
                <span>
                  <button type="submit" name="btnDelete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                </span>
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
              <th>User Name</th>
              <th>User Type</th>
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












































































  








































































  















