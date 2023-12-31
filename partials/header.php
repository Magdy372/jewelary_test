<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Home </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../css/style.css">



	<!-- google-font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<!-- all css here -->
	<!-- bootstrap v3.3.6 css -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<!-- animate css -->.
	<link rel="stylesheet" href="../../css/animate.css">
	<!-- jquery-ui.min css -->
	<link rel="stylesheet" href="../../css/jquery-ui.min.css">
	<!-- nivo-slider css -->
	<link rel="stylesheet" href="../../css/nivo-slider.css">
	<!-- magnific-popup css -->
	<link rel="stylesheet" href="../../css/magnific-popup.css">
	<!-- meanmenu css -->
	<link rel="stylesheet" href="../../css/meanmenu.min.css">
	<!-- owl.carousel css -->
	<link rel="stylesheet" href="../../css/owl.carousel.css">
	<!--linearicons css -->
	<link rel="stylesheet" href="../../css/linearicons-icon-font.min.css">
	<!-- font-awesome css -->
	<link rel="stylesheet" href="../../css/font-awesome.min.css">
	<!-- style css -->
	<link rel="stylesheet" href="../../css/style.css">
	<!-- responsive css -->
	<link rel="stylesheet" href="../../css/responsive.css" />
	<!-- modernizr css -->
	<script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
	<script src="../../js/search.js"></script>

	<style>
		.mobile-menu {
			font-family: 'Open Sans', sans-serif;
			text-transform: uppercase;
			font-size: 18px;
			/* Other CSS styles for the mobile menu */
		}
	</style>
</head>

