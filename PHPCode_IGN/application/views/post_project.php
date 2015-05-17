<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/22/13
 * Time: 11:11 PM
 * To change this template use File | Settings | File Templates.
 */

?>

<?php include_once "client_nav.php" ?>
<style>
.button-company{
    margin-left: 10% !important;
}
</style>
<div class="client-first-page">
    <div class="container-fluid">
        <div class="spacer">

        </div>
        <div class="row-fluid " >
            <div class="span3">

            </div>
            <div class="span6">
                <div class="round-ball">
                    Post Project
                </div>

                <br><br>
                <form class="well" method="post" action="">
                    <?php if($message){
                        ?>
                    <div class="message">
                        <?php
                            echo "The Project Is Successfully Posted.";
                         ?>
                    </div>
                    <?php } ?>
                    <table>
                        <tr>
                            <td>
                                <label>
                                    Title :
                                </label>

                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Name Of Your Project" class="big-text-box3">

                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label>
                                    Description :
                                </label>
                            </td>
                            <td>
                                <textarea cols="50" rows="7" name="description">

                                </textarea>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label>
                                    Estimated Amount Per Hour:
                                </label>
                            </td>
                            <td>
                                <input name="estimated_amount" type="text" class="big-text-box3" placeholder="Enter expected amount of your project on per hour basis">

                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label>
                                    Category :
                                </label>
                            </td>
                            <td>
                                <select name="category" class="select_box">
                                    <option>
                                        Mobile Application
                                    </option>
                                    <option>
                                        WordPress or Other CMS
                                    </option>
                                    <option>
                                        Game Application
                                    </option>
                                    <option>
                                        Deskstop Application
                                    </option>
                                    <option>
                                        Programming
                                    </option>
                                    <option>
                                        Social Media
                                    </option>





                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Submit</label>
                            </td>
                            <td>
                                <input style="margin-left: 20px" class="button-company" type="submit" name="post_pro"  value="Post Project" >

                            </td>
                        </tr>
                    </table>


                </form>

            </div>
            <div class="span3">

            </div>

        </div>

    </div>
</div>