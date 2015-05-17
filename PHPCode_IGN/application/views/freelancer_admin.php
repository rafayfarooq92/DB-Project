<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/22/13
 * Time: 11:11 PM
 * To change this template use File | Settings | File Templates.
 */

?>

<?php include_once "admin_nav.php" ?>
<style>

</style>
<div class="client-first-page">
    <div class="container-fluid">
        <div class="spacer"></div>
        <div class="row-fluid" >
            <div class="span4">

            </div>
            <div class="span4">
                <?php if(isset($message)){
                    ?>
                    <div class="message">
                        <?php
                        echo "The Profile has been updated successfully.";
                        ?>
                    </div>
                <?php } ?>
                <div class="round-ball">
                    Your Profile
                </div>
                <br><br>
                <form class="well" method="post" action="">
                    <table>
                        <tr>
                            <td><label>First Name : </label></td>
                            <td><input type="text" value="<?php echo $fname; ?>" name="fname"  class="medium-big-box" >
                            </td>
                        </tr>
                        <tr>
                            <td><label>Last Name : </label></td>
                            <td><input type="text" value="<?php echo $lname; ?>" name="lname"  class="medium-big-box" >
                            </td>
                        </tr>
                        <tr>
                            <td><label>Email : </label></td>
                            <td><input type="email" value="<?php echo $email; ?>" name="email"  class="medium-big-box" >
                            </td>
                        </tr>
                        <tr>
                            <td><label>Password : </label></td>
                            <td><input type="password" value="<?php echo $password; ?>" name="password"  class="medium-big-box" >
                            </td>
                        </tr>
                        <tr>
                            <td><label>Payment Account : </label></td>
                            <td><input type="text" value="<?php echo $moneyacc; ?>" name="moneyacc"  class="medium-big-box" >
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"><h3>Address Information</h3></td>
                        </tr>
                        <tr>
                            <td><label>Country: </label></td>
                            <td><input type="text" value="<?php echo $country; ?>" name="country"  class="medium-big-box" >
                            </td>
                        </tr>
                        <tr>
                            <td><label>City: </label></td>
                            <td><input type="text" value="<?php echo $city; ?>" name="city"  class="medium-big-box" >
                            </td>
                        </tr>
                        <tr>
                            <td><label>Zip Code: </label></td>
                            <td><input type="text" value="<?php echo $zipcode; ?>" name="zipcode"  class="medium-big-box" >
                            </td>
                        </tr>
                        <tr>
                            <td><label>House Number: </label></td>
                            <td><input type="text" value="<?php echo $houseno; ?>" name="houseno"  class="medium-big-box" >
                            </td>
                        </tr>









                    </table>
                    <input type="submit" value="Update Profile" name="update" class="button-company" style="position: relative; left: -7px;">
                </form>
            </div>
            <div class="span4">

            </div>

        </div>

    </div>
</div>