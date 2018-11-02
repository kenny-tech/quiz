<?php include('header.php'); ?>
<script type="text/javascript">
var val;
	function ensure()
	{
		var agree=confirm("Are you sure you want to end the quiz?")
		if(agree){
  		return true
      document.form1.submit();
		}
		else
		  return false
	}
</script>

<?php include('navigation.php') ?>

<div class="container">
  <h2>Quiz</h2>
  <?php
    if($this->session->flashdata('successMessage'))
    {
  ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('successMessage'); ?>
  </div>
  <?php } ?>
  <h3>Questions</h3>
  <?php
    $num = 0;
    if(isset($result)) {
    foreach($result as $row) {
      $id = $row->id;
      $question = $row->question;
			$option1 = $row->option1;
			$option2 = $row->option2;
			$option3 = $row->option3;
			$option4 = $row->option4;
      ++$num;
  ?>
  <?php
    $attributes = array('class' => 'form1', 'id' => 'form1');
    echo form_open('questions/mark', $attributes);
  ?>
  <div class="card" style="width: 50rem;">
    <div class="card-body">
      <input type="hidden" name="id[<?php echo $num; ?>]" value="<?php echo $id ?>"    />
      <h5 class="card-title"><?php echo $id; ?>&nbsp;<?php echo $question; ?></h5>
      <p class="card-text"><input type="radio" name="ans[<?php echo $num; ?>]" value="<?php echo $option1 ?>" />&nbsp;<?php echo $option1; ?></p>
      <p class="card-text"><input type="radio" name="ans[<?php echo $num; ?>]" value="<?php echo $option2 ?>" />&nbsp;<?php echo $option2; ?></p>
      <p class="card-text"><input type="radio" name="ans[<?php echo $num; ?>]" value="<?php echo $option3 ?>" />&nbsp;<?php echo $option3; ?></p>
      <p class="card-text"><input type="radio" name="ans[<?php echo $num; ?>]" value="<?php echo $option4 ?>" />&nbsp;<?php echo $option4; ?></p>
    </div>
  </div>
  <?php } } ?>
  <p align="center"><input type="submit" name="submit" id="submit" value="End quiz" class="btn btn-primary" onclick="ensure()"/></p>
	</form>
<?php include('footer.php'); ?>
