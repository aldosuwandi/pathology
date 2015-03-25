<?php $this->load->helper('url'); ?>
<br/>
<br/>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testReportModal">
    Add Test
</button>

<div class="modal fade" id="testReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Test</h4>
            </div>
            <?php echo form_open('admin/report/create_test_report'); ?>
            <input type="hidden" name="report" value="<?php echo $report->getId(); ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Test</label>
                    <select name="test">
                        <?php foreach($tests as $test) { ?>
                            <option value="<?php echo $test->getId(); ?>"><?php echo $test->getName(); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Result</label>
                    <input type="text" name="result" class="form-control"" required>
                </div>
                <div class="form-group">
                    <label>Note</label>
                        <textarea  name="note" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<br/>
<h4>Pathology Test Result</h4>
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
            <td>
                <a href="<?php base_url();?>/admin/report/delete_test_report/<?php echo $testResult->getId();?>" class="btn btn-default" role="button">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>