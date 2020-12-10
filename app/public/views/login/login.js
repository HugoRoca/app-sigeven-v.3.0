$("#btnLogin").on("click", function (e) {
  e.preventDefault();
  txtUserName = $("#txtUserName").val();
  txtPassword = $("#txtPassword").val();

  $.post(
    "../../../server/controllers/user.php?op=signin",
    {
      username: txtUserName,
      password: txtPassword,
    },
    function (data) {
      if (data != "null") {
        $(location).attr("href", "escritorio.php");
      } else {
        toastr.error("User name or password incorrect");
      }
    }
  );
});
