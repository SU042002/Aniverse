<?php
session_start();
require_once "php/basket_functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aniverse</title>
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/main%20footer.css">
    <link rel="stylesheet" href="css/help.css">
    <!--This script is needed for the collapsable when the buttons are pressed below-->
    <script src="js/help.js" defer></script>
    <!--If defer is not used, the JavaScript function will run before everything
is loaded and this will in turn make the slideshow not work as intended.
It will not load the first Image properly. By using defer it loads all the HTML
and then executes the Javascript so everything works as intended-->
</head>
<body>
<?php require "header.php"; ?>

<!--ALL THIS DUMMY TEXT WAS GENERATED FROM Lorem Ipsum-->
<!--This is a table containing all the key people of the company (or not)-->
<!--The table also contains mailto links for all the people so that they can be contacted-->

<h2>IF YOU HAVE ISSUES YOU MAY CONTACT:</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Contact</th>
    </tr>
    <tr>
        <td>Sameer Uddin</td>
        <td>Chief executive officer</td>
        <td><p><a href="mailto:sameer@email.com">Send email</a></p></td>
    </tr>
    <tr>
        <td>Joe Mama</td>
        <td>Human resources manager</td>
        <td><p><a href="mailto:joe@email.com">Send email</a></p></td>
    </tr>
    <tr>
        <td>Chris Biden</td>
        <td>Information technology manager</td>
        <td><p><a href="mailto:chris@email.com">Send email</a></p></td>
    </tr>
    <tr>
        <td>Money Mark</td>
        <td>Marketing manager</td>
        <td><p><a href="mailto:money@email.com">Send email</a></p></td>
    </tr>
    <tr>
        <td>Markass Brownlee</td>
        <td>Product manager</td>
        <td><p><a href="mailto:brownlee@email.com">Send email</a></p></td>
    </tr>
    <tr>
        <td>Naruto Uzumaki</td>
        <td>Sales manager</td>
        <td><p><a href="mailto:naruto@email.com">Send email</a></p></td>
    </tr>
</table>

<!--All the separate sections are buttons. The idea is that these are collapsable and the buttons allow for this
to happen-->
<!--The buttons all have paragraphs below them that are either shown or not displayed depending on if they were clicked
or not-->
<!--The javascript file at the top of this page hides or shows the paragraph depending on the state of the button -->
<!--All of this is repeated multiple times to fill this help section with information-->

<h2>FREQUENTLY ASKED QUESTIONS</h2>
<button type="button" class="section">Where is my order? (USE OF ORDERED LIST AND UNORDERED LIST)</button>
<div class="information">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sed lacus blandit, interdum orci ac, commodo arcu.
        Donec ac nulla nec velit vestibulum auctor ullamcorper in neque. Nulla vel enim nulla. Vivamus convallis nibh in
        varius interdum. Quisque eget mi a lacus iaculis hendrerit. Fusce nec congue ligula. Sed eget dapibus augue.
        Praesent dolor nisl, imperdiet vitae justo vel, interdum placerat ligula. Etiam suscipit congue felis, vitae
        pretium ipsum semper eget. Nam sit amet bibendum purus. Sed imperdiet turpis eget sapien hendrerit dictum. Ut
        consectetur sagittis ex eget blandit.</p>
    <br>
    <h3>Check with these services to find your order:</h3>
    <ul>
        <li>Royal Mail</li>
        <li>Hermes</li>
        <li>DPD</li>
    </ul>
    <br>
    <h3>If they were not helpful, follow these steps:</h3>
    <ol type="a">
        <li>Contact Customer Service</li>
        <li>Drink Tea</li>
        <li>Have a Red Bull</li>
    </ol>
</div>

<button type="button" class="section">What will happen to my gift card?</button>
<div class="information">
    <p>Vestibulum finibus convallis tincidunt. Cras laoreet tempus pretium. Aliquam ante libero, semper nec porttitor
        eget, pretium vehicula neque. Vestibulum et suscipit turpis, non mattis tortor. Nunc eget turpis finibus,
        bibendum mi nec, euismod leo. Praesent at tincidunt turpis, sit amet porttitor purus. Proin eget odio non libero
        egestas viverra. Ut dapibus nisi a quam vestibulum, et volutpat ex rhoncus. Ut pretium dictum aliquam. Sed
        iaculis lobortis urna ac convallis. Aenean aliquam venenatis libero vitae ullamcorper. Nulla facilisi. Phasellus
        sem lorem, blandit ut tincidunt id, convallis sit amet lorem. Sed fermentum imperdiet nulla eget ornare. Quisque
        rutrum mauris in vulputate mattis.</p>
