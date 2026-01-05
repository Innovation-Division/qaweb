$(document).ready(function () {
    // Hide modal initially
    $("#continueLaterModal").hide();

    // Show Modal when clicking "Continue later"
    $("#continueForm3").click(function () {
        $("#continueLaterModal").fadeIn();
    });

    // Hide Modal when clicking "Close" button
    $("#no_continue_later").click(function () {
        $("#continueLaterModal").fadeOut();
    });

    // Hide Modal when clicking outside the modal container
    $("#continueLaterModal").click(function (event) {
        if (!$(event.target).closest(".modal-container").length) {
            $("#continueLaterModal").fadeOut();
        }
    });
});
