<?php
/*** Author: Alex Weber*
 * Date: 12/3/2021*
 * File: pagination.php*
 * Description: Using pagination to display multiple search results from the database*/

// Database Configuration file
include('includes/database.php');
?>

<html>
<head>
    <title>Pagination Testing Page</title>
</head>
<body>
<table class="menuItems">
    <?php
    //Getting default page number
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

    //Session variable
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    //creating session
    if(!isset($_SESSION['$records_per_page'])){
        $_SESSION['$records_per_page'] = 3;
    }else{
        if(isset($_POST['terms'])) {
            $_SESSION['$records_per_page'] = $_POST['terms'];
        }
    }
    //Keeps track of the number of products the user wants displayed
    $no_of_records_per_page = $_SESSION['$records_per_page'];

    // Formula for pagination
    $offset = ($page - 1) * $no_of_records_per_page;
    // Getting total number of pages
    $total_pages_sql = "SELECT COUNT(*) FROM menu_items";
    $result = mysqli_query($conn, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    $sql = "SELECT * FROM menu_items LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($conn, $sql);
    $cnt = 1;
    while ($row = mysqli_fetch_array($res_data)) {
        ?>
        <div class="row header">
            <div class="col1"><?php echo $row['Product_name']; ?></div>
            <div class="col2"><?php echo $row['Description']; ?></div>
            <div class="col3">$<?php echo $row['Price']; ?></div>
            <div> <a href="addtocart.php?id=<?= $row['Item_id'] ?>">
                    <img src="images/plustocart.png" alt="click to add item to cart">
                </a></div>
        </div>
    <?php
        $cnt++;
    }
    ?>
</table>
<div>
<!--    <?php /*if (ceil($total_pages / $no_of_records_per_page) > 0): */?>
        <ul class="pagination">
            <?php /*if ($page > 1): */?>
                <li class="prev"><a href="listmenu.php?page=<?php /*echo $page-1 */?>">Prev</a></li>
            <?php /*endif; */?>

            <?php /*if ($page > 3): */?>
                <li class="start"><a href="listmenu.php?page=1">1</a></li>
                <li class="dots">...</li>
            <?php /*endif; */?>

            <?php /*if ($page-2 > 0): */?><li class="page"><a href="listmenu.php?page=<?php /*echo $page-2 */?>"><?php /*echo $page-2 */?></a></li><?php /*endif; */?>
            <?php /*if ($page-1 > 0): */?><li class="page"><a href="listmenu.php?page=<?php /*echo $page-1 */?>"><?php /*echo $page-1 */?></a></li><?php /*endif; */?>

            <li class="currentpage"><a href="listmenu.php?page=<?php /*echo $page */?>"><?php /*echo $page */?></a></li>

            <?php /*if ($page+1 < ceil($total_pages / $no_of_records_per_page)+1): */?><li class="page"><a href="listmenu.php?page=<?php /*echo $page+1 */?>"><?php /*echo $page+1 */?></a></li><?php /*endif; */?>
            <?php /*if ($page+2 < ceil($total_pages / $no_of_records_per_page)+1): */?><li class="page"><a href="listmenu.php?page=<?php /*echo $page+2 */?>"><?php /*echo $page+2 */?></a></li><?php /*endif; */?>

            <?php /*if ($page < ceil($total_pages / $no_of_records_per_page)-2): */?>
                <li class="dots">...</li>
                <li class="end"><a href="listmenu.php?page=<?php /*echo ceil($total_pages / $no_of_records_per_page) */?>"><?php /*echo ceil($total_pages / $no_of_records_per_page) */?></a></li>
            <?php /*endif; */?>

            <?php /*if ($page < ceil($total_pages / $no_of_records_per_page)): */?>
                <li class="next"><a href="listmenu.php?page=<?php /*echo $page+1 */?>">Next</a></li>
            <?php /*endif; */?>
        </ul>
    <?php /*endif; */?>


-->
    <div align="center">
        <ul class="pagination" >
            <li><a href="?page=1">First</a></li>
            <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
            </li>
            <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
            </li>
            <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
    </div>
</div>
</body>
</html>