<body>
	<?php
	//session_start();
	
	define('__ROOT__', "../");
	require_once(__ROOT__ . "model/User.php");
	require_once(__ROOT__ . "controller/UserController.php");

	require_once(__ROOT__ . "model/shoppingcart.php");
	require_once(__ROOT__ . "controller/CartController.php");

	require_once(__ROOT__ . "model/Wishlist.php");
	require_once(__ROOT__ . "controller/WishlistController.php");

	require_once(__ROOT__ . "model/Product.php");
	require_once(__ROOT__ . "controller/ProductController.php");
	require_once(__ROOT__ . "controller/HomeController.php");
	require_once(__ROOT__ . "model/OrderModel.php");
	require_once(__ROOT__ . "controller/OrderController.php");
	// Check if a user is logged in
	if (!empty($_SESSION['UserID'])) {

		$model = new User($_SESSION["UserID"]);
		$controller = new UserController($model);




		$userID = $_SESSION['UserID'];
		$UserObject = new User($userID);
		//print_r($UserObject);
		echo "<p style='left: 10%;margin-left: 18px;  margin-top: 0px;  top: 10px; position: absolute;'
	>Welcome " . $UserObject->getFName() . "</p>";


		if (isset($_GET['wishlist_id'])) {

			$productID = $_GET['wishlist_id'];

			$Wishlistmodel = new WishlistItem($_SESSION["UserID"], $productID);
			$Wishlistcontroller = new WishlistController($Wishlistmodel);


			$Wishlistcontroller->Adding($userID, $productID);

		} else if (isset($_GET['cart_id'])) {
			$productID = $_GET['cart_id'];


			$Cartmodel = new ShoppingCart($_SESSION["UserID"], $productID);
			$Cartcontroller = new CartController($Cartmodel);

			// $cartObject1 = ShoppingCart::addToCart($userID, $productID);
	
			$Cartcontroller->addToCart($_SESSION["UserID"], $productID);
		}
	} else {
		// Guests cannot access wishlist or add anything to it
		if (isset($_GET['wishlist_id']) || isset($_GET['cart_id']) || isset($_GET['cart']) || isset($_GET['wishlist'])) {
			header("Location: customer-login.php");
			exit();
		}
	}





	if (isset($_GET['category'])) {
		$typeid = $_GET['category'];
		$Productmodel = new ProductType();
		$Homecontroller = new HomeController($Productmodel);
		$typeid = $_GET['category'];
		$products = $Homecontroller->displaybytype($typeid);
	} else {
		// If no category is specified, display all products
		$Productmodel = new ProductType();
		$Homecontroller = new HomeController($Productmodel);
		$products = $Homecontroller->displaybytype();
	}
	if (isset($_GET['order_ID'])) {



		$userID = $_SESSION['UserID'];
		$Cartmodel = new ShoppingCart($_SESSION["UserID"]);
		$Cartcontroller = new CartController($Cartmodel);
		$Cartcontroller->Clear($userID);



	}


	?>
	<header>
		<div class="header-top-area ptb-10 hidden-xs header-top-area-4">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-5">
						<div class="header-top-right header-top-left-4">


						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-7 header-top-right-4">
						<div class="header-top-left">
							<ul>
								<?php

								if (!empty($_SESSION['UserID'])): ?>
									<!-- <li><a href="register.php">Create an Account</a></li> -->
									<li><a href="customer-login.php">Compare Products</a></li>
									<li class="click_menu">
										<a href="#">My Account <i class="fa fa-angle-down"></i></a>
										<ul class="click_menu_show">
											<?php
											for ($i = 0; $i < count($UserObject->UserType_obj->ArrayOfPages); $i++) {
												echo "<li><a href=" . $UserObject->UserType_obj->ArrayOfPages[$i]->getLinkAddress() . ">" . $UserObject->UserType_obj->ArrayOfPages[$i]->getFriendlyName() . "</a></li>";
											}
											?>
										</ul>
									</li>
								<?php else: ?>
									<!--  -->
									<li><a href="customer-login.php">Sign In</a></li>
									<!-- <li><a href="customer-login.php">My Account</a></li> -->
									<li><a href="register.php">Create an Account</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="header-bottom-area home-page-2 ptb-10">
			<div class="container">
				<div class="row">

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="logo logo2">
							<a href="index.php"><img src="../../img/logo-4.jpg" alt="" /></a>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="menu-search-box scnd-fix">
						<form action="#">
                                <input type="text" id="searchTerm" placeholder="Search here..." oninput="searchProducts()">
                                <div id="searchResults"></div>
                                <div id="searchResults" class="search-results-container"></div>
                                    <button><span class="lnr lnr-magnifier"></span></button>
                                </form>

						</div>
					</div>
					<?php if (!empty($_SESSION['UserID'])): ?>
						<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">

							<div class="header-bottom-right-4-inner">
								<a href="wishlist.php"><span class="lnr lnr-heart"></span></a>
							</div>
							<div class="header-bottom-right header-bottom-right-4">
								<div class="shop-cart shop-cart-4">
									<a href="cart.php"><span class="lnr lnr-cart"></span></a>
								</div>
								<div class="shop-cart shop-cart-4">
									<a href="Orders.php">
										<span class="lnr lnr-store" style="position: absolute; left: 255px;"></span>

									</a>
								</div>


								<div class="shop-cart-hover shop-cart-hover-4 fix">
									<ul>
										<?php
										if (!empty($_SESSION['UserID'])):

											$Cartmodel = new ShoppingCart($_SESSION["UserID"]);
											$Cartcontroller = new CartController($Cartmodel);

											$cartObject = $Cartcontroller->Display($_SESSION["UserID"]);
											$sum = 0;

											if (!is_null($cartObject) && !empty($cartObject)):
												foreach ($cartObject as $element):
													// Check if $element is an array or an object
													if (is_array($element)) {
														$ProductPicture = explode(',', $element['ProductPicture']);
														$ProductID = $element['ProductID'];
														$ProductName = $element['ProductName'];
														$ProductPrice = $element['ProductPrice'];
														$Quantity = $element['Quantity'];
														$Subtotal = $element['Subtotal'];
													} else {
														// Assuming $element is an object
														$ProductPicture = explode(',', $element->ProductPicture);
														$ProductName = $element->ProductName;
														$ProductPrice = $element->ProductPrice;
														$Quantity = $element->Quantity;
														$Subtotal = $element->Subtotal;
														$ProductID = $element->ProductID;
													}
													if (!empty($ProductPicture[0])) {

														$imageSrc = "../../uploads/" . $ProductPicture[0];
													} else {
														$imageSrc = "../../uploads/default.jpg";
													}
													?>
													<li>
														<div class="cart-img">
															<a href="product-details.php?details_id=<?= $ProductID; ?>"><img
																	src="<?= $imageSrc ?>" alt="" /></a>
														</div>
														<div class="cart-content">
															<h4><a href="product-details.php?details_id=<?= $ProductID; ?>">
																	<?= $ProductName ?>
																</a></h4>

															<span class="cart-price">Quantity:
																<?= $Quantity ?>
															</span>
															<span class="cart-price">$
																<?= $ProductPrice ?>
															</span>
														</div>
														<div class="cart-del">
															<a href="cart.php?delete_id=<?= $ProductID ?>"><i
																	class="fa fa-times-circle"></i> </a>
														</div>
													</li>
													<?php
													$sum += $Subtotal;
												endforeach;
												?>
												<li class="total-price"><span>Total $
														<?= $sum ?>
													</span></li>
												<li class="checkout-bg">
													<a href="checkout.php">checkout <i class="fa fa-angle-right"></i></a>
												</li>
												<?php
											endif;
										endif;
										?>

									</ul>
								</div>

							</div>
						</div>
					<?php else: ?>
						<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
							<div class="header-bottom-right-4-inner">
								<a href="customer-login.php"><span class="lnr lnr-heart"></span></a>
							</div>
							<div class="header-bottom-right header-bottom-right-4">
								<div class="shop-cart shop-cart-4">
									<a href="customer-login.php"><span class="lnr lnr-cart"></span></a>
								</div>
								<div class="shop-cart-hover shop-cart-hover-4 fix">

								</div>

							</div>
						</div>
						<?php
					endif;
					?>
				</div>
			</div>
		</div>
	</header>
	<!-- header-end -->
	<!-- mainmenu-area-start -->
	<div class="mainmenu-area home-page-2 mainmenu-area-4" id="main_h">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="mainmenu hidden-xs">
						<nav>
							<ul>
								<li><a href="shop.php">Little H</a>
									<div class="megamenu">
										<span>
											<a href="shop.php" class="megatitle">Little H</a>
											<a href="shop.php?category=1">Necklaces</a>
											<a href="shop.php?category=2">Pendants</a>
											<a href="shop.php?category=3">Rings</a>
											<a href="shop.php?category=4">Bracelets</a>
											<a href="shop.php?category=5">Earrings</a>
											<a href="shop.php?category=11">Colored Stones</a>

										</span>
										<span>
											<a href="shop.php" class="megatitle">Shop by Metal</a>
											<a href="shop.php">18k Gold</a>
											<a href="shop.php">21k Gold</a>
											<a href="shop.php">24k Gold</a>
											<a href="shop.php">Yellow Gold</a>
											<a href="shop.php">Rose Gold</a>
										</span>

									</div>
								</li>
								<li><a href="shop.php">New in</a>
									<div class="megamenu">
										<span>
											<a href="shop.php" class="megatitle">New in</a>
											<a href="shop.php?category=1">Necklaces</a>
											<a href="shop.php?category=2">Pendants</a>
											<a href="shop.php?category=3">Rings</a>
											<a href="shop.php?category=4">Bracelets</a>
											<a href="shop.php?category=5">Earrings</a>
											<a href="shop.php?category=6">Colored Stones</a>
											<a href="shop.php?category=7">Anklets</a>


										</span>
										<span>
											<a href="shop.php" class="megatitle">Shop by Metal</a>
											<a href="shop.php">18k Gold</a>
											<a href="shop.php">21k Gold</a>
											<a href="shop.php">24k Gold</a>
											<a href="shop.php">Yellow Gold</a>
											<a href="shop.php">Rose Gold</a>
										</span>

									</div>
								</li>
								<li><a href="shop.php">Gold Jewellery</a>
									<div class="megamenu megamenu2 living-megamenu">
										<span>
											<a href="shop.php" class="megatitle">Gold Jewellery</a>
											<a href="shop.php" class="megatitle">New in</a>
											<a href="shop.php?category=1">Necklaces</a>
											<a href="shop.php?category=2">Pendants</a>
											<a href="shop.php?category=3">Rings</a>
											<a href="shop.php?category=4">Bracelets</a>
											<a href="shop.php?category=5">Earrings</a>
											<a href="shop.php?category=11">Colored Stones</a>

										</span>
										<span>
											<a href="shop.php" class="megatitle">Shop by Metal</a>
											<a href="shop.php">18k Gold</a>
											<a href="shop.php">21k Gold</a>
											<a href="shop.php">24k Gold</a>
											<a href="shop.php">Yellow Gold</a>
											<a href="shop.php">Rose Gold</a>
										</span>

									</div>
								</li>
								<li><a href="shop.php?category=6">Gold Bars</a>

								</li>
								<li><a href="shop.php?category=8">Gold Coins</a>

								</li>

								<li><a href="shop.php?category=9">Sets</a>

								</li>

								<li><a href="shop.php?category=10">Wedding Bands</a>

								</li>



						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mobile-menu-area hidden-sm hidden-md hidden-lg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mobile-menu">
						<nav id="mobile-menu">
							<ul>
								<li class="active"><a href="shop.php">LITTLE H</a>
									<ul>
										<li><a href="shop.php?category=1">Necklaces</a>
											<ul>
												<li><a href="shop.php">18k Gold</a></li>
												<li><a href="shop.php">21k Gold</a></li>
												<li><a href="shop.php">24k Gold</a></li>
												<li><a href="shop.php">Yellow Gold</a></li>
												<li><a href="shop.php">Rose Gold</a></li>
											</ul>
										</li>
										<li><a href="shop.php?category=2">Pendants</a>
											<ul>
												<li><a href="shop.php">18k Gold</a></li>
												<li><a href="shop.php">21k Gold</a></li>
												<li><a href="shop.php">24k Gold</a></li>
												<li><a href="shop.php">Yellow Gold</a></li>
												<li><a href="shop.php">Rose Gold</a></li>
											</ul>
										</li>
										<li><a href="shop.php?category=Rings">3</a>
											<ul>
												<li><a href="shop.php">18k Gold</a></li>
												<li><a href="shop.php">21k Gold</a></li>
												<li><a href="shop.php">24k Gold</a></li>
												<li><a href="shop.php">Yellow Gold</a></li>
												<li><a href="shop.php">Rose Gold</a></li>
											</ul>
										</li>
										<li><a href="shop.php?category=4">Bracelets</a>
											<ul>
												<li><a href="shop.php">18k Gold</a></li>
												<li><a href="shop.php">21k Gold</a></li>
												<li><a href="shop.php">24k Gold</a></li>
												<li><a href="shop.php">Yellow Gold</a></li>
												<li><a href="shop.php">Rose Gold</a></li>
											</ul>
										</li>
										<a href="shop.php?category=5">Earrings</a>
										<ul>
											<li><a href="shop.php">18k Gold</a></li>
											<li><a href="shop.php">21k Gold</a></li>
											<li><a href="shop.php">24k Gold</a></li>
											<li><a href="shop.php">Yellow Gold</a></li>
											<li><a href="shop.php">Rose Gold</a></li>
										</ul>
								</li>
								<li><a href="shop.php?category=11">Colored Stones</a>
									<ul>
										<li><a href="shop.php">18k Gold</a></li>
										<li><a href="shop.php">21k Gold</a></li>
										<li><a href="shop.php">24k Gold</a></li>
										<li><a href="shop.php">Yellow Gold</a></li>
										<li><a href="shop.php">Rose Gold</a></li>
									</ul>
								</li>
							</ul>
							</li>
							<li><a href="shop.php">New IN</a>
								<ul>
									<li><a href="shop.php?category=1">Necklaces</a>
										<ul>
											<li><a href="shop.php">18k Gold</a></li>
											<li><a href="shop.php">21k Gold</a></li>
											<li><a href="shop.php">24k Gold</a></li>
											<li><a href="shop.php">Yellow Gold</a></li>
											<li><a href="shop.php">Rose Gold</a></li>
										</ul>
									</li>
									<li><a href="shop.php?category=2">Pendants</a>
										<ul>
											<li><a href="shop.php">18k Gold</a></li>
											<li><a href="shop.php">21k Gold</a></li>
											<li><a href="shop.php">24k Gold</a></li>
											<li><a href="shop.php">Yellow Gold</a></li>
											<li><a href="shop.php">Rose Gold</a></li>
										</ul>
									</li>
									<li><a href="shop.php?category=Rings">3</a>
										<ul>
											<li><a href="shop.php">18k Gold</a></li>
											<li><a href="shop.php">21k Gold</a></li>
											<li><a href="shop.php">24k Gold</a></li>
											<li><a href="shop.php">Yellow Gold</a></li>
											<li><a href="shop.php">Rose Gold</a></li>
										</ul>
									</li>
									<li><a href="shop.php?category=4">Bracelets</a>
										<ul>
											<li><a href="shop.php">18k Gold</a></li>
											<li><a href="shop.php">21k Gold</a></li>
											<li><a href="shop.php">24k Gold</a></li>
											<li><a href="shop.php">Yellow Gold</a></li>
											<li><a href="shop.php">Rose Gold</a></li>
										</ul>
									</li>
									<a href="shop.php?category=5">Earrings</a>
									<ul>
										<li><a href="shop.php">18k Gold</a></li>
										<li><a href="shop.php">21k Gold</a></li>
										<li><a href="shop.php">24k Gold</a></li>
										<li><a href="shop.php">Yellow Gold</a></li>
										<li><a href="shop.php">Rose Gold</a></li>
									</ul>
							</li>
							<li><a href="shop.php?category=11">Colored Stones</a>
								<ul>
									<li><a href="shop.php">18k Gold</a></li>
									<li><a href="shop.php">21k Gold</a></li>
									<li><a href="shop.php">24k Gold</a></li>
									<li><a href="shop.php">Yellow Gold</a></li>
									<li><a href="shop.php">Rose Gold</a></li>
								</ul>
							</li>
							</ul>
							</li>
							<li><a href="shop.php">Gold Jewellery</a>
								<ul>
									<li><a href="shop.php?category=1">Necklaces</a>
										<ul>
											<li><a href="shop.php">18k Gold</a></li>
											<li><a href="shop.php">21k Gold</a></li>
											<li><a href="shop.php">24k Gold</a></li>
											<li><a href="shop.php">Yellow Gold</a></li>
											<li><a href="shop.php">Rose Gold</a></li>
										</ul>
									</li>
									<li><a href="shop.php?category=2">Pendants</a>
										<ul>
											<li><a href="shop.php">18k Gold</a></li>
											<li><a href="shop.php">21k Gold</a></li>
											<li><a href="shop.php">24k Gold</a></li>
											<li><a href="shop.php">Yellow Gold</a></li>
											<li><a href="shop.php">Rose Gold</a></li>
										</ul>
									</li>
									<li><a href="shop.php?category=Rings">3</a>
										<ul>
											<li><a href="shop.php">18k Gold</a></li>
											<li><a href="shop.php">21k Gold</a></li>
											<li><a href="shop.php">24k Gold</a></li>
											<li><a href="shop.php">Yellow Gold</a></li>
											<li><a href="shop.php">Rose Gold</a></li>
										</ul>
									</li>
									<li><a href="shop.php?category=4">Bracelets</a>
										<ul>
											<li><a href="shop.php">18k Gold</a></li>
											<li><a href="shop.php">21k Gold</a></li>
											<li><a href="shop.php">24k Gold</a></li>
											<li><a href="shop.php">Yellow Gold</a></li>
											<li><a href="shop.php">Rose Gold</a></li>
										</ul>
									</li>
									<a href="shop.php?category=5">Earrings</a>
									<ul>
										<li><a href="shop.php">18k Gold</a></li>
										<li><a href="shop.php">21k Gold</a></li>
										<li><a href="shop.php">24k Gold</a></li>
										<li><a href="shop.php">Yellow Gold</a></li>
										<li><a href="shop.php">Rose Gold</a></li>
									</ul>
							</li>
							<li><a href="shop.php?category=11">Colored Stones</a>
								<ul>
									<li><a href="shop.php">18k Gold</a></li>
									<li><a href="shop.php">21k Gold</a></li>
									<li><a href="shop.php">24k Gold</a></li>
									<li><a href="shop.php">Yellow Gold</a></li>
									<li><a href="shop.php">Rose Gold</a></li>
								</ul>
							</li>
							</ul>
							</li>
							<li><a href="shop.php?category=Gold Bars">Gold Bars</a>

							</li>
							<li><a href="shop.php?category=Gold Coins">Gold Coins</a>

							</li>
							<li><a href="shop.php?category=Sets">Sets</a>

							</li>
							<li><a href="shop.php?category=Wedding Bands">Wedding Bands</a>

							</li>

						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- mainmenu-area-end -->
	<!-- slider-area-start -->



</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
function searchProducts() {
    // Get the search term from the input
    var searchTerm = $('#searchTerm').val();

    // Make an AJAX request to the server-side script
    $.ajax({
        type: 'GET',
        url: '../../app/views/search_products.php', 
        data: { searchTerm: searchTerm },
        success: function(response) {
            // Update the results container with the server response
            $('#searchResults').html(response);
        },
        error: function() {
            console.error('Error in AJAX request');
        }
    });
}
</script>
