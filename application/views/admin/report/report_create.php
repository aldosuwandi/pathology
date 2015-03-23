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
                        <label>User</label>
                        <select name="user">
                            <?php foreach($users as $user) { ?>
                                <option value="<?php echo $user->getId(); ?>"><?php echo $user->getName(); ?></option>
                            <? }; ?>
                        </select>
                        <input type="text" name="user" class="form-control" value="<?php echo ($content ? $content->getUser()->getName() : ''); ?>">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo ($content ? $content->getTitle() : ''); ?>">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="datetime" name="date" class="form-control" value="<?php echo ($content ? $content->getDate() : ''); ?>">
                    </div>
                    <div class="form-group">
                        <label>Note</label>
                        <textarea  name="note" class="form-control">
                            <?php echo ($content ? $content->getNote() : ''); ?>
                        </textarea>
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
