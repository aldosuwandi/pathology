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
                    <?php echo form_open('admin/report/'.$action); ?>
                    <?php if ($action == 'edit') { ?>
                        <input type="hidden" name="id" class="form-control" value="<?php echo ($content ? $content->getId() : ''); ?>">
                    <?php }; ?>
                    <div class="form-group">
                        <?php if ($action == 'create') { ?>
                        <label>User</label>
                        <select class="form-control" name="user">
                            <?php foreach($users as $user) {?>
                                <option value="<?php echo $user->getUsername(); ?>"><?php echo $user->getName(); ?></option>
                            <?php } ?>
                        </select>
                        <?php }; ?>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo ($content ? $content->getTitle() : ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="datetime" id="datepicker" name="date" class="form-control" value="<?php echo ($content ? $content->getDateTaken()->format('Y-m-d') : ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Note</label>
                        <textarea name="note" class="form-control" rows="3"><?php echo ($content ? $content->getNote() : ""); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>

            <?php
            if ($action == 'edit') {
                $this->load->view('admin/report/report_test_table',[
                    'tests' => $tests,
                    'reportTests' => $reportTests,
                    'report' => $content
                ]);
            };
            ?>
        </div>
    </div>
</div> <!-- /container -->

<?php $this->load->view('template/footer');?>

<script>
    $(function() {
        $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>

</body>
</html>
