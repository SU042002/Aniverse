const coll = document.getElementsByClassName("section");
/*this returns an array of all the sections using the class name*/
/*used to target each collapsible*/
let i;
/*initializes a variable i*/

for (i = 0; i < coll.length; i++) {
    /*all the sections are targeted*/
    coll[i].addEventListener("click", function () {
        /*each of the sections divs are targeted*/
        /*an event listener is assigned to click*/
        /*when the user presses click, a function happens*/
        this.classList.toggle("active");
        /*if the click is initiated, the css is toggled so that the colour of the active section is changed using css*/
        let content = this.nextElementSibling;
        /*this targets the element below the section or the actual content, in this instance that is the information
        or paragraph.*/
        if (content.style.display === "block") {
            content.style.display = "none";
            /*if the content is already showing when the click is pressed, then it is hidden using css property*/
        } else {
            content.style.display = "block";
            /*if the content is already hidden like it is initially with the css, then if clicked this will make the
            * content visible.*/
        }
    });
}