

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
