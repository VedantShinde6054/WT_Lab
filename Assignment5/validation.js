document.addEventListener("DOMContentLoaded", function () {
    let submitBtn = document.getElementById("Add-mentee");
    let confirmCheck = document.querySelector("input[name='confirm-add']");
    let formFields = document.querySelectorAll(".menteeForm input, .menteeForm select");

    submitBtn.disabled = true;

    confirmCheck.addEventListener("click", function () {
        let allFilled = true;


        formFields.forEach(field => {
            if (field.type !== "checkbox" && field.value.trim() === "") {
                allFilled = false;
            }
        });

        if (!allFilled) {
            alert("Please fill in all fields before confirming.");
            confirmCheck.checked = false; 
        }

        submitBtn.disabled = !allFilled;
    });
});
