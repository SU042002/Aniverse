let slideIndex = Math.floor(Math.random() * 5) + 1;
/*makes the slide index a random number that a random image is loaded on each load of the index page*/
showSlides(slideIndex);
/*the function used to show the slide*/
/*takes a number as a parameter, this is where the slide starts*/

function plusSlides(n) {
    /*this method takes either a parameter of 1 or minus 1*/
    showSlides(slideIndex += n);
    /*this either subtracts 1 or adds 1 to the show slides*/
    /*this is what moves the slide back or forward using the buttons*/
    /*this function is used for the buttons*/
}

function showSlides(n) {
    let slides = document.getElementsByClassName("slides");
    /*this returns an array of all the images*/
    if (n > slides.length) {slideIndex = 1}
    /*this restarts the slide based on the length of the slides or how many images there are*/
    if (n < 1) {slideIndex = slides.length}
    /*if it's smaller than the slide index is changed to the amount of images*/

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    /*the for loop is used to hide every single image using a css property*/

    slides[slideIndex-1].style.display = "block";
    /*the image is then displayed using the css property*/
    /*the index is then used to display the specific slide, minus 1 is because it is an array and array starts at 0*/
}