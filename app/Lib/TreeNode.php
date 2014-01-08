<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TreeNode
 *
 * @author Administrator
 */
class TreeNode{
    public $label;
    public $arr_children;
   // public $level;
    //public $arr_Node;
    
    public function __construct($label,$arr_children) {
        $this->label=$label;
        $this->arr_children=$arr_children;
       // $this->level=$level;
    }

    public function addNode(){
       // $arr=array('label'=>array($this->label),'Children'=>array($this->arr_children), 'level'=>array($this->level));
        $arr=array($this->label,$this->arr_children);
        return $arr;
    }
    public function getLabel(){
        return $this->label;
    }
//    public function getLevel(){
//        return $this->level;
//    }
    public function getChildren(){
        return $this->children;
    }
    
    
}
