/**
 * File : editUser.js
 *
 * This file contain the validation of edit user form
 *
 * @author Kishor Mali
 */
$(document).ready(function () {
  var editUserForm = $("#editAgent");

  var validator = editUserForm.validate({
    rules: {
      name: { required: true },
      email: {
        required: true,
        email: true,
        remote: {
          url: baseURL + "checkEmailExists",
          type: "post",
          data: {
            userId: function () {
              return $("#userId").val();
            },
          },
        },
      },
      cpassword: { equalTo: "#password" },
      phone: { required: true, digits: true },
      manager: { required: true },
    },
    messages: {
      name: { required: "This field is required" },
      email: {
        required: "This field is required",
        email: "Please enter valid email address",
        remote: "Email already taken",
      },
      cpassword: { equalTo: "Please enter same password" },
      phone: {
        required: "This field is required",
        digits: "Please enter numbers only",
      },
      manager: {
        required: "This field is required",
      },
    },
  });

  var editProfileForm = $("#editProfile");

  var validator = editProfileForm.validate({
    rules: {
      fname: { required: true },
      mobile: { required: true, digits: true },
      email: {
        required: true,
        email: true,
        remote: {
          url: baseURL + "checkEmailExists",
          type: "post",
          data: {
            userId: function () {
              return $("#userId").val();
            },
          },
        },
      },
    },
    messages: {
      fname: { required: "This field is required" },
      mobile: {
        required: "This field is required",
        digits: "Please enter numbers only",
      },
      email: {
        required: "This field is required",
        email: "Please enter valid email address",
        remote: "Email already taken",
      },
    },
  });
});
