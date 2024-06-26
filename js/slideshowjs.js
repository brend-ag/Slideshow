function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

//Creates and displays the slides
function createSlides(template, imgs, caps){
  for (let i = 0; i < imgs.length; i++){
    var slideNew = slideTemp;
    slideNew = slideNew.replace(/currN/g, i + 1);
    slideNew = slideNew.replace(/totalN/g, imgs.length);
  //  slideNew = slideNew.replace(/currI/g, imgs[i]);
    slideNew = slideNew.replace(/currC/g, caps[i]);

    document.getElementById("slides").innerHTML+=slideNew;
  }
}

//Creates and displays the dots to navigate the slides
function createDots(template, imgs){
  for (let i = 0; i < images.length; i++){
    var dotNew = dotTemp;
    dotNew = dotNew.replace(/nextSlide/g, "currentSlide("+ (i+1) + ")");  //added quotes in order to have i + 1 differentiated from the string
    document.getElementById("dots").innerHTML+=dotNew;
  //  console.log("after replace ", dotNew);
  }
}

//Used to display the initial slide in the slideshow
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}

  //otherwise:
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
