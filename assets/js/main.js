$(document)
.on("submit", "form.js-register", function(event) {
    event.preventDefault();

    alert("form was submitted");

    return false;

})