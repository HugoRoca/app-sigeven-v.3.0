const general = {
    openLoad: function () {
        $("#loading").addClass("is-active");
    },
    closeLoad: function () {
        $("#loading").removeClass("is-active");
    },
    initializeDataTable: function (id) {
        $(id).DataTable({
            responsive: true,
        });
    },
    isJson: function (str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }
}