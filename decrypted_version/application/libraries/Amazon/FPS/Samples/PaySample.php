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
echo "25<br>";
include_once ('.config.inc.php'); 

/************************************************************************
 * Instantiate Implementation of Amazon FPS
 * 
 * AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY constants 
 * are defined in the .config.inc.php located in the same 
 * directory as this sample
 ***********************************************************************/
 $service = new Amazon_FPS_Client(AWS_ACCESS_KEY_ID, 
                                       AWS_SECRET_ACCESS_KEY);
 echo "38<br>";
/************************************************************************
 * Uncomment to try out Mock Service that simulates Amazon_FPS
 * responses without calling Amazon_FPS service.
 *
 * Responses are loaded from local XML files. You can tweak XML files to
 * experiment with various outputs during development
 *
 * XML files available under /home/fgiba0/public_html/amazon/Amazon/FPS/Mock tree
 *
 ***********************************************************************/
 // $service = new Amazon_FPS_Mock();

/************************************************************************
 * Setup request parameters and uncomment invoke to try out 
 * sample for Pay Action
 ***********************************************************************/
 echo "55<br>";
$request =  new Amazon_FPS_Model_PayRequest();
$recipient_token_id="LSUGQ1L7MHD27CRIING322JI9PFEDMWDMLZVV57CH8NE82QIIIIFVFRG7YP5FIKG";
$request->setSenderTokenId('IS31E82NCGVTQNXTU7NP73UKLZHZEDJTXZIKSKGQ5H44UTQKHRQXECTGCUWIB7E5');//set the proper senderToken here.
//$request->setRecipientTokenId($recipient_token_id);//set the proper recipeintToken here.
$amount = new Amazon_FPS_Model_Amount();
$amount->setCurrencyCode("USD");
$amount->setValue('500'); //set the transaction amount here;
$request->setTransactionAmount($amount);
$request->setCallerReference('Caller-1311945393.3958'); //set the unique caller reference here.
 echo "65<br>"    ;          
 // object or array of parameters
  invokePay($service, $request);

  echo "68<br>"    ;                                                                                              
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
       echo "80<br>"    ;  
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
                                