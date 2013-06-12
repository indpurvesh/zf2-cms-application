<?php

namespace Kdecom\Mvc\Controller;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Basic action controller
 */
class AdminActionController extends AbstractActionController {

    public function onDispatch(MvcEvent $e) {
        $authService = $this->serviceLocator->get('auth_admin_service');
        
        if (!$authService->hasIdentity()) {
            // if not log in, redirect to login page
            return $this->redirect()->toUrl('/zf/admin/admin/login');
        }
        return parent::onDispatch($e);
    }

}
