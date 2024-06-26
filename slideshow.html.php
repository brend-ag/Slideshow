<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/slideshowcss.css" type="text/css">

  <?php
   ini_set('display_errors','On');
   error_reporting(E_ALL);

   $imgPathsArray = glob("images/*.{jpg,png,PNG}", GLOB_BRACE);
   $imgArrLength = count($imgPathsArray);
   $imgPathsStr = implode(" ", $imgPathsArray);

   $dir = realpath("captionFiles/");
   $capPathArray = scandir($dir);
   $capArrLength = count($capPathArray);
   $captions = [];

   /*Foreach loop adds each file name to the captions array by trimming the filetype extension of the values*/
   foreach ($capPathArray as $x =>$val){
     /*If trimming a file named "." (a hidden file) results in an
      empty string continue so it's not added to the array */
     if (rtrim($val, ".") == ""){
       continue;
     }
     //Otherwise, trim from the right to remove the txt file type and add the file name to the array
     $captions[] = rtrim($val, "txt");
   }
    //Constant dimensions
    define("IMGWIDTH", "100%");
    $slideTemp = '<div class="mySlides fade"> <div class="numbertext">currN / totalN</div> <img src="currI" style="width:100%"> <div class="text">currC</div> </div>';

   include "php/slideshow.php";

   ?>
</head>
<body>
<!-- Slides and arrows div -->
<div id ="slides" class="slideshow-container">
  <?php
    echo makeSlides($slideTemp, $imgArrLength, $imgPathsArray, $captions);
  ?>
  <!-- Previous and next slide arrow buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>


<!-- Dots div -->
<div id = "dots" style="text-align:center">
</div>
<p> Thank you to <a href="https://stackoverflow.com/questions/5966746/best-way-to-initialize-empty-array-in-php">this</a> link for helping me with the captions array. </p>
<script src="js/slideshowjs.js"></script>

<script>
  var pathsStr =  "<?php echo $imgPathsStr;?>";
  const images = pathsStr.split(" ");

  var dotTemp = '<span class="dot" onclick="nextSlide"></span>';

  createDots(dotTemp, images);

  //Display the initial slide
  var slideIndex = 1;
  showSlides(slideIndex);

</script>

</body>
</html>
