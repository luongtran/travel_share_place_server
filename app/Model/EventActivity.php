<?php
App::uses('AppModel', 'Model');
/**
 * EventActivity Model
 *
 */
class EventActivity extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'event_activity';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        public function getNameEventById($event_id){
            $name_event=$this->find('all',array(
                'conditions'=>array('id'=>$event_id),
            ));
            if(count($name_event)==0)
                return 0;
            return $name_event[0]['EventActivity']['event_name'];
        }
}
