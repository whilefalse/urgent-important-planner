<html>
  <head>
    <title><?php echo $title_for_layout; ?></title>
    <?php echo $html->charset(); ?>
    <?php echo $html->css(array('reset', 'main')); ?>
    <?php echo $scripts_for_layout; ?>
  </head>
  <body>
    <div id="header">
     <?php if ($user){ ?>
      <div class="logout">
                       You're logged in as <span class="username"><?php echo $user['User']['username'];?></span><span class="pipe">|</span>
      <?php
        echo $html->link('Logout', array('controller' => 'users', 'action' => 'logout'));
      }
      elseif (!($this->params['controller'] == 'users' && $this->params['action'] == 'login')){
        ?>
        <div class="login">
        <?php echo $html->link('Login/Signup', array('controller' => 'users', 'action' => 'login'));?>
        <span id="with-openid">(with OpenID)</span>
      <?php } ?>
      </div>
      <span class="loading">
        <?php echo $html->image('loading.gif', array('alt' => 'Loading...',
                                                     'style' => 'display:none', 'id' => 'loading-gif'));?>
      </span>
    </div>
    <div id="content">
      <?php echo $content_for_layout;?>
    </div>
  </body>
</html>

