<?php include('header.php'); ?>
<?php include('navigation.php') ?>
<div class="container">
	<h1>Quiz</h1>
	<h4>Please <a href="<?php echo site_url(); ?>user/login">login</a> or <a href="<?php echo site_url(); ?>user/register">register</a> to take a new quiz</h4>

	<h3>Already taken quiz</h3>
	<?php
    if($this->session->flashdata('successMessage'))
    {
  ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('successMessage'); ?>
  </div>
  <?php } ?>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Score</th>
      <th scope="col">Date taken</th>
    </tr>
  </thead>
  <tbody>
		<?php
			if($quiz_results!=null) {
				foreach($quiz_results as $row) { ?>
    <tr>
      <td><?php echo $row->score; ?></td>
      <td><?php echo $row->created; ?></td>
    </tr>
	<?php } } else { ?>
		<tr>
      <td colspan="2">No result found</td>
    </tr>
	<?php } ?>
  </tbody>
</table>
<?php include('footer.php'); ?>
