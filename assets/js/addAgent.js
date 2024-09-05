/**
 * File : addUser.js
 *
 * This file contain the validation of add user form
 *
 * Using validation plugin : jquery.validate.js
 *
 * @author Kishor Mali
 */

$(document).ready(function () {
  var addUserForm = $("#addAgent");

  var validator = addUserForm.validate({
    rules: {
      name: { required: true },
      email: {
        required: true,
        email: true,
        remote: { url: baseURL + "checkEmailExists", type: "post" },
      },
      password: { required: true },
      cpassword: { required: true, equalTo: "#password" },
      phone: { required: true },
      manager: { required: true },
    },
    messages: {
      name: { required: "This field is required" },
      email: {
        required: "This field is required",
        email: "Please enter valid email address",
        remote: "Email already taken",
      },
      password: { required: "This field is required" },
      cpassword: {
        required: "This field is required",
        equalTo: "Please enter same password",
      },
      phone: {
        required: "This field is required",
      },
      manager: {
        required: "This field is required",
      },
    },
  });
});
