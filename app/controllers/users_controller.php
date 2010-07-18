<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Openid.Openid');

    function login()
    {
      $returnTo = 'http://'.$_SERVER['SERVER_NAME'];

      if (!empty($this->data))
        {
          try
            {
              $this->Openid->authenticate($this->data['OpenidUrl']['openid'], $returnTo, $returnTo, array(), true);
            }
          catch (InvalidArgumentException $e)
            {
              $this->setMessage('Invalid OpenID');
            }
          catch (Exception $e)
            {
              $this->setMessage($e->getMessage());
            }
        }
      elseif ($this->Openid->isOpenIDResponse())
        {
          $response = $this->Openid->getResponse($returnTo);

          if ($response->status == Auth_OpenID_CANCEL)
            {
              $this->setMessage('Verification cancelled');
            }
          elseif ($response->status == Auth_OpenID_FAILURE)
            {
              $this->setMessage('OpenID verification failed: '.$response->message);
            }
          elseif ($response->status == Auth_OpenID_SUCCESS)
            {
              echo 'successfully authenticated as '.$response->identity_url.'!';
            }
        }
    }
    function setMessage($msg)
    {
      $this->set($msg);
    }
}