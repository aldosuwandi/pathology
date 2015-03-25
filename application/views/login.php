<?php $this->load->helper('form'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('template/head');?>
</head>

<body>

<div class="container" style="width: 20%">
    <?php echo form_open('login/submit'); ?>
        <h5>Pathology Reporting System</h5>
        <label for="Username" class="sr-only">Username</label>
        <input type="text" id="Username" class="form-control" placeholder="Username" name="username" required autofocus style="margin-bottom: 10px">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required style="margin-bottom: 10px">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <?php echo form_close(); ?>
</div> <!-- /container -->

<?php $this->load->view('template/footer');?>

<script>
    $(function() {
        var availableTags = <?php echo $users; ?>;
        $( "#Username" ).autocomplete({
            source: availableTags
        });
    });
</script>

</body>
</html>
