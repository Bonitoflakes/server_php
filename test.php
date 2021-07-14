<?php
$folder = 'examples';

// Get the list of all of file names
// in the folder.
$files = glob($folder . '/*');
var_dump($files);
// Loop through the file list
foreach($files as $file) {

    // Check for file
    if(is_file($file)) {

        // Use unlink function to
        // delete the file.
        unlink($file);
    }
}