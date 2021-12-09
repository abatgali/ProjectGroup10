<?php
/**
 * Author Name : Isaac Lowe
 * Date : 12/2/2021
 * File : addItem.php
 * Description:
 */

$title = "Add Item Page";
require_once 'includes/header.php';

?>

    <h2 class="aboutTop">Add a New Menu Item</h2>
    <form action="insertItem.php" method="post">
        <table cellspacing="5px" cellpadding="1" style="  margin-left: auto; margin-right: auto; border: 1px solid silver; padding:10px; margin-bottom: 10px ">
            <tr>
                <td style="text-align: right; width: 140px"> New Item Name: </td>
                <td><input name="Product_name" type="text" size="20" required /></td>
            </tr>
            <tr>
                <td style="text-align: right">Category:</td>
                <td>
                    <select name="Category_id">
                        <option value="a">Appetizer</option>
                        <option value="s">Soup</option>
                        <option value="ent">Entree</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">Listed Price: </td>
                <td><input name="Price" type="number" step="0.01" size="40" required /></td>

            <tr>
                <td style="text-align: right; vertical-align: top">Description:</td>
                <td><textarea name="Description" rows="6" cols="50"></textarea></td>
            </tr>
        </table>
        <br>
        <div class="buttons">
            <input type="submit" value="Add Item" />
            <input type="button" value="Cancel" onclick="window.location.href='listMenu.php'" />
        </div>
    </form>

<?php
require_once 'includes/footer.php';
