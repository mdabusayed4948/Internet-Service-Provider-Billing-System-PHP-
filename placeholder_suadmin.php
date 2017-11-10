
		
	
<section class="content">
	
    <?php
    if(isset($_GET["item"])){
		
		$item = $_GET["item"];
		
		if($item==1){
			 include("include/user/add_user.php");
			}else if($item==2){
			 include("include/user/view_user.php");	
			}else if($item==3){
				include("include/user/edit_user.php");	
			}else if($item==4){
				include("include/user/user_profile.php");	
			}else if($item==5){
				include("include/user/delete_user.php");	
			}else if($item==6){
				include("include/employee/create_employee.php");	
			}else if($item==7){
				include("include/employee/view_employee.php");	
			}else if($item==8){
				include("include/employee/delete_employee.php");	
			}else if($item==9){
				include("include/employee/edit_employee.php");	
			}else if($item==10){
				include("include/employee/profile_employee.php");	
			}else if($item==11){
        include("include/customer/create_customer.php");
      }else if($item==12){
        include("include/customer/view_customer.php");
      }else if($item==13){
        include("include/customer/delete_customer.php");
      }else if($item==14){
        include("include/customer/profile_customer.php");
      }else if($item==15){
        include("include/customer/edit_customer.php");
      }else if($item==16){
        include("include/source/create_source.php");
      }else if($item==17){
        include("include/source/view_source.php");
      }else if($item==18){
        include("include/source/edit_source.php");
      }else if($item==19){
        include("include/source/delete_source.php");
      }else if($item==20){
        include("include/package/create_package.php");
      }else if($item==21){
        include("include/package/package_info.php");
      }else if($item==22){
        include("include/package/delete_package.php");
      }else if($item==23){
        include("include/package/edit_package.php");
      }else if($item==24){
        include("include/income/add_bill.php");
      }else if($item==25){
        include("include/income/bill_info.php");
      }else if($item==26){
        include("include/income/delete_bill.php");
      }else if($item==27){
        include("include/income/bill_details.php");
      }else if($item==28){
        include("include/income/edit_bill.php");
      }else if($item==29){
        include("include/income/other_bill.php");
      }else if($item==30){
        include("include/income/other_billinfo.php");
      }else if($item==31){
        include("include/income/edit_other_billinfo.php");
      }else if($item==32){
        include("include/income/delete_other_billinfo.php");
      }else if($item==33){
        include("include/income/all_income.php");
      }else if($item==34){
        include("include/income/monthly_all_income.php");
      }else if($item==35){
        include("include/income/yearly_all_income.php");
      }else if($item==36){
        include("include/expense/add_empsalary.php");
      }else if($item==37){
        include("include/expense/view_empsalary.php");
      }else if($item==38){
        include("include/expense/edit_empsalary.php");
      }else if($item==39){
        include("include/expense/delete_empsalary.php");
      }else if($item==40){
        include("include/designation/create_designation.php");
      }else if($item==41){
        include("include/designation/designation_info.php");
      }else if($item==42){
        include("include/designation/edit_designation.php");
      }else if($item==43){
        include("include/designation/delete_designation.php");
      }else if($item==44){
        include("include/expense/add_otherexp.php");
      }else if($item==45){
        include("include/expense/otherexp_info.php");
      }else if($item==46){
        include("include/expense/edit_otherexp.php");
      }else if($item==47){
        include("include/expense/delete_otherexp.php");
      }else if($item==48){
        include("include/expense/all_expense.php");
      }else if($item==49){
        include("include/expense/monthly_exp.php");
      }else if($item==50){
        include("include/expense/yearly_exp.php");
      }else if($item==51){
        include("include/balance/yearly_report.php");
      }else if($item==52){
        include("include/balance/monthly_report.php");
      }
    
		
		
		}else{?>
	


  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
   
    
  

    <!-- Main content -->
    <section class="content">
    
   
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php 
            $user_table = $db->query("select count(*) from bf_users");
            while(list($count)=$user_table->fetch_row()){
              echo " <h3>".$count."</h3>";
            }
            ?>
             

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="home.php?item=2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php 
            $user_table = $db->query("select count(*) from bf_employee");
            while(list($count)=$user_table->fetch_row()){
              echo " <h3>".$count."</h3>";
            }
            ?>
             
              <p>Employee Registrations</p>
            </div>
            <div class="icon">
              <i class="ion-ios-people-outline"></i>
            </div>
            <a href="home.php?item=7" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
               <?php 
            $user_table = $db->query("select count(*) from bf_client");
            while(list($count)=$user_table->fetch_row()){
              echo " <h3>".$count."</h3>";
            }
            ?>

              <p>Client Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="home.php?item=12" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
               <?php 
            $user_table = $db->query("select count(*) from bf_designation");
            while(list($count)=$user_table->fetch_row()){
              echo " <h3>".$count."</h3>";
            }
            ?>

              <p>Total Designation</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="home.php?item=41" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        </div>
        <div class="row">

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
               <?php 
            $user_table = $db->query("select count(*) from bf_package");
            while(list($count)=$user_table->fetch_row()){
              echo " <h3>".$count."</h3>";
            }
            ?>

              <p>Total Package</p>
            </div>
            <div class="icon">
              <i class="ion ion-social-buffer"></i>
            </div>
            <a href="home.php?item=21" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">


          <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
              <?php 
            $user_table = $db->query("select count(*) from bf_source");
            while(list($count)=$user_table->fetch_row()){
              echo " <h3>".$count."</h3>";
            }
            ?>
            <p>Total Source</p>
          </div>
          <div class="icon">
            <i class="ion ion-arrow-graph-up-right"></i>
          </div>
            <a href="home.php?item=17" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>


         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
              <?php 
            $income_table = $db->query("select sum(amount) from bf_income");
            while(list($income)=$income_table->fetch_row()){
              echo " <h3>".$income." Tk </h3>";
            }
            ?>
            <p>Total Income</p>
          </div>
          <div class="icon">
            <i class="ion ion-social-usd"></i>
          </div>
            <a href="home.php?item=33" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>

      </div>
      <!-- /.row -->
      <!-- Main row -->
    
      <!-- /.row (main row) -->

    </section>
    
    <?php }?>
    
  </section>