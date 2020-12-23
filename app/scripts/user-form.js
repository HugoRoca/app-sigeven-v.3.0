const userFormModule = (function ($) {
  "use strict";

  let userForm = {};

  userForm.init = {};

  return userForm;
})(jQuery);

window.userFormModule = userFormModule;

$(document).ready(function () {
  userFormModule.init();
});
