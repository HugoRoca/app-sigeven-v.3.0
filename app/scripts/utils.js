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

function isJson(str) {
  try {
    JSON.parse(str);
  } catch (e) {
    return false;
  }
  return true;
}