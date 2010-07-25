<h1>Login/Signup</h1>
<div id="login-content">
   <p>... we only support OpenID. If you don't have one, you can get one <a href="http://openid.net/get-an-openid">here</a>
</p>
<?php
  // app/views/users/login.ctp
if (isset($message))
  {
    echo '<p class="error">'.$message.'</p>';
  }
echo $form->create('User', array('type' => 'post', 'action' => 'login'));
echo $form->input('OpenidUrl.openid', array('label' => false));
echo $form->end('Login');
?>
</div>