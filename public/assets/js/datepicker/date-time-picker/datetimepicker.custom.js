(function ($) {
    "use strict";

    //Minimum Setup
    $(function () {
        $("#dt-minimum").datetimepicker();
    });

    //Using Locales
    $(function () {
        $("#dt-local").datetimepicker({
            locale: "ru",
        });
    });
    // Time only
    $(function () {
        $("#dt-time").datetimepicker({
            format: "LT",
        });
    });
    //Date only
    $(function () {
        $("#dt-date").datetimepicker({
            format: "L",
        });
    });
    //No Icon
    $(function () {
        $("#dt-noicon").datetimepicker();
    });
    //Enabled/Disabled Dates
    $(function () {
        var disabledDates = [];

        // Loop sebanyak seluruh tanggal sebelum hari ini
        for (var i = 0; i <= 4; i++) {
            // Tambahkan ke array tanggal yang ter-disable
            disabledDates.push(moment().add(i, "days").startOf("day"));
        }
        for (
            var i = 0;
            i <
            moment()
                .startOf("day")
                .diff(moment("1900-01-01").startOf("day"), "days");
            i++
        ) {
            // Tambahkan ke array tanggal yang ter-disable
            disabledDates.push(moment("1900-01-01").add(i, "days"));
        }

        $("#dt-enab-disab-date").datetimepicker({
            defaultDate: moment().add(5, "days"),
            disabledDates: disabledDates,
        });
    });
    //Enabled/Disabled Dates
    $(function () {
        var disabledDates = [];

        // Loop sebanyak seluruh tanggal sebelum hari ini
        for (var i = 0; i <= 4; i++) {
            // Tambahkan ke array tanggal yang ter-disable
            disabledDates.push(moment().add(i, "days").startOf("day"));
        }
        for (
            var i = 0;
            i <
            moment()
                .startOf("day")
                .diff(moment("1900-01-01").startOf("day"), "days");
            i++
        ) {
            // Tambahkan ke array tanggal yang ter-disable
            disabledDates.push(moment("1900-01-01").add(i, "days"));
        }

        $("#dt-enab-disab-date-end").datetimepicker({
            defaultDate: moment().add(5, "days"),
            disabledDates: disabledDates,
        });
    });
    //view mode
    $(function () {
        $("#dt-view").datetimepicker({
            viewMode: "years",
        });
    });
    //Disabled Days of the Week
    $(function () {
        $("#dt-disab-days").datetimepicker({
            daysOfWeekDisabled: [0, 6],
        });
    });
})(jQuery);
