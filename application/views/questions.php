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
  <h2>Questions</h2>
<?php include('footer.php'); ?>
