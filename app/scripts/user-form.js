let userData;

const userFormModule = (function ($) {
  "use strict";

  const elements = {
    cardHeaderTitleId: "#card-header-title",
    nameId: "#name",
    addressId: "#address",
    documentTypeId: "#document_type",
    documentNumberId: "#document_number",
    emailId: "#email",
    chargeId: "#charge",
    userNameId: "#user_name",
    passwordId: "#password",
    PermissionsListId: "#Permissions",
    imageId: "#image",
    imageActuallyId: "#imageActually",
    imageShowId: "#imageShow",
  };

  let userForm = {};

  userForm.providers = (function () {
    function getUserById(id) {
      return $.ajax({
        url: "../server/controllers/user.php?action=getUserById&userId=" + id,
        type: "GET",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
      });
    }

    return {
      getUserById: getUserById,
    };
  })();

  userForm.events = (function () {
    function loadTitle() {
      const valIdQuery = general.getQueryParamURLById("id");

      if (valIdQuery) {
        $(elements.cardHeaderTitleId).html("Update User");
      } else {
        $(elements.cardHeaderTitleId).html("New User");
      }
    }

    function loadUserData() {
      const userId = general.getQueryParamURLById("id");

      if (!userId) return;

      general.openLoad();

      const success = (data) => {
        userData = data;
        $(elements.nameId).val(userData.name);
        $(elements.addressId).val(userData.address);
        $(elements.documentTypeId).val(userData.document_type);
        $(elements.documentNumberId).val(userData.document_number);
        $(elements.emailId).val(userData.email);
        $(elements.chargeId).val(userData.charge);
        $(elements.userNameId).val(userData.user_name);
        $(elements.passwordId).val(userData.password);
        $(elements.imageShowId).attr('src', '../files/users/' + userData.image);

        general.closeLoad();
      };

      userForm.providers
        .getUserById(userId)
        .then(success)
        .catch((e) => {
          console.log(e);
          general.closeLoad();
        });
    }

    return {
      loadTitle: loadTitle,
      loadUserData: loadUserData,
    };
  })();

  userForm.functions = (function () {
    function init() {
      userForm.events.loadTitle();
      userForm.events.loadUserData();
    }

    return {
      init: init,
    };
  })();

  userForm.init = function () {
    userForm.functions.init();
  };

  return userForm;
})(jQuery);

window.userFormModule = userFormModule;

$(document).ready(function () {
  userFormModule.init();
});
