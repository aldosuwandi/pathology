<?php $this->load->helper('url'); ?>

<a href="<?php base_url();?>create_test" class="btn btn-default" role="button">Create</a>
<br/>
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Unit</th>
        <th>Expected Value</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($content as $test) {?>
        <tr>
            <td><?php echo $test->getId(); ?></td>
            <td><?php echo $test->getName(); ?></td>
            <td><?php echo $test->getUnit(); ?></td>
            <td><?php echo $test->getExpectedValue(); ?></td>
            <td>
                <a href="<?php base_url();?>edit_test/<?php echo $test->getId();?>" class="btn btn-default" role="button">Edit</a>
                <a href="<?php base_url();?>delete_test/<?php echo $test->getId();?>" class="btn btn-default" role="button">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>