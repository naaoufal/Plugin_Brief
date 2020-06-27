<div class="container" style="width:90%">
    <div style="margin-top : 50px;">
        <div class="panel panel-primary">
            <div class="panel-heading"><h1>Membres List</h1></div>
            <div class="panel-body"><p>Here we describe just a example of your membre list !!!!</p></div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><h2>All Our Membres</h2></div>
        <div class="panel-body">
            <table id="wu-sheengun" class="display">
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Member Level</th>
                    <!-- <th>Actions</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    global $wpdb;
                    $all_members = $wpdb->get_results(
                        $wpdb->prepare(
                            "SELECT * from ".$this->tables->wusheenguntable()." Order by id desc",""
                        ),ARRAY_A
                    );
                    if(count($all_members) > 0){
                        $i = 1;
                        foreach($all_members as $index=>$data){
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td>
                                    <?php echo $data['age']; ?>
                                </td>
                                <td>
                                    <?php
                                        $members_levels = json_decode($data['member_for']);
                                        // print_r ($members_levels);
                                        foreach($members_levels as $level){
                                            echo $level." , ";
                                        }
                                    ?>
                                </td>
                                <!-- <td><a href="#" class="btn btn-info">Edit</a> <a href="#" class="btn btn-danger">Delete</a></td> -->
                            </tr>
                            <?php
                        }
                    }else{
                        echo "<h4>No Members found</h4>";
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Serial Number</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Member Level</th>
                    <!-- <th>Create At</th>
                    <th>Actions</th> -->
                </tr>
            </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {
    jQuery('#wu-sheengun').DataTable();
    });
</script>