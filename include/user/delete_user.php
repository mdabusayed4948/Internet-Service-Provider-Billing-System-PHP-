<?php
error_reporting(0);
if(isset($_POST["btnDelete"])){
	$ids = $_POST["chkids"];	
	
	foreach($ids as $id){
		
		$getquery = "select image from bf_users where id='$id'";
		
		$getImg = $db->query($getquery);
		
		while($imgdata = $getImg->fetch_assoc()){
			$delimg = $imgdata['image'];
			unlink($delimg);
			}
		
		$msg = $db->query("delete from bf_users where id='$id'");
	}	
			if($msg==TRUE){
					 echo "<div class='alert alert-success alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Success!</strong> Successfully Deteted.
  </div>";
				}else{
				echo "<div class='alert alert-warning alert-dismissable'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Warning!</strong> Please Select Checkbox.
  </div>";	
					
				}

}

?>


<div class="box box-default">
   
        <div class="box-header with-border">
          <h3 class="box-title">User Delete </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget=""><i class="fa fa-remove"></i></button>
           
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <table class="table table-bordered table-hover">
        	<thead>
            	<tr>
                	<th colspan="6">
                    	<form method="post" action="home.php?item=5" onSubmit="return confirm('Are you sure Delete This Recotd ?');">
                        <button type="submit" name="btnDelete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                        <a href="home.php?item=2" style="float:right" class="btn btn-primary"><i class="glyphicon glyphicon-log-out"></i> Return</a>
                       
                    </th>
                   
                </tr>
                <tr>
                	<th>Action</th>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>E-mail</th>
                    <th>Contact No</th>
                </tr>
            </thead>
            
            <?php
            	$user_table = $db->query("select id,username,email,mobile from bf_users");
				while(list($id,$username,$mail,$mobile)=$user_table->fetch_row()){ ?>
				
                <tbody>
                	<tr>
                    <td><?php echo "<input type='checkbox' name='chkids[]' value='$id'/>";?></td>
                    	<td><?php echo $id;?></td>
                        <td><?php echo $username;?></td>
                        <td><?php echo $mail;?></td>
                        <td><?php echo $mobile;?></td>
                    </tr>
                </tbody>	
			
			
			<?php }?>
             </form>
        </table>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
     
</div>






