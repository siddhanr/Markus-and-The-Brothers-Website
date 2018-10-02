var frmvalidator = new Validator("quote_form");
frmvalidator.addValidation("name", "req", "Please provide your name");
frmvalidator.addValidation("phone", "req", "Please provide your phone number");
frmvalidator.addValidation("email","req","Please provide your email");
frmvalidator.addValidation("email","email", "Please enter a valid email address");
frmvalidator.addValidation("address", "req", "Please provide your address");
frmvalidator.addValidation("message", "req", "Please enter a message");
