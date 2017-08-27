<?php 

include ('connector.php');

$filename = GUID();
$filename .= '.mp3';
$targetDirectory = 'uploads/';
$targetFile = '';

	if (isset($_FILES['file'])) {
		$targetFile = $targetDirectory . $filename;
		if (!file_exists($targetFile)){
			// echo $targetFile;
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
				echo basename($_FILES["file"]["tmp_name"]) . 'was uploaded';
			} else {
				echo 'didnt upload';
			}
		}
	}

    exit();



function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

?>