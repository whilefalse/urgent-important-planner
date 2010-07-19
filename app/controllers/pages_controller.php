<?php
class PagesController extends AppController {

	var $name = 'Pages';
    var $uses = array();

    function beforeFilter(){
      $this->Auth->allow('home');
      parent::beforeFilter();
    }

    function home(){

    }

}
