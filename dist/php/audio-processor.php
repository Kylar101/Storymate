<?php 

include ('connector.php');

if(isset($_FILES['file']) and !$_FILES['file']['error']){
    $fname = "11" . ".mp3";
    
    move_uploaded_file($_FILES['file']['tmp_name'], "../ext/wav/testes/" . $fname);
    return 'working';
}
?>