</div>

<button type="button" class="section">When will my order arrive?</button>
<div class="information">
    <p> It will not arrive. Vestibulum diam magna, consequat posuere tempor et, euismod vitae nulla. Aenean tincidunt
        dolor finibus erat semper, ac efficitur felis placerat. Vivamus non tortor dignissim, tristique neque id,
        sagittis sem. Aliquam erat volutpat. Duis pretium sem sit amet nibh placerat, at finibus sem tincidunt. Integer
        condimentum ligula quis massa dapibus tempus.

        <br><br>

        Nulla hendrerit magna risus, nec euismod lectus molestie id.
        Aenean sodales venenatis nisl eget egestas. Aenean eu odio sit amet velit faucibus cursus. In vitae consectetur
        libero, vitae imperdiet est. Nam sit amet scelerisque lorem, a porta magna. Proin non dui faucibus, ullamcorper
        elit in, viverra velit. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus
        et ultrices posuere cubilia curae; Donec tincidunt placerat orci, sed vestibulum est viverra et.</p>
</div>

<button type="button" class="section">How long do orders take to get fulfilled?</button>
<div class="information">
    <p>Sed vitae sem sed mauris feugiat placerat ut nec lectus. Nam non aliquam libero, et ultricies mauris. Aliquam
        pellentesque nisi molestie dolor vestibulum, sed pharetra mauris finibus. Phasellus varius ultricies elit vitae
        vestibulum. Nulla posuere semper lorem sed rutrum. Cras odio turpis, convallis sit amet porttitor at, vulputate
        vel lorem. Vestibulum ullamcorper sem nisi, vel tincidunt arcu ultricies sed.</p>
</div>

<button type="button" class="section">How do I recieve my benefits?</button>
<div class="information">
    <p>Vestibulum id eleifend ex. Phasellus et metus magna. Suspendisse sed magna ut eros lobortis tempor nec at metus.
        Etiam sed est gravida, ornare ex eget, ornare metus. Duis volutpat dolor ut sollicitudin gravida. Maecenas
        rhoncus enim erat, sit amet volutpat arcu posuere vel. Curabitur est lacus, lacinia sit amet porttitor ut,
        tempus a purus. Etiam tellus tellus, faucibus et aliquet in, cursus ac metus. Sed ac ligula lobortis, tempor ex
        sed, condimentum nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
        curae;<br><br>
        Nunc vitae accumsan eros, ut ullamcorper dolor. Vestibulum vitae rhoncus ex, vitae imperdiet turpis. Quisque
        commodo pretium sem, in suscipit turpis tempor eu. Quisque aliquam sed diam ut cursus. Quisque luctus vehicula
        tristique. Curabitur mollis pellentesque magna. Curabitur vel risus fermentum, bibendum tellus quis, lobortis
        ipsum. In hac habitasse platea dictumst. Maecenas dictum turpis ligula, ut lobortis magna dignissim vel. Nullam
        aliquet neque at enim tristique aliquet. Fusce ut dui quis mi euismod bibendum. Suspendisse potenti. Aliquam non
        quam cursus, sagittis turpis sit amet, ultricies risus.</p>
</div>

<h2>SHIPPING</h2>
<button type="button" class="section">How much does shipping cost?</button>
<div class="information">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sed lacus blandit, interdum orci ac, commodo arcu.
        Donec ac nulla nec velit vestibulum auctor ullamcorper in neque. Nulla vel enim nulla. Vivamus convallis nibh in
        varius interdum. Quisque eget mi a lacus iaculis hendrerit. Fusce nec congue ligula. Sed eget dapibus augue.
        Praesent dolor nisl, imperdiet vitae justo vel, interdum placerat ligula. Etiam suscipit congue felis, vitae
        pretium ipsum semper eget. Nam sit amet bibendum purus. Sed imperdiet turpis eget sapien hendrerit dictum. Ut
        consectetur sagittis ex eget blandit.</p>
    <br>
    <h3>Check with these services to find your order:</h3>
    <ul>
        <li>Royal Mail</li>
        <li>Hermes</li>
        <li>DPD</li>
    </ul>
    <br>
    <h3>If they were not helpful, follow these steps:</h3>
    <ol type="a">
        <li>Contact Customer Service</li>
        <li>Drink Tea</li>
        <li>Have a Red Bull</li>
    </ol>
</div>

