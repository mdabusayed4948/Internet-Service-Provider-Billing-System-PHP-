
<div class="box box-default">
        <div class="box-header with-border">
        <h3 class="box-title">User Profile </h3>   
        <button onclick="window.print();" class="btn btn-default" style="margin-left: 40px"><i class="glyphicon glyphicon-print"></i></button> 

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <a href="home.php?item=2" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Return</a>
        </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                  
        <table class="table table-bordered table-hover">
    
	<tbody>
    
 <?php
    date_default_timezone_set("Asia/Dhaka");
 
    if(isset($_POST["txtUserId"])){
        
        $user_id = $_POST["txtUserId"];
        
        $user_table = $db->query("select u.id,u.username,u.email,u.mobile,u.address,u.image,u.office_location,u.status,u.gender,u.join_date,r.id,r.name from bf_users as u,bf_role as r where r.id=u.role_id and u.id=$user_id");
        
        list($uid,$uname,$email,$mobile,$address,$image,$oflocation,$status,$gender,$join_date,$rid,$rname)=$user_table->fetch_row();
        
        $join_date = date("d M Y",strtotime($join_date));
    
        }
 ?>  
 
 
 
    <tr>
        <td colspan="2" style="text-align:center"><img src="<?php echo isset($image)?$image:""?>" width="100" height="100"/></td>
    </tr>
    
    <tr>
        <th>User Name :</th>
        <th><?php echo isset($uname)?$uname:""?></th>
    </tr>
    
    <tr>
        <th>User Type :</th>
        <th><?php echo isset($rname)?$rname:""?></th>
    </tr>
    <tr>
        <th>E-mail</th>
        <th><?php echo isset($email)?$email:""?></th>
    </tr>
    
    <tr>
        <th>Contact No :</th>
        <th><?php echo isset($mobile)?$mobile:""?></th>
    </tr>
    
    <tr>
        <th>Address :</th>
        <th><?php echo isset($address)?$address:"";?></th>
    </tr>
    
    <tr>
        <th>Office Location :</th>
       <th><?php echo isset($oflocation)?$oflocation:""?></th>
    </tr> 
    
    <tr>
        <th>Status :</th>
        <th>
        <?php 
        echo isset($status)?$status:""?>
        </th>
        
    </tr>
    
    <tr>
        <th>Gender :</th>
        <th><?php echo isset($gender)?$gender:""?></th>
    </tr>
    
    <tr>
        <th>Joining Date :</th>
        <th><?php echo isset($join_date)?$join_date:""?></th>
    </tr>
    
 </tbody> 
    
</table>

                

                </div>


            </div>

             

        </div>
    </div>




























































