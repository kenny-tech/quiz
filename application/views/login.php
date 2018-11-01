<?php include('header.php'); ?>
<?php include('navigation.php') ?>
<div class="container">
  <h2>Login</h2>
  <p>Please login to take quiz</p>
  <form action="/action_page.php">
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
