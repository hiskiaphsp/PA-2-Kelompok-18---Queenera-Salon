$(document).ready(function () {
    counter_notif(localStorage.getItem("route_counter_notif"));
    load_notif(localStorage.getItem("route_notification")); // Call the function initially to load notifications
    setInterval(function () {
        counter_notif(localStorage.getItem("route_counter_notif"));
        load_notif(localStorage.getItem("route_notification")); // Call the function periodically to update notifications
    }, 2000); // Adjust the interval (in milliseconds) as needed
});

function tombol_notif() {
    counter_notif(localStorage.getItem("route_counter_notif"));
    markRead(localStorage.getItem("route_notification_read"));
}

setInterval(function () {
    counter_notif(localStorage.getItem("route_counter_notif"));
}, 5000);
function counter_notif(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function (response) {
            if (response.total > 0) {
                $("#jmlh-notif").html(response.total);
                $("#top-notification-number").html(response.total);
                console.log(1);
            } else {
                $("#jmlh-notif").html(0);
                $("#top-notification-number").html(0);
                console.log(0);
            }
        },
    });
}

function markRead(url) {
    // let data = "view="+ view + "&load_keranjang=";
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function (response) {
            $("#notification_items").html(response.notifications);
            $("#notification_items_top").html(response.notifications);
        },
    });
}

function load_notif(url) {
    // let data = "view="+ view + "&load_keranjang=";
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function (response) {
            console.log("0");
            $("#notification_items").html(response.notifications);
            $("#notification_items_top").html(response.notifications);
        },
    });
}
