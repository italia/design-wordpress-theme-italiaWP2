(function($) {
$.fn.changeElementType = function(newType) {
    return this.each(function () {
        var el = this;
        if (!el.attributes) return;

        var attrs = {};
        $.each(el.attributes, function (idx, attr) {
            attrs[attr.nodeName] = attr.nodeValue;
        });

        $(el).replaceWith($("<" + newType + "/>", attrs).append($(el).contents()));
    });
    }
})(jQuery);