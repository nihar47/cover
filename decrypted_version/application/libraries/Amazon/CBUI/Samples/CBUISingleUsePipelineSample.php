<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     Amazon_FPS
 *  @copyright   Copyright 2008-2011 Amazon Technologies, Inc.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2010-08-28
 */
/******************************************************************************* 
 *    __  _    _  ___ 
 *   (  )( \/\/ )/ __)
 *   /__\ \    / \__ \
 *  (_)(_) \/\/  (___/
 * 
 *  Amazon FPS PHP5 Library
 * 
 */

require_once('.config.inc.php');

require_once('Amazon/CBUI/CBUISingleUsePipeline.php');

class CBUISingleUsePipelineSample {

    function test() {
        $pipeline = new Amazon_FPS_CBUISingleUsePipeline(AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY);
$uniqueId = 'Caller-'.microtime(true);

        $pipeline->setMandatoryParameters($uniqueId,  
                "http://fgibaroda.com/amazon/callback.php", "500");
        
        //optional parameters
        $pipeline->addParameter("currencyCode", "USD");
        $pipeline->addParameter("paymentReason", "HarryPotter 1-5 DVD set");
		$url=$pipeline->getUrl();
         //echo $cururlpage= substr($url,strpos($url,"cyCode")-3,6);
        //SingleUse url
		// page_redirect($url);
        print "Sample CBUI url for SingleUse pipeline : " . str_replace("¤cyCode","&currencyCode",$pipeline->getUrl()) . "\n";
    }
}
function page_redirect($page)
	{
	
		print "<script>";
		print "location = '$page'";
		print "</script>";	
		header ("Location : $page");
	}
CBUISingleUsePipelineSample::test();
