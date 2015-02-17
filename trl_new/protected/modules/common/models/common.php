<?php

/*
* Class : Common
* Inclueded all common functions
*/

class Common extends CActiveRecord
{

	public function tableName()
	{
		return '{{pages}}';
	}

/*
Returns single row in select query	
*/
	public function getSelectQueryRowDetails($table ='',$select_fields ='',$condition ='',$order_by= '') {
	
			$connection = Yii::app()->db; 
	
			if(isset($table) && !empty($table) && isset($select_fields) && !empty($select_fields)) {
			$query = "SELECT ".$select_fields." FROM ".$table;
			}
			
			if(isset($condition) && !empty($condition)) {
			$query = $query." Where ".$condition;
			}
				
			if(isset($order_by) && !empty($order_by)) {
			$query = $query." order by ".$order_by;
			}
	
			$result  = $connection->createCommand($query)->queryRow();
			return $result;
	}

/*
Returns multiple row in select query	
*/	
	public function getSelectQueryDetails($table ='',$select_fields ='',$condition ='',$order_by= '') {
	
			$connection = Yii::app()->db; 
	
			if(isset($table) && !empty($table) && isset($select_fields) && !empty($select_fields)) {
			$query = "SELECT ".$select_fields." FROM ".$table;
			}
			
			if(isset($condition) && !empty($condition)) {
			$query = $query." Where ".$condition;
			}
				
			if(isset($order_by) && !empty($order_by)) {
			$query = $query." order by ".$order_by;
			}
	
			$result  = $connection->createCommand($query)->queryAll();
			return $result;
	}
	

}
