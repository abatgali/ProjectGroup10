<?php
/*** Author: Alex Weber*
 * Date: 11/10/2021*
 * File: listmenu.php*
 * Description: THIS FILE CONNECTS OUR WEBPAGE TO THE entrees_louies DATABASE*/
?>

<?php
$title = "Our Menu";
$menu_title = "Menu Items";

require_once('includes/header.php');
require_once('includes/database.php');

//Session variable
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//creating session
if(!isset($_SESSION['$filterOne'])){
    $_SESSION['$filterOne'] = 3;
}else{
    if(isset($_POST['food'])) {
        $_SESSION['$filterOne'] = $_POST['food'];
    }
}
//Keeps track of the number of products the user wants displayed
$Differentname = $_SESSION['$filterOne'];

/*//defining parameters and filter out warnings.
$all    = filter_input(INPUT_POST,'all');
$app    = filter_input(INPUT_POST,'app');
$ent    = filter_input(INPUT_POST,'ent');
$soup   = filter_input(INPUT_POST,'soup');*/
$lewie = "";

//Grabbing post data for all menu items
if(isset($all)){
    $sql = "SELECT Item_id, Product_name, Description, Price 
            FROM $tblMenu LIMIT ";
    $lewie = $sql." LIMIT ";
    $menu_title = "Menu Items";
}
//Grabbing post data for the appetizers
if(isset($app)){
    $sql = "SELECT Item_id, Product_name, Description, Price 
            FROM $tblMenu 
            WHERE Category_id = 'a'";
    $lewie = $sql." LIMIT ";
    $menu_title = "Appetizers";
}
//Grabbing post data for the entrees
if(isset($ent)){
    $sql = "SELECT Item_id, Product_name, Description, Price 
            FROM $tblMenu 
            WHERE Category_id = 'ent'";
    $lewie = $sql." LIMIT ";
    $menu_title = "Entrees";
}
//Grabbing post data for the soup
if(isset($soup)){
    $sql = "SELECT Item_id, Product_name, Description, Price 
            FROM $tblMenu 
            WHERE Category_id = 's'";
    $lewie = $sql." LIMIT ";
    $menu_title = "Soups";
}
//Grabbing all menu items, menu display.
if((empty($all))&&(empty($app)) && (empty($ent)) && (empty($soup))){
    $sql = "SELECT * 
            FROM $tblMenu";
    $lewie = $sql." LIMIT ";
}
//multiple select and handling
//One condition for multiple sections

//to attempt a query execute
$query = $conn -> query($sql);

//Error handling
if (!$query) {
    $error = "Oops: " . $conn -> error;
    $conn -> close();
    header("Location: error.php?m=$error");
    exit();
}
?>
<br><br>
    <!--4 Checkboxes for the Filtering Honors Project-->
    <form action="" method="post">
        <input type="checkbox" name="food[]" size="40" value="All" onchange="this.form.submit()">
        <label for="all">All Items</label>

        <input type="checkbox" name="food[]" size="40" value="Appetizers" onchange="this.form.submit()">
        <label for="appetizers">Appetizers</label>

        <input type="checkbox" name="food[]" size="40" value="Entrees" onchange="this.form.submit()">
        <label for="entrees">Entrees</label>

        <input type="checkbox" name="food[]" size="40" value="Soup" onchange="this.form.submit()">
        <label for="soups">Soups</label>
    </form>
<br>

<!--POST to pagination, to receive the 'term' aka num of products displayed per page. -->
    <form action="" method="post">
        <p>How many products would you like to have displayed?</p>
        <label>
            <input type="radio" name="terms" value="3" onchange="this.form.submit()"> 3 Products
        <label>
            <input type="radio" name="terms" value="5" onchange="this.form.submit()"> 5 Products
        </label>
        <label>
            <input type="radio" name="terms" value="20" onchange="this.form.submit()"> All Products
        </label>
    </form>
<br>

<br>
    <form action="searchresults.php" method="get">
        <input type="text" name="q" size="40" required>&nbsp;&nbsp;
        <input type="submit" name="Submit" id="Submit" value="Search Items">
    </form>
    <br>
    <div class="menuItems">
        <h2><?php echo $menu_title ?></h2>
        <div class="row header">
            <div class="col1" style="text-decoration: underline">Product</div>
            <div class="col2" style="text-decoration: underline">Description</div>
            <div class="col3" style="text-decoration: underline">Price</div>
            <div style="text-decoration: underline">Add to Cart</div>
        </div>

        <!-- add the pagination.php file here to list all menu items from the "menu" table -->
    <?php include ("pagination.php");  ?>
<br><br>

<?php
require_once("includes/footer.php");