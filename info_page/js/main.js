function PasswordValidator() {
    var passwordstrength = document.getElementById("psw");
    var regex = new Array();
    regex.push("[A-Z]");
    regex.push("[a-z]");
    regex.push("[0-9]");
    var passed = 0;
    for (var i = 0; i < regex.length; i++) {
        if (new RegExp(regex[i]).test(passwordstrength.value)) {
            passed++;
        }
    }
    if (passed > 8) {
        alert("Valid");
    }
    else {
        alert("Password must contain at least 1 capital letter,\n\n1 small letter, 1 number.");
        return false;
    }
            }
;(function($){
  
  /**
   * jQuery function to prevent default anchor event and take the href * and the title to make a share popup
   *
   * @param  {[object]} e           [Mouse event]
   * @param  {[integer]} intWidth   [Popup width defalut 500]
   * @param  {[integer]} intHeight  [Popup height defalut 400]
   * @param  {[boolean]} blnResize  [Is popup resizeabel default true]
   */
  $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {
    
    // Prevent default anchor event
    e.preventDefault();
    
    // Set values for window
    intWidth = intWidth || '500';
    intHeight = intHeight || '400';
    strResize = (blnResize ? 'yes' : 'no');

    // Set title and open popup with focus on it
    var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
        strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,            
        objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
  }
  
  /* ================================================== */
  
  $(document).ready(function ($) {
    $('.btn-success').on("click", function(e) {
      $(this).customerPopup(e);
    });
  });
    
}(jQuery));