
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Customer Account</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="../../img/favicon.png" />
        <!-- Place favicon.ico in the root directory -->
		<!-- modernizr css -->
        <script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<!-- header-start -->
		<?php include('../../partials/header.php'); ?>
		<!-- mainmenu-area-end -->
		<!-- page-title-wrapper-start -->
		<div class="page-title-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="page-title">
							<h3>Create New Customer Account</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- page-title-wrapper-end -->
		<!-- contuct-form-area-start -->
			<div class="login-area ptb-80">
				<div class="container">
					<div class="container">
  <div  class="col-sm-12">
        <h3>Edit Profile</h3>
        <hr/>
        <div class="col-sm-3"> <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left">
            <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
             <li><a href="change_password.php">Change Password</a></li>
            <li><a href="#deliveryaddress" data-toggle="tab">Delivery Address</a></li>
            <li><a href="#reentorders" data-toggle="tab">Recent Orders</a></li>
         <li><a href="#returnorders" data-toggle="tab">Return Orders</a></li>
          </ul>
        </div>

        <div class="col-sm-9">
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="profile">
            <div class="login-form">
								<form method="post">
									<div class="form-group login-page">
									<?php
										//session_start();
										//echo $_SESSION['FName'] ."<br>" . $_SESSION['LName'];
										//$UserObject = new User($_SESSION["UserID"]) ;
										
									?>
										<label for="">First Name <span>*</span></label>
										<input type="text" class="form-control" name = "FName" value="<?=$UserObject->FName?>" >
									</div>
									<div class="form-group login-page">
										<label for="">Last Name <span>*</span></label>
										<input type="text" class="form-control"  name = "LName" value="<?=$UserObject->LName?>" >
									</div>
									<div class="form-group login-page">
										<label for="">Email <span>*</span></label>
										<input type="email" class="form-control" name = "Email" value="<?=$UserObject->Email?>">
									</div>								
									
									<button type="submit"name="submit" class="btn btn-default login-btn">Submit</button>
								</form>						
							</div>
							<?php
																

								if(isset($_POST["submit"])){
									$Fname=$_POST["FName"];
									$Lname=$_POST["LName"];
									$Email=$_POST["Email"];
									
									$controller->Edit($Fname,$Lname,$Email,$_SESSION['UserID']);

								}
							?>
							
            
            </div>
            
             <div class="tab-pane" id="chnage_passwrd">
             <form method="POST">
									<div class="form-group login-page">
										<label for="">Old Password<span>*</span></label>
										<input type="password" name="old_Password" class="form-control" id="">
									</div>
									<div class="form-group login-page">
										<label for="">New Password<span>*</span></label>
										<input type="password" name="Password" class="form-control" id="">
									</div>
																	
									<div class="form-group login-page">
										<label for="">Confirm Password<span>*</span></label>
										<input type="password" name="con_Password" class="form-control" id="">
									</div>								
									
									<button type="submit"  name="changePasswordSubmit"  class="btn btn-default login-btn">Submit</button>
								</form>	
								<?php
									
									// include_once "UserClass.php";
	
									// if(isset($_POST["changePasswordSubmit"])){
									
									// 	$Password=$_POST["Password"];
            						// 	$oldPass=$_POST["old_Password"];
									// 	$conPass= $_POST["con_Password"];

									// 	if($conPass===$Password){
									// 		$UserObject=User::editPW($oldPass,$Password,$_SESSION['UserID']);
									// 	}else{
									// 		echo "Confirm Password isn't match Password <br>" ;
									// 	}

									// }
								?>
             </div>
            
            
            <div class="tab-pane" id="deliveryaddress">
            <div class="col-md-12 col-sm-12 col-xs-12">
            
             <h4 class="profile_addresstab">Choose Address</h4>
            
                               <div class="col-md-6 col-sm-6 col-xs-12 multiple_address">
                                <label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> E-199 kalka ji New Delhi infront of Sanatan Dharam Mandir New Delhi 110019
</label>
                               </div>
<div class="col-md-6 col-sm-6 col-xs-12 multiple_address">
                                <label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> E-199 kalka ji New Delhi infront of Sanatan Dharam Mandir New Delhi 110019
</label>
                               </div>
                               
                               
                               <div class="col-md-6 col-sm-6 col-xs-12 multiple_address">
                                <label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> E-199 kalka ji New Delhi infront of Sanatan Dharam Mandir New Delhi 110019  E-199 kalka ji New Delhi infront of Sanatan Dharam Mandir New Delhi 110019
</label>
                               </div>
                               
                               
                               <div class="col-md-6 col-sm-6 col-xs-12 multiple_address">
                                <label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> E-199 kalka ji New Delhi infront of Sanatan Dharam Mandir New Delhi 110019
