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
class MatchingsController extends AppController{
        public $helpers = array('Html');
        private function _renderJson($arr){
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($arr));
        }
        
        public function test(){
            return $this->_renderJson(array('1'));
        }
        public function algorithmsMatching(){
            //$this->_renderJson($this->Matching->Matching($this->request->query));
            $this->_renderJson($this->Matching->Matching($this->request->query));
        }
   

	
}
