<?php
/**
* @param template The string template for one slide
* @param imgArrayLength The length of the input image array
* @param imgs The images array
* @param caps The caption array
*/

function makeSlides($template, $imgArrayLength, $imgs, $caps){
  $allSlides = "";
  for($i = 0; $i < $imgArrayLength; $i++){
    $slideNew = $template;
    $slideNew = str_replace("currN", $i + 1, $slideNew);
    $slideNew = str_replace("totalN", $imgArrayLength, $slideNew);
    $slideNew = str_replace("currI", $imgs[$i], $slideNew);
    $slideNew = str_replace("currC", $caps[$i], $slideNew);
    $allSlides .= $slideNew;
  }
  return $allSlides;
}

?>