</label>
                               </div>

                                </div>
                                
                                
                             
             <div class="col-md-12 col-sm-12">
             
             <h4 class="profile_addresstab">Enter New Address Here</h4>
             
             <div class="col-md-6">
										<div class="checkout-form-list">
											<label>First Name <span class="required">*</span></label>										
											<input type="text" placeholder="" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="checkout-form-list">
											<label>Last Name <span class="required">*</span></label>										
											<input type="text" placeholder="" />
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="checkout-form-list">
											<label>Address <span class="required">*</span></label>
											<input type="text" placeholder="Street address" />
										</div>
									</div>
             
             </div>                  
									
                                
            
            </div>
            
            <div class="tab-pane" id="reentorders">
            <div class="wishlist-table table-responsive">
									<table>
										<thead>
											<tr>
												<th class="product-remove"><span class="nobr">Remove</span></th>
												<th class="product-thumbnail">Image</th>
												<th class="product-name"><span class="nobr">Product Name</span></th>
                                                <th class="product-name"><span class="nobr">Order No.</span></th>
												<th class="product-price"><span class="nobr"> Unit Price </span></th>
												<!--<th class="product-stock-stauts"><span class="nobr"> Stock Status </span></th>
												<th class="product-add-to-cart"><span class="nobr">Buy It Again </span></th>-->
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="product-remove"><a href="#">x</a></td>
												<td class="product-thumbnail"><a href="#"><img src="img/wishlist/1.jpg" alt="" /></a></td>
												<td class="product-name"><a href="#">Vestibulum suscipit</a></td>
                                                <td class="product-name"><a href="#">GHJGHJGJHGHJHJHJ</a></td>
												<td class="product-price"><span class="amount">Rs35.00</span></td>
												<!--<td class="product-stock-status"><span class="wishlist-in-stock">In Stock</span></td>
												<td class="product-add-to-cart"><a href="#"> Buy It Again</a></td>-->
											</tr>
											<tr>
												<td class="product-remove"><a href="#">x</a></td>
												<td class="product-thumbnail"><a href="#"><img src="img/wishlist/2.jpg" alt="" /></a></td>
												<td class="product-name"><a href="#">Vestibulum dictum magna</a></td>
                                                 <td class="product-name"><a href="#">GHJGHJGJHGHJHJHJ</a></td>
												<td class="product-price"><span class="amount">Rs50.00</span></td>
												<!--<td class="product-stock-status"><span class="wishlist-in-stock">In Stock</span></td>
												<td class="product-add-to-cart"><a href="#"> Buy It Again</a></td>-->
											</tr>
										</tbody>
										
									</table>
								</div>
            
            </div>
            
            <div class="tab-pane" id="returnorders">
            <div class="wishlist-table table-responsive">
									<table>
										<thead>
											<tr>
												
												
												<th class="product-name"><span class="nobr">Product Name</span></th>
                                                <th class="product-name"><span class="nobr">Order No.</span></th>
												<th class="product-price"><span class="nobr"> Unit Price </span></th>
                                                <th class="product-remove"><span class="nobr">Check Process</span></th>
												<!--<th class="product-stock-stauts"><span class="nobr"> Stock Status </span></th>
												<th class="product-add-to-cart"><span class="nobr">Buy It Again </span></th>-->
											</tr>
										</thead>
										<tbody>
											<tr>
												<!--<td class="product-remove"><a href="#">x</a></td>-->
												
												<td class="product-name"><a href="#">Vestibulum suscipit</a></td>
                                                <td class="product-name"><a href="#">GHJGHJGJHGHJHJHJ</a></td>
												<td class="product-price"><span class="amount">Rs35.00</span></td>
                                               <td class="product-name"><a href="#">Check Process</a></td>
												<!--<td class="product-stock-status"><span class="wishlist-in-stock">In Stock</span></td>
												<td class="product-add-to-cart"><a href="#"> Buy It Again</a></td>-->
											</tr>
											<tr>
												<!--<td class="product-remove"><a href="#">x</a></td>-->
												
												<td class="product-name"><a href="#">Vestibulum dictum magna</a></td>
                                                 <td class="product-name"><a href="#">GHJGHJGJHGHJHJHJ</a></td>
												<td class="product-price"><span class="amount">Rs50.00</span></td>
                                                <td class="product-name"><a href="#">Check Process</a></td>
												<!--<td class="product-stock-status"><span class="wishlist-in-stock">In Stock</span></td>
												<td class="product-add-to-cart"><a href="#"> Buy It Again</a></td>-->
											</tr>
										</tbody>
										
									</table>
								</div>
            
            </div>
            
            
          </div>
        </div>

        <div class="clearfix"></div>

      </div>
</div><!-- /container -->
				</div>
			</div>
		<!-- contuct-form-area-end -->
		<!-- contact-area-start -->
		<?php include('../../partials/footer.php'); ?>
		<!-- .copyright-area-end -->
		
		
        
        
    </body>
</html>


