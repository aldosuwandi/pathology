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
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="<?php base_url();?>/patient">Reports</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <input type="button" class="btn btn-primary btn-sm" onclick="printDiv('printableArea')" value="Export as PDF" />

            <br/><br/>

            Title : <?php echo $report->getTitle(); ?> <br/>
            Date : <?php echo $report->getDateTaken()->format('Y-m-d'); ?> <br/>
            Note : <?php echo $report->getNote(); ?> <br/>

            <br/><br/>
            <?php echo form_open('patient/mail'); ?>
            <input type="hidden" name="report" value="<?php echo $report->getId(); ?>">
            E-mail : <input type="email" name="email">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </form>
            <br/><br/>

            <div id="printableArea">
                <h4>Pathology Test Result (<?php echo $report->getTitle(); ?>) - <?php echo $report->getDateTaken()->format('Y-m-d'); ?> </h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Result</th>
                        <th>Unit</th>
                        <th>Note</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($reportTests as $testResult) {?>
                        <tr>
                            <td><?php echo $testResult->getPathologyTest()->getName(); ?></td>
                            <td><?php echo $testResult->getResult(); ?></td>
                            <td><?php echo $testResult->getPathologyTest()->getUnit(); ?></td>
                            <td><?php echo $testResult->getNote(); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div> <!-- /container -->

<?php $this->load->view('template/footer');?>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
</body>
</html>
