/**
 * @author Ammar Faizi <ammarfaizi2@gmail.com> https://www.facebook.com/ammarfaizi2
 * @license MIT
 * @version 0.0.1
 */
(function (window, undefined) {
  var teajs = function (q, context) {
    if (typeof q === "string") {
      return teajs(document.querySelectorAll(q));
    } else if (typeof q == "object") {
      if (q.constructor.name !== "NodeList") {
        q = [q];
      }
      return {
        q: q,
        dc: q[0],
        val: function (v) {
          if (v === undefined)
            return this.dc.value;
          for (var i = 0; i < q.length; i++)
            this.q[i].value = v;
        },
        html: function (v) {
          if (v === undefined)
            return this.dc.innerHTML;
          for (var i = 0; i < q.length; i++)
            this.q[i].innerHTML = v;
        },
        attr: function (n, v) {
          if ((n !== undefined) && (v !== undefined))
              for (var i = 0; i < q.length; i++)
                this.q[i].setAttribute(n, v);
          return this.dc.getAttribute(n);
        },
        disable: function () {
          for (var i = 0; i < q.length; i++)
            this.q[i].setAttribute("disabled", 1);
        },
        enable: function () {
          for (var i = 0; i < q.length; i++)
            this.q[i].removeAttribute("disabled");
        }
      };
    }
  };

  /**@teajs_load_module_boundary**/

  // Expose TeaJS to global variable.
  window.teajs = window.$ = teajs;
})(window);
