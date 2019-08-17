<?php
// Include the SDK using the composer autoloader
require 'vendor/autoload.php';

$s3 = new Aws\S3\S3Client([
	'region'  => 'eu-central-1',
	'version' => 'latest',
	'credentials' => [
	    'key'    => "AKIAJRP4PAFQ3YXUPE3Q",
	    'secret' => "r5hXfUMbA2k6j744I1sA0/IQVM9O0iRe9T+h7y4l",
	]
]);

// Send a PutObject request and get the result object.
$key = '-- your filename --';

$result = $s3->putObject([
	'Bucket' => '-- bucket name --',
	'Key'    => $key,
	'Body'   => 'this is the body!',
	//'SourceFile' => 'c:\samplefile.png' -- use this if you want to upload a file from a local location
]);

// Print the body of the result by indexing into the result object.
var_dump($result);