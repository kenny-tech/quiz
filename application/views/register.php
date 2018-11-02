<?php include('header.php'); ?>
<?php include('navigation.php') ?>
<div class="container">
  <h2>Register</h2>
  <?php echo form_open('user/register'); ?>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<?php include('footer.php'); ?>
