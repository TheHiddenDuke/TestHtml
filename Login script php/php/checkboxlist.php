<?php
/**
 * Created by PhpStorm.
 * User: Jarand
 * Date: 30/01/2017
 * Time: 13:34
 */

?>

<form method="post" id="shoppinglist" action="buypage.php">
    <table id="rightWrapper" width="300" cellpadding="0" cellspacing="1" border="1">
        <div id="rightBottom">
            <tr>
                <td>
                    <strong>Shopping:</strong><br>
                    <?php
                    while ($name = mysqli_fetch_assoc($result)):
                        $truename = $name['itemname'];
                        ?>

                        <input type="checkbox" name="<?php echo htmlspecialchars($truename, ENT_QUOTES, 'UTF-8')?>" value="true"/>
                        <?php echo $truename; ?><br>

                    <?php endwhile; ?>
                    <input type="submit" name="submit" value="checkout">
                </td>
            </tr>
        </div>
    </table>
</form>