<button type="button" class="section">What happens if my package is lost in transit?</button>
<div class="information">
    <p>Vestibulum finibus convallis tincidunt. Cras laoreet tempus pretium. Aliquam ante libero, semper nec porttitor
        eget, pretium vehicula neque. Vestibulum et suscipit turpis, non mattis tortor. Nunc eget turpis finibus,
        bibendum mi nec, euismod leo. Praesent at tincidunt turpis, sit amet porttitor purus. Proin eget odio non libero
        egestas viverra. Ut dapibus nisi a quam vestibulum, et volutpat ex rhoncus. Ut pretium dictum aliquam. Sed
        iaculis lobortis urna ac convallis. Aenean aliquam venenatis libero vitae ullamcorper. Nulla facilisi. Phasellus
        sem lorem, blandit ut tincidunt id, convallis sit amet lorem. Sed fermentum imperdiet nulla eget ornare. Quisque
        rutrum mauris in vulputate mattis.</p>
</div>

<button type="button" class="section">Do you ship abroad?</button>
<div class="information">
    <p> It will not arrive. Vestibulum diam magna, consequat posuere tempor et, euismod vitae nulla. Aenean tincidunt
        dolor finibus erat semper, ac efficitur felis placerat. Vivamus non tortor dignissim, tristique neque id,
        sagittis sem. Aliquam erat volutpat. Duis pretium sem sit amet nibh placerat, at finibus sem tincidunt. Integer
        condimentum ligula quis massa dapibus tempus.

        <br><br>

        Nulla hendrerit magna risus, nec euismod lectus molestie id.
        Aenean sodales venenatis nisl eget egestas. Aenean eu odio sit amet velit faucibus cursus. In vitae consectetur
        libero, vitae imperdiet est. Nam sit amet scelerisque lorem, a porta magna. Proin non dui faucibus, ullamcorper
        elit in, viverra velit. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus
        et ultrices posuere cubilia curae; Donec tincidunt placerat orci, sed vestibulum est viverra et.</p>
</div>

<button type="button" class="section">When will my order be shipped?</button>
<div class="information">
    <p>Sed vitae sem sed mauris feugiat placerat ut nec lectus. Nam non aliquam libero, et ultricies mauris. Aliquam
        pellentesque nisi molestie dolor vestibulum, sed pharetra mauris finibus. Phasellus varius ultricies elit vitae
        vestibulum. Nulla posuere semper lorem sed rutrum. Cras odio turpis, convallis sit amet porttitor at, vulputate
        vel lorem. Vestibulum ullamcorper sem nisi, vel tincidunt arcu ultricies sed.</p>
</div>

<button type="button" class="section">How do I qualify for free shipping?</button>
<div class="information">
    <p>Vestibulum id eleifend ex. Phasellus et metus magna. Suspendisse sed magna ut eros lobortis tempor nec at metus.
        Etiam sed est gravida, ornare ex eget, ornare metus. Duis volutpat dolor ut sollicitudin gravida. Maecenas
        rhoncus enim erat, sit amet volutpat arcu posuere vel. Curabitur est lacus, lacinia sit amet porttitor ut,
        tempus a purus. Etiam tellus tellus, faucibus et aliquet in, cursus ac metus. Sed ac ligula lobortis, tempor ex
        sed, condimentum nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
        curae;<br><br>
        Nunc vitae accumsan eros, ut ullamcorper dolor. Vestibulum vitae rhoncus ex, vitae imperdiet turpis. Quisque
        commodo pretium sem, in suscipit turpis tempor eu. Quisque aliquam sed diam ut cursus. Quisque luctus vehicula
        tristique. Curabitur mollis pellentesque magna. Curabitur vel risus fermentum, bibendum tellus quis, lobortis
        ipsum. In hac habitasse platea dictumst. Maecenas dictum turpis ligula, ut lobortis magna dignissim vel. Nullam
        aliquet neque at enim tristique aliquet. Fusce ut dui quis mi euismod bibendum. Suspendisse potenti. Aliquam non
        quam cursus, sagittis turpis sit amet, ultricies risus.</p>
</div>

<h2>RETURNS POLICY</h2>
<button type="button" class="section">What is your return policy?</button>
<div class="information">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sed lacus blandit, interdum orci ac, commodo arcu.
        Donec ac nulla nec velit vestibulum auctor ullamcorper in neque. Nulla vel enim nulla. Vivamus convallis nibh in
        varius interdum. Quisque eget mi a lacus iaculis hendrerit. Fusce nec congue ligula. Sed eget dapibus augue.
        Praesent dolor nisl, imperdiet vitae justo vel, interdum placerat ligula. Etiam suscipit congue felis, vitae
        pretium ipsum semper eget. Nam sit amet bibendum purus. Sed imperdiet turpis eget sapien hendrerit dictum. Ut
        consectetur sagittis ex eget blandit.</p>
    <br>
    <h3>Check with these services to find your order:</h3>
    <ul>
        <li>Royal Mail</li>
        <li>Hermes</li>
        <li>DPD</li>
    </ul>
    <br>
    <h3>If they were not helpful, follow these steps:</h3>
    <ol type="a">
        <li>Contact Customer Service</li>
        <li>Drink Tea</li>
        <li>Have a Red Bull</li>
    </ol>
