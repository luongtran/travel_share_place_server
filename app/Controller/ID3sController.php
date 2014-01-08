<?php
App::uses('AppController', 'Controller');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ID3sController
 *
 * @author Administrator
 */
class ID3sController extends AppController{
    //put your code here
    public $uses=array('Circumstance','ID3');
    public $components = array('Paginator','RequestHandler');
    public $helpers = array('Html');
    //public $component=array('paginate');
    public function index() {
        $this->Circumstance->recursive = 0;
        $this->set('circumstances', $this->Paginator->paginate());
    }
     public function matching() {
        pr($this->ID3->RunID3());
        
    }
   

	
}
