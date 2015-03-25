<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('template/head');?>
</head>
<body>
<?php $this->load->view('template/header');?>
<div class="container-fluid">
    <div class="row">
        <?php $this->load->view('template/admin_sidebar');?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header"><?php echo ucfirst($status);?> List</h1>
            <div class="table-responsive">
                <?php $this->load->view('admin/'.$status.'/'.$status.'_table',$content);?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer');?>

</body>
</html>