</div>

<button type="button" class="section">How do I return a product?</button>
<div class="information">
    <p>Vestibulum finibus convallis tincidunt. Cras laoreet tempus pretium. Aliquam ante libero, semper nec porttitor
        eget, pretium vehicula neque. Vestibulum et suscipit turpis, non mattis tortor. Nunc eget turpis finibus,
        bibendum mi nec, euismod leo. Praesent at tincidunt turpis, sit amet porttitor purus. Proin eget odio non libero
        egestas viverra. Ut dapibus nisi a quam vestibulum, et volutpat ex rhoncus. Ut pretium dictum aliquam. Sed
        iaculis lobortis urna ac convallis. Aenean aliquam venenatis libero vitae ullamcorper. Nulla facilisi. Phasellus
        sem lorem, blandit ut tincidunt id, convallis sit amet lorem. Sed fermentum imperdiet nulla eget ornare. Quisque
        rutrum mauris in vulputate mattis.</p>
</div>

<button type="button" class="section">What products are excluded in your returns policy?</button>
<div class="information">
    <p> It will not arrive. Vestibulum diam magna, consequat posuere tempor et, euismod vitae nulla. Aenean tincidunt
        dolor finibus erat semper, ac efficitur felis placerat. Vivamus non tortor dignissim, tristique neque id,
        sagittis sem. Aliquam erat volutpat. Duis pretium sem sit amet nibh placerat, at finibus sem tincidunt. Integer
        condimentum ligula quis massa dapibus tempus.

        <br><br>

        Nulla hendrerit magna risus, nec euismod lectus molestie id.
        Aenean sodales venenatis nisl eget egestas. Aenean eu odio sit amet velit faucibus cursus. In vitae consectetur
        libero, vitae imperdiet est. Nam sit amet scelerisque lorem, a porta magna. Proin non dui faucibus, ullamcorper
        elit in, viverra velit. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus
        et ultrices posuere cubilia curae; Donec tincidunt placerat orci, sed vestibulum est viverra et.</p>
</div>

<button type="button" class="section">My product is defective, what do I do?</button>
<div class="information">
    <p>Sed vitae sem sed mauris feugiat placerat ut nec lectus. Nam non aliquam libero, et ultricies mauris. Aliquam
        pellentesque nisi molestie dolor vestibulum, sed pharetra mauris finibus. Phasellus varius ultricies elit vitae
        vestibulum. Nulla posuere semper lorem sed rutrum. Cras odio turpis, convallis sit amet porttitor at, vulputate
        vel lorem. Vestibulum ullamcorper sem nisi, vel tincidunt arcu ultricies sed.</p>
</div>

<button type="button" class="section">What is your return period?</button>
<div class="information">
    <p>Vestibulum id eleifend ex. Phasellus et metus magna. Suspendisse sed magna ut eros lobortis tempor nec at metus.
        Etiam sed est gravida, ornare ex eget, ornare metus. Duis volutpat dolor ut sollicitudin gravida. Maecenas
        rhoncus enim erat, sit amet volutpat arcu posuere vel. Curabitur est lacus, lacinia sit amet porttitor ut,
        tempus a purus. Etiam tellus tellus, faucibus et aliquet in, cursus ac metus. Sed ac ligula lobortis, tempor ex
        sed, condimentum nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
        curae;<br><br>
        Nunc vitae accumsan eros, ut ullamcorper dolor. Vestibulum vitae rhoncus ex, vitae imperdiet turpis. Quisque
        commodo pretium sem, in suscipit turpis tempor eu. Quisque aliquam sed diam ut cursus. Quisque luctus vehicula
        tristique. Curabitur mollis pellentesque magna. Curabitur vel risus fermentum, bibendum tellus quis, lobortis
        ipsum. In hac habitasse platea dictumst. Maecenas dictum turpis ligula, ut lobortis magna dignissim vel. Nullam
        aliquet neque at enim tristique aliquet. Fusce ut dui quis mi euismod bibendum. Suspendisse potenti. Aliquam non
        quam cursus, sagittis turpis sit amet, ultricies risus.</p>
</div>
<!--This is included in most of the pages and is the footer of the webpage, it is in a separate file because it is a
piece of code that is reused often-->
<?php require "footer.php"; ?>
</body>