/**
 * Converts input, select- and textarea values into a nice formatted string to be used as data objects for $.ajax calls
 */
(function ($) {
    "use strict";
    $.fn.convertFormValues = function () {
        var returnString = '';
        this.find(':input').each(function () {
            if ($(this).attr('name').length > 0) {
                returnString += $(this).attr('name') + '=' + $(this).val() + '&';
            }
        });
        if (returnString.length > 0) {
            returnString = returnString.slice(0, -1);
        }
        return returnString;
    };
})(jQuery);