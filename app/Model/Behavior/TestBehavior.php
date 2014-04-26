<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP TestBehavior
 * @author mori
 */
class TestBehavior extends ModelBehavior {

    public function setup($model, $settings = array()) {
        if (!isset($this->settings[$model->alias])) {
            $this->settings[$model->alias] = array(
                'option_01' => 'option_default_01',
                'option_02' => 'option_default_02'
            );
        }

        $this->settings[$model->alias] = array_merge(
                $this->settings[$model->alias], (array) $settings);
    }
    
    public function checkSetup(Model $model, $arg1) {
        return 'ok';
    }
    

    public function cleanup($model) {
        parent::cleanup($model);
    }

//	public function beforeFind($model, $query){
//
//	}

    public function afterFind($model, $results, $primary) {
        
    }

//	public function beforeValidate($model){
//
//	}
//	public function beforeSave($model){
//
//	}
//	public function afterSave($model, $created){
//
//	}
//	public function beforeDelete($model, $cascade = true){
//
//	}

    public function afterDelete($model) {
        
    }

    public function onError($model, $error) {
        
    }

}
