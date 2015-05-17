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

</style>
<div class="client-first-page">
    <div class="container-fluid">
        <div class="spacer"></div>
        <div class="row-fluid " >
            <div class="span1">

            </div>
            <div class="span10">
                <div class="round-ball">
                    My Projects
                </div>

                <br><br>
                <Div class="table_bg">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Estimated Amount</th>

                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <?php foreach($projects as $row){
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['title']; ?>
                                </td>
                                <td>
                                    <?php echo $row['data_time']; ?>
                                </td>
                                <td>
                                    <?php echo $row['category']; ?>
                                </td>
                                <td>
                                    <?php echo $row['estimated_amount']; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'index.php/clients/edit_project/'.$row['pid'] ?>" >Edit</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'index.php/projects/delete_project/'.$row['pid'] ?>" >Delete</a>
                                </td>

                            </tr>

                        <?php
                        }
                        ?>
                    </table>

                </Div>
                <?php
                echo $pages;
                ?>
            </div>
            <div class="span1">

            </div>

        </div>

    </div>
</div>