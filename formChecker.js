//This global variable is used to update the state of the form (valid or invalid)
let validForm = true;

/**
 * This function sets the initial state for the signup page by:
 * - Activating real-time feedback on user input for the username, password, and re-enter password fields
 * - Calling functions that generate the months, days, and years for the date of birth drop-down menus
 * @param None
 * @return None
 */
function initialState() {
  validForm = true;
  $(document).ready(function() {
    //By calling these functions we're activating real-time feedback on the following three input fields: username, password, re-enter password
    //Adapted from https://stackoverflow.com/questions/9717588/checking-password-match-while-typing
    $("#username").keyup(validateUsernameRealTime);
    $("#password").keyup(validatePasswordRealTime);
    $("#reEnteredPassword").keyup(validateReEnteredPasswordRealTime);
  });

  //These functions generate the months, days, and years for the date of birth drop-down menus
  //Adapted from http://jsfiddle.net/feedmeastraydog/5raMT/
  generateMonths();
  generateDays();
  generateYears();
}


/**
 * This function validates the username in real time by telling the user if their username is invalid and showing the rules for valid usernames
 * @param None
 * @return None
 */
function validateUsernameRealTime() {
  //Adapted from https://stackoverflow.com/questions/32528362/regex-for-username
  //8 to 20 characters, special characters allowed are -_, not 2 special characters in a row, no special characters at the
  //beginning or end, up to 5 special characters, up to 8 numbers.
  let usernameRegex = /^(?!.*[-_]{2})(?!(?:.*[-_]){5})(?!(?:.*\d){7})(?!^[^a-zA-Z0-9])(?=.*[a-zA-Z0-9]$)([-_a-zA-Z0-9]{8,20})$/;
  let username = $("#username").val();
  if (username.match(usernameRegex) == null) {
    validForm = false;
    $("#username-error").text("Invalid username. Please use 8-20 characters consisting of letters, numbers, dashes, and underscores.");
  } else {
    validForm = true;
    $("#username-error").text("");
  }
}

/**
 * This function validates the password in real time by telling the user if their password is invalid and showing the rules for valid passwords
 * @param None
 * @return None
 */
function validatePasswordRealTime() {
  //Adapted from https://stackoverflow.com/questions/12090077/javascript-regular-expression-password-validation-having-special-characters
  //At least 8 characters, special characers are !@#$%^&*, only alphanumerics and special characters allowed, at least 1 number,
  //at least 1 capital letter, at least 1 special character
  let passwordRegex = /^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,}$/;
  let password = $("#password").val();
  if (password.match(passwordRegex) == null) {
    validForm = false;
    $("#password-error").text("Invalid password. At least 7 characters: at least 1 number, 1 capital letter, and 1 special character (special characters are !@#$%^&*).");
  } else {
    validForm = true;
    $("#password-error").text("");
  }
}

/**
 * This function validates the re-entered password in real time by telling the user if their re-entered password matches their original password
 * @param None
 * @return None
 */
function validateReEnteredPasswordRealTime() {
  //Adapted from https://stackoverflow.com/questions/9717588/checking-password-match-while-typing
  //This jQuery snippet verifies that the reEnteredPassword is equal to the original password
  let password = $("#password").val();
  let reEnteredPassword = $("#reEnteredPassword").val();
  if(password != reEnteredPassword) {
    validForm = false;
    $("#reEnteredPassword-error").text("Passwords don't match!");
  } else {
    validForm = true;
    $("#reEnteredPassword-error").text("");
  }
}

/**
 * This function generates the months 1-12 and inserts them as options for the month selector
 * @param None
 * @return None
 */
function generateMonths() {
  let selectMonth = document.getElementById("month");
  let optionMonth = document.createElement("option");
  optionMonth.value = "Month";
  optionMonth.innerHTML = "Month";
  selectMonth.appendChild(optionMonth);
  for (let i = 1; i <= 12; i++) {
    let optionMonth = document.createElement("option");
    optionMonth.value = i;
    optionMonth.innerHTML = i;
    selectMonth.appendChild(optionMonth);
  }
  selectMonth.value = "Month";
}

/**
 * This function generates the days 1-31 and inserts them as options for the day selector
 * @param None
 * @return None
 */
function generateDays() {
  let selectDay = document.getElementById("day");
  let optionDay = document.createElement("option");
  optionDay.value = "Day";
  optionDay.innerHTML = "Day";
  selectDay.appendChild(optionDay);
  for (let i = 1; i <= 31; i++) {
    let optionDay = document.createElement("option");
    optionDay.value = i;
    optionDay.innerHTML = i;
    selectDay.appendChild(optionDay);
  }
  selectDay.value = "Day";
}

