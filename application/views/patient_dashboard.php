<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('template/head');?>
</head>
<body>
<?php $this->load->view('template/header');?>
<div class="container-fluid">
    <div class="row">
        <h1 class="page-header">Dashboard</h1>
        <div class="table-responsive">
            <button>Create</button>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                </tr>
                </thead>
                <tbody>
                <?php for($i = 0 ; $i < 5; $i++) {?>
                    <tr>
                        <td>1,001</td>
                        <td>Lorem</td>
                        <td>ipsum</td>
                        <td>dolor</td>
                        <td>sit</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
</div>

<?php $this->load->view('template/footer');?>

</body>
</html>