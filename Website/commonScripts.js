/*Scripts*/

/**
 * This function makes the navigation bar responsive, which improves user experience
 * @param None
 * @return None
 */
function responsiveNav() {
  //Script for responsive navigation bar
  //Source: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_topnav
  let x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

/**
 * This function toggles between showing and hiding the allergies input box and submit button on the user's profile page whenever the user clicks on the "Update" button
 * @param None
 * @return None
 */
$(document).ready(function(){
    $("#toggleAllergiesInput").click(function(){
        $("#newAllergies").toggle();
        $("#updateAllergies").toggle();
    });
});
