var table;
var elements = {
  tblUserList: "#tblUserList",
};

function loadUserList() {
  table = $(elements.tblUserList).dataTable({
    aProcessing: true,
    aServerSide: true,
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "../server/controllers/user.php?action=getAllUsers",
      type: "get",
      dataType: "json",
      error: function e() {
        console.log(e.responseText);
      },
    },
    bDestroy: true,
    iDisplayLength: 5,
    order: [[0, "desc"]],
  });
}

function init() {
  loadUserList();
}

init();
