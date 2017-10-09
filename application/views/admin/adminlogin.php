<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome Admin</title>
  <!--Fonts-->

  <!--Bootstrap-->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_assets/vendors/bootstrap/dist/css/bootstrap.min.css">
  <!--Font Awesome-->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin_assets/vendors/font-awesome/css/font-awesome.min.css">
  <!--Simple Line Icons-->
  <link href="<?php echo base_url() ?>admin_assets/css/admin.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="wrapper">
  <!--\\\\\\\ wrapper Start \\\\\\-->
  
  <div class="login_page">
  <div class="login_content">
      <div style="color:red">
      <?php
         print_r($error);
        ?>
          </div>
  <div class="panel-heading border login_heading">Admin</div>	
 <form role="form" class="form-horizontal" action="<?php echo base_url();?>admin/userlogin" method="post" >
      <div class="form-group">
        
        <div class="col-sm-10">
          <input type="text" placeholder="Username" id="UserName" name="UserName" class="form-control">
        </div>
      </div>
      <div class="form-group">
        
        <div class="col-sm-10">
          <input type="password" placeholder="Password" id="Password" name="Password" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <div class=" col-sm-10">
          <div class="checkbox checkbox_margin">
            <!--<label class="lable_margin">
              <input type="checkbox"><p class="pull-left"> Remember me</p></label>-->
             
              <button class="btn btn-default pull-right" type="submit">Sign in</button>
              <div>
        </div>
      </div>
      
    </form>
 </div>
  </div>
  
</div>
</body>
</html>