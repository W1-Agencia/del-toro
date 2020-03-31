var owl;
$(".form-contact").submit(function(o) {
    return o.preventDefault(), $.ajax({
        type: "POST",
        url: "email/send.php",
        data: $("#form-contact").serialize(),
        success: function(o) {
            "1" == o ? ($(".form-contact input").val(""), $(".form-contact textarea").val(""), $(".box-confirmed").show("slow"), setTimeout(function() {
                $(".box-confirmed").hide("slow")
            }, 3e3)) : (alert(o), $(".box-error").show("slow"), setTimeout(function() {
                $(".box-error").hide("slow")
            }, 3e3))
        }
    }), !1
});