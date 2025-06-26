$("#sliderButton").click(function (event) {
    if ($("#sliderExample").hasClass("active")) {
        $("#sliderExample").removeClass("active");
        $("#sliderBackground").removeClass("active");
    } else {
        $("#sliderExample").addClass("active");
        $("#sliderBackground").addClass("active");
    }
});
$("#sliderBackground").click(function () {
    $("#sliderExample").removeClass("active");
    $("#sliderBackground").removeClass("active");
});

// new EasyMDE({element: document.getElementById('descriptions')});

$("#LogOut").click(() => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to logout!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, logout!",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/admin/logout';
        }
    });
});




window.addEventListener("success", (event) => {
    Swal.fire({
        icon: "success",
        title: "success!",
        text: event.detail,
        timer: 2000,
    });
});
window.addEventListener("errors", (event) => {
    Swal.fire({
        icon: "error",
        title: "Failed!",
        text: event.detail,
        timer: 2000,
    });
});
window.addEventListener("error", (event) => {
    Swal.fire({
        icon: "error",
        title: "Failed!",
        text: event.detail,
        timer: 2000,
    });
});
window.addEventListener("info", (event) => {
    Swal.fire({
        icon: "info",
        title: "Info!",
        text: event.detail,
        timer: 2000,
    });
});

window.addEventListener('hiddenModal', (event) => {
    $('#'+ event.detail +'').modal("hide");
})
