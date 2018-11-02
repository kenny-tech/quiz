<?php include('header.php'); ?>
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
      if(isset($result)) {
        foreach($result as $row) {
          $id = $row->id;
          $question = $row->question;
				  $option1 = $row->option1;
				  $option2 = $row->option2;
				  $option3 = $row->option3;
				  $option4 = $row->option4;
  ?>
  <p><strong><?php echo $id; ?>&nbsp;<?php echo $question; ?></strong></p>
  <input type="radio" value="<?php echo $option1 ?>" />&nbsp;<?php echo $option1; ?>
  <input type="radio" value="<?php echo $option2 ?>" />&nbsp;<?php echo $option2; ?>
  <input type="radio" value="<?php echo $option3 ?>" />&nbsp;<?php echo $option3; ?>
  <input type="radio" value="<?php echo $option4 ?>" />&nbsp;<?php echo $option4; ?>
  <?php } } ?>
<?php include('footer.php'); ?>
