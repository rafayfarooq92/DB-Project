<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/22/13
 * Time: 11:11 PM
 * To change this template use File | Settings | File Templates.
 */

?>


<style>

</style>
<div class="client-first-page">
    <div class="container-fluid">
    <div class="spacer"></div>
        <div class="row-fluid " >
            <div class="span2">

            </div>
            <div class="span8">
                <div class="round-ball">
                    <h2><?php echo $project['title'];  ?></h2>
                </div>
                <br><br>
                <div class="table_bg">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                <label>
                                    Title
                                </label>
                            </td>
                            <td>
                                <?php echo $project['title']; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>
                                    Category
                                </label>
                            </td>
                            <td>
                                <?php echo $project['category']; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>
                                    Posted On
                                </label>
                            </td>
                            <td>
                                <?php echo $project['data_time']; ?>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>
                                    Description
                                </label>
                            </td>
                            <td>
                                <?php echo $project['description']; ?>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>
                                    Client Expected Amount
                                </label>
                            </td>
                            <td>
                                <?php echo $project['estimated_amount']; ?>$ Per Hour
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>
                                    Total Bids On This Project
                                </label>
                            </td>
                            <td>
                                <?php echo count($bids); ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>
                                    Maximum Bid On This Project
                                </label>
                            </td>
                            <td>
                                <?php echo $project['estimated_amount']; ?>$ Per Hour
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>
                                    Project Company
                                </label>
                            </td>
                            <td>
                                <?php $at=$this->client->get_clientname_by_id($project['company_id']); echo $at['companyname']; ?>
                            </td>
                        </tr>




                    </table>

                </div>
                <br>
                <br>
                <div class="round-ball">
                    <h3>Bids</h3>
                </div>
                <br>
                <br>
                <div class="table_bg">
                    <?php
                        $u=count($bids);
                    if($u>0){
                    ?>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Bidding Price</th>
                        <th>User Claim</th>
                        <th>Date Time</th>
                    </tr>
                    </thead>
                <tbody>
                <?php }else{
                    ?>
                        <div >
                            <h3 style="color: white;background-color: black">No bid on this project</h3>
                        </div>
                <?php
                } ?>
                <?php
                    foreach($bids as $cur_row){
                        ?>
                        <tr>
                            <td>
                                <?php $user_name=($this->freelancer->get_username_from_bid($cur_row['User_ID']));
                                echo $user_name['fname'] . " " . $user_name['lname'];
                                ?>
                            </td>
                            <td>
                                <?php echo $cur_row['purposed_amount']; ?>

                            </td>
                            <td>
                                <?php echo $cur_row['user_claim']; ?>

                            </td>
                            <td>
                                <?php echo $cur_row['date_time']; ?>

                            </td>

                        </tr>
                <?php
                    }
                ?>
                </tbody>
                </table>
                </div>
                <div class="round-ball">
                    <h3>Make Bid</h3>
                </div>
                <br>
                <br>
                <Div style="width: 600px" >

                    <form class="well" style="position:relative;left: 120px !important;" method="post" action="" >
                        <?php if(isset($message)){
                            ?>
                            <div class="message">
                                <?php
                                echo "The Bid Is Successfully Posted.";
                                ?>
                            </div>
                        <?php } ?>

                        <table>
                            <tr>
                                <td>
                                    <label>Bidding Price</label>
                                </td>
                                <td>
                                    <input type="text" placeholder="Enter Bidding Price" name="purposed_amount"  class="big-text-box3">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Claim Yourself</label>
                                </td>
                                <td>
                                    <textarea cols="20" placeholder="Enter Your Claim" rows="8" name="user_claim"></textarea>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <label>Related Link/ Portfolio Link</label>
                                </td>
                                <td>
                                    <input type="text" placeholder="Sample Work Link" name="link"  class="big-text-box3">
                                </td>

                            </tr>
                           <!--   <tr>
                                <td>
                                    <label>Want to public this bid?</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="active"  >
                                    <span style="position: relative;top: 2px">Yes I do</span>
                                </td>


                            </tr> -->
                            <tr>
                                <td>
                                    <label>Submit</label>
                                </td>
                                <td>
                                    <input type="submit" name='submit_bid'  value="Bid It!"  class="button-company">
                                </td>

                            </tr>

                        </table>


                    </form>
                </Div>

            </div>
            <div class="span2">

            </div>

        </div>

    </div>
</div>