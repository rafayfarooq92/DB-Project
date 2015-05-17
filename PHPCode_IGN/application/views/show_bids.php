<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Unknown
 * Date: 11/22/13
 * Time: 11:11 PM
 * To change this template use File | Settings | File Templates.
 */

?>

<?php include_once "freelancer_nav.php" ?>
<style>

</style>
<div class="client-first-page">
    <div class="container-fluid">
        <div class="spacer">

        </div>
        <div class="row-fluid" >
            <div class="span2">

            </div>
            <div class="span8">
                <div class="round-ball">
                    My Bids
                </div>
                <br><br>
                <div class="table_bg">
                    <table class="table table-bordered table-striped">
                        <?php $e= count($my_bids);
                        if($e>0){
                        ?>
                            <thead>
                        <tr>
                            <th>Project Title</th>
                            <th>Bid On </th>
                            <th>Amount Per Hour</th>
                            <th>Your Claim</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                       <?php }else{
                            ?>
                            <div >
                                <h3 style="color: white;background-color: black">You have no bidding record.</h3>
                            </div>
                        <?php
                        }?>
                        <?php
                        foreach($my_bids as $row){
                            ?>
                            <tr>
                                <td><?php $proj=( $this->project->get_project_name($row['pid'])); echo $proj['title']; ?></td>
                                <td><?php echo $row['date_time']; ?></td>
                                <td><?php echo $row['purposed_amount']; ?></td>
                                <td><?php echo $row['user_claim']; ?></td>
                                <td><?php if($row['approved']==0){
                                        echo "Not approved yet.";
                                    }else{
                                        echo "Approved";
                                    }?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>
                <?php
                    echo $pages ;
                ?>
            </div>
            <div class="span2">

            </div>

        </div>

    </div>
</div>