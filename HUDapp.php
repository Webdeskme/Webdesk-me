<h1>Apps</h1>
    <hr><br>
<?php 
$wd = 0;
$wd_tier = test_input($wd_tier);
$wd_tierFile = $wd_admin . $wd_tier . '.json';
if(file_exists($wd_tierFile)){$wd_tierobj=json_decode(file_get_contents($wd_tierFile)); $wd_obj = $wd_tierobj;} 
else{
$wd_tierobj = "";
$wd_obj = "";
}
foreach (scandir('Apps/') as $entry){
                    if ($entry != "." && $entry != "..") {
                        if(!file_exists($wd_tierFile)){$wd_teatobj = 0;}
                        elseif(isset($wd_obj->$entry) && $wd_obj->$entry == 'Yes'){$wd_teatobj = 1;}
                        else{$wd_teatobj = 0;}
                        if($wd_tier === 'tA' || $wd_teatobj === 1){
						$wd = $wd + 1;
?>
<figure id="wd_<?php echo $wd; ?>" style="float: left; padding: 10px;">
    <a href="<?php wd_url('Apps', $entry, 'start.php', ''); ?>"><img src="Apps/<?php echo $entry; ?>/ic.png" style="height: 50px; width: 50px;"></a>
<figcaption style="text-align: center;"><a href="<?php wd_url('Apps', $entry, 'start.php', ''); ?>" title="<?php echo $entry; ?>" style="font-size: 0.5em; text-decoration: none;"><?php echo $entry; ?></a></figcaption>
</figure>
<?php
                    }
else{
    if(isset($_GET['app']) && $_GET['app'] == $entry){
        //header('Location: desktop.php?wd_aw=Do not try to hack the system.');
        exit('Do not try to hack the system');
    }
}
                    }
                }
?>
    <div style="width: 100%; clear: both;"><h1>My Apps</h1>
    <hr></div>
<?php 
foreach (scandir('MyApps/') as $entry){
                    if ($entry != "." && $entry != "..") {
                      $tentry = 'myApp_' . $entry;
                        if(!file_exists($wd_tierFile)){$wd_teatobj = 0;}
                        elseif(isset($wd_obj->$tentry) && $wd_obj->$tentry == 'Yes'){$wd_teatobj = 1;}
                        else{$wd_teatobj = 0;}
                        if($wd_tier === 'tA' || $wd_teatobj === 1){
?>
<figure id="wd_m<?php echo $wd; ?>" style="float: left; padding: 10px;">
    <a href="<?php wd_url('MyApps', $entry, 'start.php', ''); ?>"><img <?php if(file_exists("MyApps/" . $entry . "/ic.png")){ ?>src="MyApps/<?php echo $entry; ?>/ic.png" <?php } else{ ?> src="Apps/Dev/ic.png" <?php } ?> style="height: 50px; width: 50px;"></a>
<figcaption style="text-align: center;"><a href="<?php wd_url('MyApps', $entry, 'start.php', ''); ?>" title="<?php echo $entry; ?>" style="font-size: 0.5em; text-decoration: none;"><?php echo $entry; ?></a></figcaption>
</figure>
<?php
                    }}
                }
?>