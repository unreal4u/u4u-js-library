/**
 * Converts input, select- and textarea values into a nice formatted string to be used as data objects for $.ajax calls
 */
(function ($) {
    "use strict";
    $.fn.convertFormValues = function (escapeOutput) {
        var returnString = '';
        if (typeof escapeOutput == 'undefined') {
            escapeOutput = false;
        }
        this.find(':input').each(function () {
            if ($(this).attr('name').length > 0) {
                var inputName = $(this).attr('name');
                var inputValue = $(this).val();
                
                if (escapeOutput == true) {
                    inputName = escape(inputName);
                    inputValue = escape(inputValue);
                }
                returnString += inputName + '=' + inputValue + '&';
            }
        });
        if (returnString.length > 0) {
            returnString = returnString.slice(0, -1);
        }
        return returnString;
    };
})(jQuery);