<html>
  <head>
    <title><?php echo $title_for_layout; ?></title>
    <?php echo $scripts_for_layout; ?>
  </head>
  <body>
    <div id="header">
     <?php if ($user){ ?>
      Welcome <?php echo $user['User']['username'];?>
      <?php
        echo $html->link('Logout', array('controller' => 'users', 'action' => 'logout'));
      }
      elseif (!($this->params['controller'] == 'users' && $this->params['action'] == 'login')){
        echo $html->link('Login', array('controller' => 'users', 'action' => 'login'));
      }?>
    </div>
    <div class="loading">
      <?php echo $html->image('loading.gif', array('alt' => 'Loading...',
      'style' => 'display:none', 'id' => 'loading-gif'));?>
    </div>
    <div id="content">
      <?php echo $content_for_layout;?>
    </div>
  </body>
</html>

