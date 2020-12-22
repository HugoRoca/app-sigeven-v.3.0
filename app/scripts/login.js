$("#btnLogin").on("click", function (e) {
  e.preventDefault();
  txtUserName = $("#txtUserName").val();
  txtPassword = $("#txtPassword").val();

  $.post(
    "../server/controllers/user.php?action=signIn",
    {
      username: txtUserName,
      password: txtPassword,
    },
    function (data) {
      if (isJson(data)) {
        $(location).attr("href", "dashboard.php");
      } else {
        toastr.error("User name or password incorrect");
      }
    }
  );
});
