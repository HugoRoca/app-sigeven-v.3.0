<?php
ob_start();
session_start();

if (!isset($_SESSION["name"])) {
  header("Location: login.html");
} else {
  require 'head.php';

  if ($_SESSION["access"]) {
?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <strong>Users</strong> List | 
              <a class="btn btn-sm btn-outline-primary" type="button" href="user-form.php?id=0"> New User</a>
            </div>
            <div class="card-body">
              <table id="tblUserList" class="display responsive nowrap">
                <thead>
                  <th>Options</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Number</th>
                  <th>Email</th>
                  <th>User Name</th>
                  <th>Image</th>
                  <th>State</th>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
  } else {

  }
}

require 'footer.php';

?>
<script>
    const globalData = {
        elements: {
            tblUserListId: '#tblUserList'
        }
    }
</script>
<script src="../scripts/user-list.js"></script>

<?php
ob_end_flush();

?>