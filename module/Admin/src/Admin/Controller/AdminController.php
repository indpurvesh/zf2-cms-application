<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\EventManager\EventManagerInterface;
use Zend\View\Model\ViewModel,
    Admin\Form\Login,
    Zend\Authentication\Adapter\DbTable;

class AdminController extends AbstractActionController {

    public function mainAction() {
    }

   
    public function indexAction() {
        return  new  ViewModel(array('title' => 'Admin Index'));
    }

}