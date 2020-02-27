(function(window,undefined){var teajs=function(selector,context){let dc=document.querySelector(selector);if(dc){return{dc:dc,html:function(v){if(v===undefined)
return this.dc.innerHTML;this.dc.innerHTML=v},val:function(v){if(v===undefined)
return this.dc.value;this.dc.value=v}}}
return undefined};window.teajs=window.$=teajs})(window)