$(document).ready(function () {
    $("#backToAccountAsFromPartner").on("click", function () {
        $("#asPartner").hide(); 
        $("#accountAs").show();
    });

    // Add functionality for backButtonCreateAs
    $("#backButtonCreateAs").on("click", function () {
        $("#asPartner").hide();
        $("#accountAs").show();
    });

    $("#backToForm1FromForm2").on("click", function () {
        $("#form2").hide();
        $("#form1").show();
    });

    $("#backToForm1FromForm2-1").on("click", function () {
        $("#form2-1").hide();
        $("#form1").show();
    });

    $("#backtoForm3FromForm4").on("click", function () {
        $("#form4").hide();
        $("#form3").show();
    });

    $("#backtoForm4FromForm5").on("click", function () {
        $("#form5").hide();
        $("#form4").show();
    });
});
