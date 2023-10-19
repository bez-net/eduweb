<?php
include 'dbConfig.php';
$statusMsg = '';

if(isset($_POST['submit'])){
    // File upload configuration
    $targetDir = "../uploads/";
    $allowTypes = array('jpg','png','jpeg','gif');

    function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

    $groupid=trim($_POST['groupid']);
     $title=clean($_POST['title']);
      $details=clean($_POST['details']);
    $images_arr = array();
    foreach($_FILES['images']['name'] as $key=>$val){
        $image_name = $_FILES['images']['name'][$key];
        $tmp_name   = $_FILES['images']['tmp_name'][$key];
        $size       = $_FILES['images']['size'][$key];
        $type       = $_FILES['images']['type'][$key];
        $error      = $_FILES['images']['error'][$key];
        
        // File upload path
        $fileName = basename($_FILES['images']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;
        
        // Check whether file type is valid
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(in_array($fileType, $allowTypes)){   
            // Store images on the server
            if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$targetFilePath)){
                $images_arr[] = $targetFilePath;
                $category="2";
                $insert = $db->query("INSERT into images (file_name, uploaded_on,groupid,title,details,category) VALUES ('".$targetFilePath."', NOW(),'".$groupid."','".$title."','".$details."','".$category."')");

                if($insert){
                    $count = $key + 1;
                    $statusMsg = " ".$count. " image file has been uploaded successfully.";
                }else{
                    $statusMsg = "Failed to upload image";
                } 
                
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    }
    

}
?>