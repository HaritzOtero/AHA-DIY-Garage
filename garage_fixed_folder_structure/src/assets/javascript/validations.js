// Check for the document
$(document).ready(function () {  
  // <============= ID's/classes =============>
  const name = '#name';
  const lastName = '#surname';
  const email = '#email';
  const phone = '#phone';
  const password = '#password';
  const confirmPassword = '#conpassword';
  const submit = '#submitbtn'

  // <============= hidden classes =============>
  // This will make the classes hidden (error messages)
  $('.namevalid').hide();
  $('.lastNameValid').hide();
  $('.emailvalid').hide();
  $('.phonevalid').hide();
  $('.passwordvalid').hide();
  $('.conpasswordvalid').hide();


  let nameInvalid = true;
  let lastNameInvalid = true;
  let emailInvalid = true;
  let phoneInvalid = true;
  let confirmPasswordInvalid = true;

  // <============= Validation for name =============>
  // Blur will activate on click when you're done with the input
  // In the blur attribute there is a function if the field is empty it will activate is-invalid class so it makes the input borders red and show the class namevalid
  // so you will see the message and make the nameInvalid boolean true;
  $(name).blur(function() {  // $(name) = id #name
    let nameValue = $(name).val(); // This will get the value in the id #name
    if(nameValue !== '') {  // If value isn't empty
      $(name).removeClass('is-invalid'); // remove class is-invalid
      $('.namevalid').hide(); // hide class namevalid
      nameInvalid = false; // boolean nameInvalid false
    } else { 
      $(name).addClass('is-invalid'); // add class is-invalid on the id #name
      $('.namevalid').show(); // show class namevalid
      nameInvalid = true; // boolean nameInvalid true
    }
  })

  // <============= Validation for last name =============>
  $(lastName).blur(function() {
    let lastNameValue = $(lastName).val();
    if(lastNameValue !== '') {
      $(lastName).removeClass('is-invalid');
      $('.lastNameValid').hide();
      lastNameInvalid = false;
    } else { 
      $(lastName).addClass('is-invalid');
      $('.lastNameValid').show();
      lastNameInvalid = true;
    }
  })

  // <============= Validation for e-mail =============>
  $(email).blur(function() {
    // Regex is validation with chars
    let regex = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
    let emailValue = $(email).val();
    if(regex.test(emailValue)) { //check if the validation is correct in the value of email
      $(email).removeClass('is-invalid');
      $('.emailvalid').hide();
      emailInvalid = false;
    } else { 
      $(email).addClass('is-invalid');
      $('.emailvalid').show();
      emailInvalid = true;
    }
  })

  // <============= Validation for phone =============>
  $(phone).blur(function() {
    // Regex is validation with chars/length
    let regex = /(\+\d{1,3}\s?)?((\(\d{3}\)\s?)|(\d{3})(\s|-?))(\d{3}(\s|-?))(\d{4})(\s?(([E|e]xt[:|.|]?)|x|X)(\s?\d+))?/g;
    let phoneValue = $(phone).val();
    if(regex.test(phoneValue)) { //check if the validation is correct in the value of phone
      $(phone).removeClass('is-invalid');
      $('.phonevalid').hide();
      phoneInvalid = false;
    } else { 
      $(phone).addClass('is-invalid');
      $('.phonevalid').show();
      phoneInvalid = true;
    }
  })

  // <============= Validation for password =============>
  $(password).blur(function() {
    let passwordValue = $(password).val();
    if(passwordValue !== '') {
      $(password).removeClass('is-invalid');
      $('.passwordValid').hide();
      passwordInvalid = false;
    } else { 
      $(password).addClass('is-invalid');
      $('.passwordValid').show();
      passwordInvalid = true;
    }
    
    if ((passwordValue.length < 8)|| (passwordValue.length > 32))  { // if length is under 8 chars or above 32 give error
      $(password).addClass('is-invalid');
      $('.passwordvalid').show();
      passwordInvalid = true;
    } else {
      $(password).removeClass('is-invalid');
      $('.passwordValid').hide();
      passwordInvalid = false;
    }
  })
      
  // <============= Validate Confirm Password =============>
  $(confirmPassword).blur(function() {
    let confirmPasswordValue = $(confirmPassword).val();
    let passwordValue = $(password).val();

    if (passwordValue != confirmPasswordValue) {
      $(confirmPassword).addClass('is-invalid');
      $('.conpasswordvalid').show();
      confirmPasswordInvalid = true;
    } else {
      $(confirmPassword).removeClass('is-invalid');
      $('.conpasswordvalid').hide();
      confirmPasswordInvalid = false;
    }
  })

  // Check if any of the inputs are invalid if invalid it stays on the same page and disables the button else it will redirect
  $(submit).click(function(event) {
    if (!nameInvalid || !lastNameInvalid || !emailInvalid || !phoneInvalid || !confirmPasswordInvalid) { // Boolean (false) no error
      $(submit).removeClass('disabled');
      console.log('yes')
    } else { // else disable button and do not redirect
      console.log('no')
      event.preventDefault();
      $(submit).addClass('disabled');
    }
  });
});
  