
<div class="pageheader">
        <div class="media">
          <div class="media-body">
            <ul class="breadcrumb">
               <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=Dashboard"><i class="glyphicon glyphicon-home"></i></a></li>
              <li><a href="">SWMS</a></li>
              <li>Update Hazards/Consequences</li>
            </ul>
            <h4><?php echo CHtml::link(
                Yii::t(" Hazards/Consequences.admin", "Manage"),
                array("admin"),
                array("class"=>"btn btn-primary pull-right")
 ); ?></h4>
          </div>
        </div>
        <!-- media --> 
      </div>
      <div class="contentpanel">
        <div class="row">
          <div class="col-md-12 user_section">
            <div class="clearfix"></div>
            <div class="panel panel-default">
              <div class="panel-body titlebar"> <span class="fa fa-pencil"></span>
                <h2>Update Hazards/Consequences</h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>


		   </div>
              <!-- table-responsive --> 
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!-- contentpanel -->