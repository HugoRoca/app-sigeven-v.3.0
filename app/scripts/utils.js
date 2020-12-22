function openLoad() {
  $("#loading").addClass("is-active");
}

function closeLoad() {
  $("#loading").removeClass("is-active");
}

function initializeDataTable(id) {
  $(id).DataTable({
    responsive: true,
  });
}
