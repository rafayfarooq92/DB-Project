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
                    All Bids
                </div>
                <br><?php if($message){
                    ?>
                    <div class="message">
                        <?php
                        echo "The bid has been deleted successfully.";
                        ?>
                    </div>
                <?php } ?>
                <br>
                <div class="table_bg">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Purposed Amount</th>
                            <th>User Claim</th>
                            <th>User Name</th>
                            <th>Delete</th>


                        </tr>
                        </thead>

                        <?php
                        foreach($freelancers as $row){
                            ?>
                            <tr>
                                <td><?php $proj=( $this->project->get_project_name($row['pid'])); echo $proj['title']; ?></td>
                                <td><?php echo $row['purposed_amount']; ?></td>
                                <td><?php echo $row['user_claim']; ?></td>
                                <td><?php $user_name=($this->freelancer->get_username_from_bid($row['User_ID']));
                                    echo $user_name['fname'] . " " . $user_name['lname'];
                                    ?>
                                </td>
                                <td><a href="<?php echo base_url().'index.php/freelancers/delete_bid/'.$row['bid_id']; ?>">Delete</a> </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>
                <?php
                echo $pages;
                ?>
            </div>
            <div class="span2">

            </div>

        </div>

    </div>
</div>