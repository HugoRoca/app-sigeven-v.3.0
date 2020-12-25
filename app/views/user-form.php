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
          <form class="form-horizontal" method="POST" id="frmUser">
            <div class="card">
              <div class="card-header">
                <strong id="card-header-title"></strong>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div class="form-group row col-md-6">
                    <label class="col-md-4 col-form-label" for="text-input">Name:</label>
                    <div class="col-md-8">
                      <input class="form-control" id="name" type="text" placeholder="Name" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="form-group row col-md-6">
                    <label class="col-md-4 col-form-label" for="text-input">Address:</label>
                    <div class="col-md-8">
                      <input class="form-control" id="address" type="text" placeholder="Address" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="form-group row col-md-6">
                    <label class="col-md-4 col-form-label" for="text-input">Doc. Type:</label>
                    <div class="col-md-8">
                      <input class="form-control" id="document_type" type="text" placeholder="Document Type" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group row col-md-6">
                    <label class="col-md-4 col-form-label" for="text-input">Doc. number:</label>
                    <div class="col-md-8">
                      <input class="form-control" id="document_number" type="text" placeholder="Document number" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="form-group row col-md-6">
                    <label class="col-md-4 col-form-label" for="text-input">Email :</label>
                    <div class="col-md-8">
                      <input class="form-control" id="email" type="text" placeholder="Email" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group row col-md-6">
                    <label class="col-md-4 col-form-label" for="text-input">Charge:</label>
                    <div class="col-md-8">
                      <input class="form-control" id="charge" type="text" placeholder="Charge" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="form-group row col-md-6">
                    <label class="col-md-4 col-form-label" for="text-input">User name:</label>
                    <div class="col-md-8">
                      <input class="form-control" id="user_name" type="text" placeholder="User name" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group row col-md-6">
                    <label class="col-md-4 col-form-label" for="text-input">Password:</label>
                    <div class="col-md-8">
                      <input class="form-control" id="password" type="password" placeholder="Password" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="form-group row col-md-6">
                    <label class="col-md-4 col-form-label">Permissions:</label>
                    <ul id="Permissions" style="list-style: none;">
                    </ul>
                  </div>
                  <div class="form-group row col-md-6">
                    <label class="col-md-4 col-form-label">Image:</label>
                    <div class="col-md-8">
                      <input id="image" type="file" name="file-input">
                    </div>
                    <input type="hidden" name="imageActually" id="imageActually">
                    <img class="img-thumbnail img-fluid" width="150" height="150" id="imageShow">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit"> Save</button>
                <a class="btn btn-sm btn-danger" href="./user-list.php"> Cancel</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

<?php
  } else {
  }
}

require 'footer.php';

?>

<script src="../scripts/user-form.js"></script>

<?php
ob_end_flush();

?>