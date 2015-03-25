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
                    <?php echo form_open('admin/user/'.$action); ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo ($content ? $content->getName() : ''); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control" value="<?php echo ($content ? $content->getAge() : ''); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="<?php echo ($content ? $content->getMobile() : ''); ?>" required>
                        </div>
                        <?php if ($action == 'create') { ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo ($content ? $content->getUsername() : ''); ?>" required>
                        </div>
                        <?php } ?>
                        <?php if ($action == 'edit') { ?>
                            <input type="hidden" name="username" class="form-control" value="<?php echo ($content ? $content->getUsername() : ''); ?>" required>
                        <?php } ?>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo ($content ? 'default' : ''); ?>" required>
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
