var owl;
($("#form-reserve-off").length && ($("#phone").mask("(00) 00000-0000"), $("#cpf").mask("000.000.000-00")), $(".depoimento .owl-carousel").length) && (owl = $(".depoimento .owl-carousel")).owlCarousel({
    items: 1,
    nav: !0,
    navText: ['<img src="require/img/back.png" alt="Seta esquerda" class="img-fluid">', '<img src="require/img/next.png" alt="Seta direita" class="img-fluid">'],
    navContainer: ".depoimento .custom-nav",
    loop: !0,
    margin: 10,
    dots: !1,
    autoWidth: !1,
    autoplay: !0,
    autoplayTimeout: 8e3,
    autoplayHoverPause: !0,
    smartSpeed: 1e3,
    responsive: {
        0: {
            items: 1,
            nav: !1
        },
        768: {
            items: 1,
            nav: !1
        }
    }
});
$(".foto-ap .owl-carousel").length && (owl = $(".foto-ap .owl-carousel")).owlCarousel({
    items: 1,
    nav: !0,
    navText: ['<img src="../require/img/back.png" alt="Seta esquerda" class="img-fluid">', '<img src="../require/img/next.png" alt="Seta direita" class="img-fluid">'],
    navContainer: ".foto-ap .custom-nav",
    loop: !1,
    rewind: !0,
    margin: 10,
    dots: !1,
    autoWidth: !1,
    autoplay: !0,
    autoplayTimeout: 3e3,
    autoplayHoverPause: !0,
    smartSpeed: 1e3,
    responsive: {
        0: {
            items: 1,
            nav: !1
        },
        768: {
            items: 3,
            nav: !1
        }
    }
});
$(".arrow-page").click(function() {
    var o = $(this).attr("href");
    return $("html, body").animate({
        scrollTop: $(o).offset().top
    }, 500), !1
}), $(".atalho-comodidade").click(function() {
    var o = "#" + this.toString().split("/#")[1];
    return $("html, body").animate({
        scrollTop: $(o).offset().top
    }, 500), !1
}), $(document).ready(function(o) {
    o("a[data-rel^=lightcase]").length && o("a[data-rel^=lightcase]").lightcase({
        transition: "scrollHorizontal",
        cssTransitions: "true",
        useKeys: !0,
        labels: {
            "navigator.prev": "Anterior",
            "navigator.next": "Próximo"
        },
        showSequenceInfo: !1
    })
}), $(".photos-item .remove-image").on("click", function(o) {
    o.preventDefault(), o.stopPropagation(), $("#removemodal").modal();
    var t = $(this).closest("div").attr("id");
    $(".form-remove #id").val(t)
}), $(".link-action-remove").on("click", function() {
    var o = $(this).closest("tr").attr("id");
    $(".form-remove #id").val(o)
}), $(".checkChangePassword").click(o => "password" == $("#password").attr("type") ? $("#password").attr("type", "text") : $("#password").attr("type", "password")), $(".main-menu .navbar-toggler").click(function() {
    $(this).toggleClass("open")
}), $("#accommodations").on("change", function() {
    var o = this.value,
        t = window.location.href.split("/");
    t[0], t[1], t[2], t[3], t[4];
    return $.ajax({
        type: "POST",
        url: "http://localhost/w1/tagoparkhotel/require/functions/search_room_variation.php",
        data: {
            id: o
        },
        success: function(o) {
            var t = JSON.parse(o);
            $("#accommodations_variations").html(""), t.forEach(function(o) {
                var t = $("#accommodations_variations").html();
                $("#accommodations_variations").html(t + "<option value=" + o.id + ">" + o.type + "</option>")
            })
        }
    }), !1
}), $(".form-contact").submit(function(o) {
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