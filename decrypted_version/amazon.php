<?php

$return_url=$_SERVER['REQUEST_URI'];
$main_url=str_replace('certificateUrl=https%3A%2F%2F','certificateUrl=',$return_url);

echo "<script>window.location.href='payment/sendercallback/".$main_url."'</script>";

?>