/**
 * This function generates the years 1900 - 2018 (in reverse order) and inserts them as options for the year selector
 * @param None
 * @return None
 */
function generateYears() {
  let selectYear = document.getElementById("year");
  let optionYear = document.createElement("option");
  optionYear.value = "Year";
  optionYear.innerHTML = "Year";
  selectYear.appendChild(optionYear);
  for (let i = 2018; i >= 1900; i--) {
    let optionYear = document.createElement("option");
    optionYear.value = i;
    optionYear.innerHTML = i;
    selectYear.appendChild(optionYear);
  }
  selectYear.value = "Year";
}

/**
 * This function calls every non-realtime input validator function and also invalidates empty username, password, and re-entered password fields
 * @param None
 * @return {bool} validForm - This global variable is used to update the state of the form (valid or invalid)
 */
function validateForm() {
  //Adapted from https://stackoverflow.com/questions/30702869/regular-expression-for-first-name-with-some-conditions
  //At least 1 characters, only A-Z and a-z, up to three words.
  let nameRegex = /^(?=(?:[^A-Za-z]*[A-Za-z]){1})[A-Za-z]+(?: [A-Za-z]+){0,2}$/;

  //Adapted from https://stackoverflow.com/questions/32528362/regex-for-username
  //8 to 20 characters, special characters allowed are -_, not 2 special characters in a row, no special characters at the
  //beginning or end, up to 5 special characters, up to 7 numbers.
  let usernameRegex = /^(?!.*[-_]{2})(?!(?:.*[-_]){5})(?!(?:.*\d){7})(?!^[^a-zA-Z0-9])(?=.*[a-zA-Z0-9]$)([-_a-zA-Z0-9]{8,20})$/;

  //Adapted from https://stackoverflow.com/questions/12090077/javascript-regular-expression-password-validation-having-special-characters
  //At least 7 characters, special characers are !@#$%^&*, only alphanumerics and special characters allowed, at least 1 number,
  //at least 1 capital letter, at least 1 special character
  let passwordRegex = /^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,}$/;

  //Taken from https://stackoverflow.com/questions/46155/how-to-validate-an-email-address-in-javascript
  //Allows most email addresses in use today, including those with two-letter country code top-level domain
  let emailRegex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|edu|org|net|gov|mil|biz|info|mobi|name|aero|jobs|museum)\b/;

  let message = document.getElementById("error-message");

  let firstName = document.getElementById("firstName").value;
  let lastName = document.getElementById("lastName").value;
  let email = document.getElementById("email").value;

  let year = document.getElementById("year").value;
  let month = document.getElementById("month").value;
  let day = document.getElementById("day").value

  let userName = document.getElementById("username").value;
  let password = document.getElementById("password").value;
  let reEnteredPassword = document.getElementById("reEnteredPassword").value;

  //Validating first name
  validateFirstName(firstName, nameRegex);

  //Validating last name
  validateLastName(lastName, nameRegex);

  //Validating email
  validateEmail(email, emailRegex);

  //Validating date of birth
  validatedateOfBirth(month, day, year);

  //Validating gender
  validateGender();

  //Empty fields
  if (userName === "") {
    document.getElementById("username-error").innerHTML = "Please input a username.";
  }
  if (password === "") {
    document.getElementById("password-error").innerHTML = "Please enter a new password.";
  }
  if (reEnteredPassword === "") {
    document.getElementById("reEnteredPassword-error").innerHTML = "Please re-enter password.";
  }

  //If the form is invalid, print a general error message
  if (!validForm) {
    message.innerHTML = "<br><p>Wrong input. Please try again!</p>";
  } else {
    message.innerHTML = "";
  }

  return validForm;
}

/**
 * This function validates the "firstName" input
 * @param {string} firstName - First name of the user, obtained from HTML input 
 * @param {string} nameRegex - The regular expression we will use to validate the user's first name
 * @return None
 */
function validateFirstName(firstName, nameRegex) {
  if(firstName.match(nameRegex) == null){
    validForm = false;
    document.getElementById("firstName-error").innerHTML = "<p>Please input your first name.</p>";
  } else {
    document.getElementById("firstName-error").innerHTML = "";
  }
}

/**
 * This function validates the "lastName" input
 * @param {string} lastName - Last name of the user, obtained from HTML input 
 * @param {string} nameRegex - The regular expression we will use to validate the user's last name
 * @return None
 */
