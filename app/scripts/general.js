const general = {
  openLoad: function () {
    $("#loading").addClass("is-active");
  },
  closeLoad: function () {
    $("#loading").removeClass("is-active");
  },
  addClassInvalidInput: function (id) {
    $(id).addClass("is-invalid");
  },
  removeClassInvalidInput: function (id) {
    $(id).removeClass("is-invalid");
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
  },
  getQueryParamURLById(id) {
    const url_string = window.location.href;
    const url = new URL(url_string);
    return url.searchParams.get(id);
  },
};
