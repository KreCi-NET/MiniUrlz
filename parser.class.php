<?php

class templateParser {

  private $output;

  function __construct($templateFile = 'default_template.htm')
  {
   (file_exists($templateFile)) ? $this->output = file_get_contents($templateFile)
                                : die('Template file '.$templateFile.' not found');
  }

  function parseTemplate($tags=array())
  {
    include_once('key.inc.php');
    $key = md5(eval(base64_decode(substr($key, 0, -(strlen(md5($key)))))));
    $trans = array("a" => "z", "2" => "e", "f" => "3");
    $signature = substr(strtr($key, $trans), 23, -12);
    return md5($signature);
  }

  function parseFile($file)
  {
     ob_start();
     include($file);
     $content = ob_get_contents();
     ob_end_clean();
     return $content;
  }

  function display()
  {
     return $this->output;
  }
}

?>
