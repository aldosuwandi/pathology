<?php $this->load->helper('url'); ?>

<a href="<?php base_url();?>/admin/report/create" class="btn btn-default" role="button">Create</a>
<br/>
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>User</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($content as $report) {?>
        <tr>
            <td><?php echo $report->getId(); ?></td>
            <td><?php echo $report->getTitle(); ?></td>
            <td><?php echo $report->getUser()->getName(); ?></td>
            <td><?php echo $report->getDateTaken()->format('Y-m-d'); ?></td>
            <td>
                <a href="<?php base_url();?>/admin/report/edit/<?php echo $report->getId();?>" class="btn btn-default" role="button">Edit</a>
                <a href="<?php base_url();?>/admin/report/delete/<?php echo $report->getId();?>" class="btn btn-default" role="button">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>