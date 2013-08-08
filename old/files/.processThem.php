<?php
$error_message[0] = "Unknown problem with upload.";
$error_message[1] = "Uploaded file too large (load_max_filesize).";
$error_message[2] = "Uploaded file too large (MAX_FILE_SIZE).";
$error_message[3] = "File was only partially uploaded.";
$error_message[4] = "Choose a file to upload.";

$upload_dir  = './tmp/';
$num_files = count($_FILES['upload']['name']);

for ($i=0; $i < $num_files; $i++) {
    $upload_file = $upload_dir . urlencode(basename($_FILES['upload']['name'][$i]));

	if (@is_uploaded_file($_FILES['upload']['tmp_name'][$i])) {
		if (@move_uploaded_file($_FILES['upload']['tmp_name'][$i], 
			$upload_file)) {
			/* Great success... */
			echo "hooray";
			//$content = file_get_contents($upload_file);
			//print $content;
		} else {
			print $error_message[$_FILES['upload']['error'][$i]];
		}
	} else {
		print $error_message[$_FILES['upload']['error'][$i]];
	}  
}
?>