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
        <div class="spacer">


        </div>
        <div class="row-fluid " >
            <div class="span2">

            </div>
            <div class="span8">
                <div class="round-ball">
                    Latest Projects
                </div>
                <br><br>
                <div class="table_bg">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Post On</th>
                            <th>More Details</th>


                        </tr>
                        </thead>

                        <?php
                        foreach($projects as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['data_time']; ?></td>
                                <td><a href="<?php echo base_url().'index.php/freelancers/show_project/'.$row['pid']; ?>">More Details</a></td>

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