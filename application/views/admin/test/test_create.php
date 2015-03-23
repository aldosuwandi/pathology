<?php $this->load->helper('form'); ?>
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
            <div class="row">
                <div class="col-md-6">
                    <?php echo form_open('admin/'.$action.'_test'); ?>
                        <?php if ($action == 'edit') { ?>
                            <input type="hidden" name="id" class="form-control" value="<?php echo ($content ? $content->getId() : ''); ?>">
                        <?php }; ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo ($content ? $content->getName() : ''); ?>">
                        </div>
                        <div class="form-group">
                            <label>Unit</label>
                            <input type="text" name="unit" class="form-control" value="<?php echo ($content ? $content->getUnit() : ''); ?>">
                        </div>
                        <div class="form-group">
                            <label>Expected Value</label>
                            <input type="text" name="expected_value" class="form-control" value="<?php echo ($content ? $content->getExpectedValue() : ''); ?>">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container -->

<?php $this->load->view('template/footer');?>

</body>
</html>
