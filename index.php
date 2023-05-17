<?php

///// Include all functions /////

require_once 'functions.inc.php';
require_once 'parser.class.php';

/////////////////////////////////

if (isset($_POST['submit'])){
  if (checkurl($_POST['url'])) {
    if (isset($_POST['tag']) and ($_POST['tag']!=='') and ($_POST['url']!=='')){
     $sysinfo = addlinkmain($_POST['url'], $_POST['tag']);
    } elseif ($_POST['url']!=='') {
     $sysinfo = addlinkmain($_POST['url']);    
    } else {
     $sysinfo = "Please put your URL first!";
    }
  } else {
    $sysinfo = 'Invalid URL! Remeber to put "http://" on the beggining!';
  }
}

if (!isset($sysinfo))$sysinfo='';

$tp=new templateParser('template.html');

// You may add your tags to this array
$tags=array('status_info'=>$sysinfo);

$tp->parseTemplate($tags);
echo $tp->display();

?>
