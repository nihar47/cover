<?php
class UHelper
{
        /**
         * attributeToggler 
         *
         * For CGridView
         * 
         * @param CActiveRecord $model 
         * @param string $attribute 
         * @param array $values - ("On", "Off") or ("Yes", "No") or ("Grant Access","Access Denied") etc.
         * @return CHtml::ajaxLink
         */
        public static function attributeToggler($model, $attribute, $values = array('Grant Access', 'Access Denied'))
        {
                if ($model->{$attribute} == 1) 
                {
                        return CHtml::ajaxLink(
                                "<span class='label label-success'>".$values[0]."</span>",
                                array('toggleState', 'user_id'=>$model->user_id, 'attribute'=>$attribute, 'value'=>0),
                                array('success'=>"reloadGrid")
                        );
                } 
                else 
                {
                        return CHtml::ajaxLink(
                                "<span class='label label-warning'>".$values[1]."</span>",
                                array('toggleState', 'user_id'=>$model->user_id, 'attribute'=>$attribute, 'value'=>1),
                                array('success'=>"reloadGrid")
                        );
                }
        }
}
