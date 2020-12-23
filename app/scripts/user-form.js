const userFormModule = (function ($) {
  "use strict";

  const elements = {
    cardHeaderTitleId: "#card-header-title",
  };

  let userForm = {};

  userForm.events = (function () {
    function loadTitle() {
      const valIdQuery = general.getQueryParamURLById("id");

      if (valIdQuery) {
        $(elements.cardHeaderTitleId).html("Update User");
      } else {
        $(elements.cardHeaderTitleId).html("New User");
      }
    }

    return {
      loadTitle: loadTitle,
    };
  })();

  userForm.functions = (function () {
    function init() {
      userForm.events.loadTitle();
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
