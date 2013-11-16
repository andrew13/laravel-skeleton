$(function () {

    Application.init ();
});



var Application = function () {

    var validationRules = getValidationRules ();

    return { init: init, validationRules: validationRules };

    function init () {

        enableBackToTop ();
        enableLightbox ();
        enableCirque ();
        enableEnhancedAccordion ();
        enableDeleteConfirm();


        $('.ui-tooltip').tooltip();
        $('.ui-popover').popover();
    }

    /**
     * Put .form-confirm-delete class on any form you want to verify delete
     */
    function enableDeleteConfirm() {
        if ($.msgbox) {
            $('.form-confirm-delete').on ('click', function (e) {
                e.preventDefault();
                var self = $(this);
                $.msgbox("Are you sure that you want to permanently delete the selected element?", {
                    type: "confirm",
                    buttons : [
                        {type: "submit", value: "Yes"},
                        {type: "submit", value: "No"},
                        {type: "cancel", value: "Cancel"}
                    ]
                }, function(result) {
                    if(result != 'Yes') {
                        return false;
                    } else {
                        self.submit();
                    }
                });
            });
        }
    }

    function enableCirque () {
        if ($.fn.cirque) {
            $('.ui-cirque').cirque ({  });
        }
    }

    function enableLightbox () {
        if ($.fn.lightbox) {
            $('.ui-lightbox').lightbox ();
            $('.lightbox-type').lightbox ();
        }
    }

    function enableBackToTop () {
        var backToTop = $('<a>', { id: 'back-to-top', href: '#top' });
        var icon = $('<i>', { class: 'icon-chevron-up' });

        backToTop.appendTo ('body');
        icon.appendTo (backToTop);

        backToTop.hide();

        $(window).scroll(function () {
            if ($(this).scrollTop() > 150) {
                backToTop.fadeIn ();
            } else {
                backToTop.fadeOut ();
            }
        });

        backToTop.click (function (e) {
            e.preventDefault ();

            $('body, html').animate({
                scrollTop: 0
            }, 600);
        });
    }

    function enableEnhancedAccordion () {
        $('.accordion-toggle').on('click', function (e) {
            $(e.target).parent ().parent ().parent ().addClass('open');
        });

        $('.accordion-toggle').on('click', function (e) {
            $(this).parents ('.panel').siblings ().removeClass ('open');
        });

    }

    function getValidationRules () {
        var custom = {
            focusCleanup: false,

            wrapper: 'div',
            errorElement: 'span',

            highlight: function(element) {
                $(element).parents ('.form-group').removeClass ('success').addClass('error');
            },
            success: function(element) {
                $(element).parents ('.form-group').removeClass ('error').addClass('success');
                $(element).parents ('.form-group:not(:has(.clean))').find ('div:last').before ('<div class="clean"></div>');
            },
            errorPlacement: function(error, element) {
                error.prependTo(element.parents ('.form-group'));
            }

        };

        return custom;
    }

}();