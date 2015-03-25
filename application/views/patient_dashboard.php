<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('template/head');?>
</head>
<body>
<?php $this->load->view('template/header');?>
<div class="container-fluid">
    <div class="row">
        <?php $this->load->helper('url'); ?>
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="<?php base_url();?>/patient">Reports</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Report List</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($reports as $report) {?>
                        <tr>
                            <td><?php echo $report->getTitle(); ?></td>
                            <td><?php echo $report->getDateTaken()->format('Y-m-d'); ?></td>
                            <td><?php echo $report->getNote(); ?></td>
                            <td>
                                <a href="<?php base_url();?>/patient/report/<?php echo $report->getId();?>" class="btn btn-default" role="button">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer');?>

</body>
</html>