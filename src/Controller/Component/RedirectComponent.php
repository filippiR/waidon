<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * CakePHP RedirectComponent
 * @author filip
 */
class RedirectComponent extends Component {

    public function getRedirectUrlByParams($default = ['action'=>'index']) {
        $atualUrl = $this->getController()->getRequest()->getPath();
        $ses = $this->getController()->getRequest()->getSession()->read('Urls.' . $atualUrl);
        $this->getController()->getRequest()->getSession()->delete('Urls.' . $atualUrl);
        if (!empty($ses)) {
            $default = $ses;
        }
        return $default;
    }

    public function getRedirectUrlNoClean($default = ['action'=>'index']){
        $atualUrl = $this->getController()->getRequest()->getPath();
        $ses = $this->getController()->getRequest()->getSession()->read('Urls.' . $atualUrl);
        // $this->getRequest()->getSession()->delete('Urls.' . $atualUrl);
        if (!empty($ses)) {
            $default = $ses;
        }
        return $default;
    }

    public function saveReferer() {
        $referer = $this->getController()->getRequest()->referer();
        $atualUrl = $this->getController()->getRequest()->getPath();
        if(empty($this->getController()->getRequest()->getSession()->read('Urls.'.$atualUrl))) {
            $this->getController()->getRequest()->getSession()->write('Urls.' . $atualUrl, $referer);
        }
    }

    public function saveRefererGeral() {
        $referer = $this->getController()->getRequest()->referer();
        $atualUrl = $this->getController()->getRequest()->getPath();
        if(empty($this->getController()->getRequest()->getSession()->read('Urls.geral'))) {
            $this->getController()->getRequest()->getSession()->write('Urls.geral', $referer);
        }
    }

    public function getRedirectUrlByParamsGeral($default = ['action'=>'index']) {
        $atualUrl = $this->getController()->getRequest()->getPath();
        $ses = $this->getController()->getRequest()->getSession()->read('Urls.geral');
        $this->getController()->getRequest()->getSession()->delete('Urls.geral');
        if (!empty($ses)) {
            $default = $ses;
        }
        return $default;
    }

}

?>
