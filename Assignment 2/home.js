document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");

  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission

    // Get form values
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();

    // Validation flags
    let isValid = true;

    // Name validation
    if (name == "") {
      alert("Please enter your name.");
      isValid = false;
    }

    // Email validation
    if (!validateEmail(email)) {
      alert("Please enter a valid email address.");
      isValid = false;
    }

    // Message validation
    if (message == "") {
      alert("Please enter your message.");
      isValid = false;
    }

    // Submit if valid
    if (isValid) {
      alert("Form submitted successfully!");
      form.submit();
    }
  });

  // Email validation function
  function validateEmail(email) {
    const re = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    return re.test(email);
  }
});
