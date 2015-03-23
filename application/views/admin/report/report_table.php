<?php $this->load->helper('url'); ?>

<a href="<?php base_url();?>create_user" class="btn btn-default" role="button">Create</a>
<br/>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($content as $user) {?>
        <tr>
            <td><?php echo $user->getUsername(); ?></td>
            <td><?php echo $user->getName(); ?></td>
            <td><?php echo $user->getGender(); ?></td>
            <td><?php echo $user->getAge(); ?></td>
            <td>
                <a href="<?php base_url();?>edit_user/<?php echo $user->getUsername();?>" class="btn btn-default" role="button">Edit</a>
                <a href="<?php base_url();?>delete_user/<?php echo $user->getUsername();?>" class="btn btn-default" role="button">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>