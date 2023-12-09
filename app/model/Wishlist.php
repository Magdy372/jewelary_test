<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Product.php");
require_once(__ROOT__ . "controller/UserController.php");



$con = mysqli_connect("172.232.216.8", "root", "Omarsalah123o","Jewelry_project");

class WishlistItem  extends Model{

    public $WishlistID;
    public $UserID;
    public $ProductID;

    public function __construct($UserID, $ProductID = "") {
        $this->UserID = $UserID;
        $this->ProductID = $ProductID;
    }


    static function addToWishlist($userID, $productID) {
        $userID=$userID;
        $productID=$productID;
        $check = false;
        $wishlistItems = array();


        $select_query = "SELECT * FROM Wishlist WHERE UserID = $userID";
        $result = mysqli_query($GLOBALS['con'], $select_query);
        if($result){
            while ($row = mysqli_fetch_assoc($result)) {
                // Append each row to the $wishlistItems array
                $wishlistItems[] = $row;
            }
            foreach($wishlistItems as $element){
                if($element['ProductID']==$productID){
                    $check = true;
                }
            }
            if($check){
                echo '<div style="    background-color: #ffffff;
                color: #f00;
                padding: 10px;
                text-align: center;
                font-weight: bold;">Product is already exists ;)</div>';
            }else{
            

                $query = "INSERT INTO Wishlist (UserID, ProductID) VALUES ($userID, $productID)";
    
                if (mysqli_query($GLOBALS['con'], $query)) {
                    echo" Product added successfully";
                    return true;
                } else {
                    echo" Product unadded";
                    return false; // Failed to add product
                }
            }
        }
    }
    

    static function dispalyWish($userID){
       
        include_once ("productClass.php");

        $select_query = "SELECT * FROM Wishlist WHERE UserID = $userID";
        $result = mysqli_query($GLOBALS['con'], $select_query);

        $wishlistItems = array(); // Initialize an empty array to store wishlist items
        $finallarr = array(); // Initialize an empty array to store Product objects
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Append each row to the $wishlistItems array
                $wishlistItems[] = $row;
            }
            
            // Loop through $wishlistItems to create Product objects and store them in $finallarr
            foreach ($wishlistItems as $element) {
                $obj = new Product($element['ProductID']);
                $finallarr[] = $obj;
            }
            return $finallarr;
        } else {
            // Error handling
        }
    
    }




    public static function deleteFromWishlist($userID, $productID) {
        // Implement the code to delete the item with $productID from the wishlist of the user with $userID.
        // You can use SQL queries to perform the deletion.
        // Return true if the item is successfully deleted, or false if there's an error.

        $delete_query = "DELETE FROM Wishlist WHERE UserID = $userID AND ProductID = $productID";
        $result = mysqli_query($GLOBALS['con'], $delete_query);
        
        if ($result) {
            // Successfully removed from the wishlist
        } else {
            // Error handling
        }


    }
}