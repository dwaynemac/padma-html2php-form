<?php
$url = "https://crm.padm.am/api/v1/form_integration";
$api_key = "providenciar-do-administrador-padma";

$fields = array_merge($_POST,array('api_key' => $api_key));

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string,'&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // to avoid curl_exec echoing

//execute post
$result = curl_exec($ch);
$error = curl_errno($ch) ? curl_error($ch) : '';

$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if($httpcode == 201){
    // SUCCESS
    print "ok! redirect o render something here.";
} else {
    // FAIL
    print "ups, failed! redirect o render something here.";
};

// print $result;
// print $httpcode;

?>
