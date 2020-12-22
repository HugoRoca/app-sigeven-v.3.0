var table;
var elements = {
  tblUserList: "#tblUserList",
};

function loadUserList() {
  openLoad();
  $.ajax({
    url: "../server/controllers/user.php?action=getAllUsers",
    type: "GET",
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function (result) {
      closeLoad();
      table = $(elements.tblUserList).dataTable({
        dom: "Bfrtip",
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
        data: result.aaData,
        bDestroy: true,
        iDisplayLength: 10,
        order: [[0, "desc"]],
      });
    },
    error: function (err) {
      console.log(err);
    },
  });
}

function init() {
  initializeDataTable(elements.tblUserList);
  loadUserList();
}

init();
