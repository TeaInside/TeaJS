/**
 * @author Ammar Faizi <ammarfaizi2@gmail.com> https://www.facebook.com/ammarfaizi2
 * @license MIT
 * @version 0.0.1
 */
(function (window, undefined) {
  var teajs = function (selector, context) {
    let dc = document.querySelector(selector);
    if (dc) {
      return {
        dc: dc,
        html: function (v) {
          if (v === undefined)
            return this.dc.innerHTML;
          this.dc.innerHTML = v;
        },
        val: function (v) {
          if (v === undefined)
            return this.dc.value;
          this.dc.value = v;
        }
      };
    }
    return undefined;
  };

  /**@teajs_load_module_boundary**/

  // Expose TeaJS to global variable.
  window.teajs = window.$ = teajs;
})(window);
