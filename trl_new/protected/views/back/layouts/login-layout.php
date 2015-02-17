<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <style type="text/css">
html, body {
	background:#FFF;
height: 100%;
margin: 0; padding: 0;
}
</style>
	
</head>

<body marginwidth="0" marginheight="0" >
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle">
    <div class="container" id="page" style="border:none;">
			<div id="login" class="login">
        <div id="logo">
        <a href="<?php echo Yii::app()->getBaseUrl(true); ?>">
        <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/css/back/images/trl-logo.png" alt="<?php echo CHtml::encode(Yii::app()->name); ?>"/>
		</a>
       </div>
	<?php echo $content; ?>

</div>

</div>
    
    </td>
  </tr>
</table>

<!-- page -->

</body>
</html>
