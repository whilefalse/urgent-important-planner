<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Openid.Openid' => array('use_database' => true), 'Auth');

    function login(){
      $returnTo = 'http://'.$_SERVER['SERVER_NAME'].'/users/login/';

      if (!empty($this->data)){
        try{
          $this->Openid->authenticate($this->data['OpenidUrl']['openid'], $returnTo, $returnTo, array(), true);
        }
        catch (InvalidArgumentException $e){
          $this->_setMessage('Invalid OpenID');
        }
        catch (Exception $e){
          $this->_setMessage($e->getMessage());
        }
      }
      elseif ($this->Openid->isOpenIDResponse()){
        $response = $this->Openid->getResponse($returnTo);

        if ($response->status == Auth_OpenID_CANCEL){
          $this->_setMessage('Verification cancelled');
        }
        elseif ($response->status == Auth_OpenID_FAILURE){
          $this->_setMessage('OpenID verification failed: '.$response->message);
        }
        elseif ($response->status == Auth_OpenID_SUCCESS){
          $this->_handleLogin($response->identity_url);
        }
      }
    }

    function logout(){
      $this->redirect($this->Auth->logout());
    }

    function _handleLogin($openid){
      $user = $this->User->findByOpenid($openid);
      #Create the user if it doesn't exist
      if (!$user){
        $this->User->create();
        $this->User->saveAll(array('User'=> array(
                                                 'username' => $openid,
                                                 'openid' => $openid,
                                                 'password' => $this->Auth->password($openid)
                                                 ),
                                  'Todo' => array()
                                  ));
      }

      #Login
      $this->Auth->login(array('User' => array(
                                               'username' => $openid,
                                               'password' => $this->Auth->password($openid)
                                               )
                               )
                         );
      $this->redirect(array('controller' => 'todos', 'action' => 'view'));
    }

    function _setMessage($msg)
    {
      $this->set('message',$msg);
    }
}