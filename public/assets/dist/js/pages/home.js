$("#owl-one").owlCarousel({
    // margin: 24,
    merge: true,
    autoWidth: true,
    dots: false,
    responsive: {
        0: {
            loop: true,
            margin: 18,
            center: true,
        },
        768: {
            margin: 24,
        },
    },
});

var owl = $("#owl-two");
owl.owlCarousel({
    items: 1,
    loop: false,
    margin: 24,
    dots: false,
    autowidth: true,
    responsive: {
        480: {
            items: 2,
        },
        768: {
            items: 2,
        },
        992: {
            items: 4,
        },
    },
});
$(".customNextBtn").click(function () {
    owl.trigger("next.owl.carousel");
});
$(".customPrevBtn").click(function () {
    owl.trigger("prev.owl.carousel", [300]);
});
