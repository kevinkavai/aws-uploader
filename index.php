<?php
	if(isset($_FILES['image'])){
		$file_name = $_FILES['image']['name'];   
		$temp_file_location = $_FILES['image']['tmp_name']; 

		require 'vendor/autoload.php';

		// $s3 = new Aws\S3\S3Client([
		// 	'region'  => '-- your region --',
		// 	'version' => 'latest',
		// 	'credentials' => [
		// 		'key'    => "-- access key id --",
		// 		'secret' => "-- secret access key --",
		// 	]
        // ]);	
        
        $s3 = new Aws\S3\S3Client([
            'region'  => 'eu-central-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => "XXXXXXXXXXXXXXXXXX",
                'secret' => "r5hXXXXXXXXXXXXXXXXXXXXXXXXXXXXX4l",
            ]
        ]);

		$result = $s3->putObject([
			'Bucket' => 'oimediabackups',
			'Key'    => $file_name,
			'SourceFile' => $temp_file_location			
		]);

		// var_dump($result);
	}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Open Institute AWS Uploader</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<div id="uploader">
    <h4>Open Institute AWS Uploader</h4>
    <h5>Add file to upload</h5>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">         
        <!-- <input type="file" name="image" />
        <input class="btn btn-success" type="submit"/> -->
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
            </div>

            <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">Submit</button>
            </div>
        </div>

    </form> 
</div>

<style>
#uploader{
    border: 1px dotted #3d3d3d;
    width: 50%;
    margin: auto;
    position: fixed;
    top: 35%;
    right: 25%;
    padding: 1% 2%;

}

#uploader h3{
    text-align: center;
}
</style>

</html>