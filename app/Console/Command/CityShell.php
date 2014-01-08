<?php

App::uses('Shell', 'Console');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CityShell
 *
 * @author Administrator
 */

class CityShell extends Shell {
    public $City = array('City');
    public function main() {
        $cities=  $this->City->find('all',array(
                'recursive'=>-1
            ));
        
    }
}
