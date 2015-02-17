<?php
if(isset($data['PageDetails']) && is_array($data['PageDetails']) && count($data['PageDetails'] == 1)) {
extract($data['PageDetails']);

	$this->pageTitle = 'TRL - '. $Page_Name;
    Yii::app()->clientScript->registerMetaTag($Meta_Keywords, 'keywords');
	Yii::app()->clientScript->registerMetaTag($Meta_Description, 'description');

?>

<section class="wrapper_bg about_page">
	<section class="container">
<?php
echo html_entity_decode($Page_Description);
}
?>
</section>
</section>