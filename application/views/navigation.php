<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Quiz</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo site_url(); ?>user">Take Quiz</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php if($this->session->userdata('user_id')) { ?>
      <li><a href="<?php echo site_url(); ?>user/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="<?php echo site_url(); ?>user/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <?php } else { ?>
      <li><a href="<?php echo site_url(); ?>user/logout"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
    <?php } ?>
    </ul>
  </div>
</nav>