function validateLastName(lastName, nameRegex) {
  if (lastName.match(nameRegex) == null) {
    validForm = false;
    document.getElementById("lastName-error").innerHTML = "<p>Please input your last name.</p>";
  } else {
    document.getElementById("lastName-error").innerHTML = "";
  }
}

/**
 * This function validates the "email" input
 * @param {string} email - Email of the user, obtained from HTML input 
 * @param {string} emailRegex - The regular expression we will use to validate the user's email
 * @return None
 */
function validateEmail(email, emailRegex) {
  if (email.match(emailRegex) == null) {
    validForm = false;
    document.getElementById("email-error").innerHTML = "<p>Please input a valid email address.</p>";
  } else {
    document.getElementById("email-error").innerHTML = "";
  }
}

/**
 * This function validates the "month", "day", and "year" inputs
 * @param {string} month - Month of the user's date of birth, obtained from HTML input
 * @param {string} day - Day of the user's date of birth, obtained from HTML input 
 * @param {string} year - Day of the user's date of birth, obtained from HTML input
 * @return None
 */
function validatedateOfBirth(month, day, year) {
  let isLeapYear = true;
 
  //Finding years that are NOT leap years
  if ((year%4 != 0) || ((year%100 == 0) && (year%400 != 0))) {
    isLeapYear = false;
  }
  
  //Invalidating days greater than 29 on leap years
  if ((month == 2) && (isLeapYear)) {
    if (day > 29) {
      validForm = false;
      document.getElementById("dateOfBirth-error").innerHTML = "<p>Please input a valid date of birth.</p>";
    } else {
      document.getElementById("dateOfBirth-error").innerHTML = "";
    }
  
  //Invalidating days greater than 28 on non-leap years
  } else if ((month == 2) && (!isLeapYear)) {
    if (day > 28) {
      validForm = false;
      document.getElementById("dateOfBirth-error").innerHTML = "<p>Please input a valid date of birth.</p>";
    } else {
      document.getElementById("dateOfBirth-error").innerHTML = "";
    }

  //Invalidating days greater than 30 on months that only have 30 days
  }else if ((month == 4) || (month == 6) || (month == 9) || (month == 11)) {
    if (day > 30) {
      validForm = false;
      document.getElementById("dateOfBirth-error").innerHTML = "<p>Please input a valid date of birth.</p>";
    } else {
      document.getElementById("dateOfBirth-error").innerHTML = "";
    }
  } else {
    document.getElementById("dateOfBirth-error").innerHTML = "";
  }

  //Invalidating dates in which either the month, the day, or the year are left as "Month", "Day", or "Year", respectively
  if ((isNaN(month)) || (isNaN(day)) || (isNaN(year))) {
      validForm = false;
      document.getElementById("dateOfBirth-error").innerHTML = "<p>Please input your date of birth.</p>";
  }

}

/**
 * This function validates the "gender" input
 * @param None
 * @return None
 */
function validateGender() {
  //Basically, we're making sure one option is selected
  //Code adapted from https://stackoverflow.com/questions/13060313/checking-if-at-least-one-radio-button-has-been-selected-javascript
  
  let checkRadio = document.getElementsByTagName("input");
  let isOneChecked = false;
  
  //We iterate through th input tags and find the radio input named gender, and make sure one is checked
  for (let i = 0; i < checkRadio.length; i++) {
    if (checkRadio[i].name == "gender" && checkRadio[i].type == "radio" && checkRadio[i].checked) {
      isOneChecked = true;
    }
  }

  if (!isOneChecked) {
    validForm = false;
    document.getElementById("gender-error").innerHTML = "<p>Please select your gender.</p>";
  } else {
    document.getElementById("gender-error").innerHTML = "";
  }
}

/**
 * This function submits the form if it is valid
 * @param None
 * @return None
 */
function submitValidation() {
  if (validForm) {
    $("#signup-form").submit();
  }
}

/**
 * This function resets every input in the form
 * @param None
 * @return None
 */
function resetForm() {
  //Function adapted from http://javascript-coder.com/javascript-form/javascript-reset-form.phtml
  //Resets everything in the form
  oForm = document.getElementById("main-form");
  let frm_elements = oForm.elements;
  
  //We iterate through every element and reset them according to their type
  for (i = 0; i < frm_elements.length; i++) {
    field_type = frm_elements[i].type.toLowerCase();
    switch (field_type)
    {
    case "text":
    case "password":
        frm_elements[i].value = "";
        break;
    case "radio":
    case "checkbox":
        if (frm_elements[i].checked)
        {
            frm_elements[i].checked = false;
        }
        break;
    default:
        break;
    }
  }
}
