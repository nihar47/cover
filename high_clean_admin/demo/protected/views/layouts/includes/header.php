<header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="dashboard.php" class="logo">
                        High Clean
                    </a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                <div class="header-right">
                    <div class="pull-right">
                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> <?php 
							if (isset(Yii::app()->user->first_name)):  
                            echo 'Hi, '.Yii::app()->user->first_name;
                            endif 
							?> <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=User/default/update&id=<?php echo Yii::app()->user->id; ?>"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                              <li class="divider"></li>
                              <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/?r=site/logout"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                            </ul>
                        </div><!-- btn-group -->
                    </div><!-- pull-right -->
                </div><!-- header-right -->
            </div><!-- headerwrapper -->
        </header>
        
