<?php include('header.php'); ?>
<?php include('navigation.php') ?>
<div class="container">
  <h2>Login</h2>
  <p>Please login to take the quiz</p>
  <?php
    if($this->session->flashdata('successMessage'))
    {
  ?>
  <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('successMessage'); ?>
  </div>
  <?php } ?>
  <?php
    if($this->session->flashdata('errorMessage'))
    {
  ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $this->session->flashdata('errorMessage'); ?>
  </div>
  <?php } ?>
  <?php echo form_open('user/login'); ?>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<?php include('footer.php'); ?>
