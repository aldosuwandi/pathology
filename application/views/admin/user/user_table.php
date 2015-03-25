<?php $this->load->helper('url'); ?>

<a href="<?php base_url();?>/admin/user/create" class="btn btn-default" role="button">Create</a>
<br/>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Mobile</th>
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
            <td><?php echo $user->getMobile(); ?></td>
            <td>
                <a href="<?php base_url();?>/admin/user/edit/<?php echo $user->getUsername();?>" class="btn btn-default" role="button">Edit</a>
                <a href="<?php base_url();?>/admin/user/delete/<?php echo $user->getUsername();?>" class="btn btn-default" role="button">Delete</a>
                <button type="button" id="sendSMS" class="btn btn-default" onclick="alert('sending username and password to <?php echo $user->getMobile()?>');">Send ID</button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

