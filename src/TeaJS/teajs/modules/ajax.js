
/**@teajs_module_start:ajax**/
  /**
   * TeaJS Asynchronous Javascript XMLHttpRequest.
   *
   * @author Ammar Faizi <ammarfaizi2@gmail.com> https://www.facebook.com/ammarfaizi2
   * @license MIT
   * @version 0.0.1
   */
  teajs.ajax = function(data) {
    let ch = new XMLHttpRequest;

    if (typeof data.onload === "function") {
      ch.onload = function () {
        data.onload(this.responseText, ch);
      };
    }

    if (typeof data.method !== "string") {
      data.method = "GET";
    }

    if (typeof data.url !== "string") {
      data.url = "";
    }

    if ((typeof data.withoutCredential === "undefined") || data.withoutCredential) {
      ch.withCredentials = true;
    }

    ch.open(data.method, data.url);

    ch.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    if (typeof data.header === "object") {
      let x;
      for (x in data.header) {
        ch.setRequestHeader(x, data.header[x]);
      }
    }
    ch.send(data.data);
  };
/**@teajs_module_end:ajax**/
