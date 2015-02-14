<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     Amazon_FPS
 *  @copyright   Copyright 2008-2009 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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
 *  Generated: Wed Jun 15 05:50:14 GMT+00:00 2011
 * 
 */

/**
 * Pay  Sample
 */
//echo "25<br>";
class PaySample {
	
		
		//constructor method.
		function PaySample()
		{
			include_once ('.config.inc.php'); 
			
			
			
			 // echo "68<br>"    ;   
		}
/**
  * Pay Action Sample
  * 
  * Allows calling applications to move money from a sender to a recipient.
  *   
  * @param Amazon_FPS_Interface $service instance of Amazon_FPS_Interface
  * @param mixed $request Amazon_FPS_Model_Pay or array of parameters
  */
				  function invokePay(Amazon_FPS_Interface $service, $request) 
				  {
					  // echo "80<br>"    ;  
					  try {
							  $response = $service->pay($request);
							   echo "83<br>"    ;  
								echo ("Service Response\n");
								echo ("=============================================================================\n");
				
								echo("        PayResponse\n");
								if ($response->isSetPayResult()) { 
									echo("            PayResult\n");
									$payResult = $response->getPayResult();
									if ($payResult->isSetTransactionId()) 
									{
										echo("                TransactionId\n");
										echo("                    " . $payResult->getTransactionId() . "\n");
									}
									if ($payResult->isSetTransactionStatus()) 
									{
										echo("                TransactionStatus\n");
										echo("                    " . $payResult->getTransactionStatus() . "\n");
									}
								} 
								if ($response->isSetResponseMetadata()) { 
									echo("            ResponseMetadata\n");
									$responseMetadata = $response->getResponseMetadata();
									if ($responseMetadata->isSetRequestId()) 
									{
										echo("                RequestId\n");
										echo("                    " . $responseMetadata->getRequestId() . "\n");
									}
								} 
				
						 } catch (Amazon_FPS_Exception $ex) {
							 echo("Caught Exception: " . $ex->getMessage() . "\n");
							 echo("Response Status Code: " . $ex->getStatusCode() . "\n");
							 echo("Error Code: " . $ex->getErrorCode() . "\n");
							 echo("Error Type: " . $ex->getErrorType() . "\n");
							 echo("Request ID: " . $ex->getRequestId() . "\n");
							 echo("XML: " . $ex->getXML() . "\n");
						 }
				 }                             
								
								
								
		
}