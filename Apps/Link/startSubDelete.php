<?php 
$file = test_input($_GET['file']);
if(file_exists($wd_appr . $wd_app . '/' . $file)){
  unlink($wd_appr . $wd_app . '/' . $file);
}
wd_head($wd_type, $wd_app, 'start.php', '&me=on');
?>