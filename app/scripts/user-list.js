const userListModule = (function (globalData, $) {
    'use strict';
    const elements = globalData.elements;
    let user = {};

    user.providers = (function () {
        function getAllUsers() {
            return $.ajax({
                type: 'GET',
                url: "../server/controllers/user.php?action=getAllUsers",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
            })
        }

        function disabledUser(id) {
            return $.ajax({
                url: "../server/controllers/user.php?action=disabledUser",
                type: "POST",
                dataType: "json",
                data: {userId: id}
            })
        }

        function enabledUser(id) {
            return $.ajax({
                url: "../server/controllers/user.php?action=enableUser",
                type: "POST",
                dataType: "json",
                data: {userId: id}
            })
        }

        return {
            getAllUsers: getAllUsers,
            disabledUser: disabledUser,
            enabledUser: enabledUser
        }
    })();

    user.events = (function () {
        function loadDataUserList() {
            general.openLoad();
            const success = function (data) {
                $(elements.tblUserListId).dataTable({
                    dom: "Bfrtip",
                    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
                    data: data.aaData,
                    bDestroy: true,
                    iDisplayLength: 10,
                    order: [[0, "desc"]],
                });
                general.closeLoad();
            }

            user.providers.getAllUsers().then(success).catch(e => {
                console.log(e)
                general.closeLoad();
            })
        }

        function disabledUser(id) {
            general.openLoad();
            const success = function (data) {
                toastr.warning(data)
                general.closeLoad();
                loadDataUserList()
            }

            user.providers.disabledUser(id).then(success).catch(e => {
                console.log(e)
                general.closeLoad();
            })
        }

        function enabledUser(id) {
            general.openLoad();
            const success = function (data) {
                toastr.success(data)
                general.closeLoad();
                loadDataUserList()
            }

            user.providers.enabledUser(id).then(success).catch(e => {
                console.log(e)
                general.closeLoad();
            })
        }

        return {
            loadDataUserList: loadDataUserList,
            disabledUser: disabledUser,
            enabledUser: enabledUser
        }
    })();

    user.functions = (function () {
        function init() {
            general.initializeDataTable(elements.tblUserListId);
            user.events.loadDataUserList();
        }

        function redirectFormUser(id){
          $(location).attr("href", "user-form.php?id=" + id);
        }

        return {
            init: init,
          redirectFormUser: redirectFormUser
        }
    })();

    user.init = function () {
        user.functions.init();
    }

    user.disabledUser = function (_id) {
        user.events.disabledUser(_id);
    }

    user.enabledUser = function (_id) {
        user.events.enabledUser(_id)
    }

    user.redirectFormUser = function(_id){
      user.functions.redirectFormUser(_id);
    }

    return user;
})(globalData, jQuery);

window.userListModule = userListModule;

$(document).ready(function () {
    userListModule.init();
});
