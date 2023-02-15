/**
 * Selects & Tags
 */

'use strict';

$(function() {
    const selectPicker = $('.selectpicker'),
        select2 = $('.select2'),
        select2Icons = $('.select2-icons');

    // Bootstrap Select
    // --------------------------------------------------------------------
    if (selectPicker.length) {
        selectPicker.selectpicker();
    }

    // Select2
    // --------------------------------------------------------------------

    // Default
    if (select2.length) {
        select2.each(function() {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>').select2({
                placeholder: 'Select value',
                dropdownParent: $this.parent(),
                enabled: 0,
                closeOnSelect: false
            });
        });
    }
    $('.fav_clr').on("select2:select", function(e) {
        var data = e.params.data.text;
        if (data == 'all') {
            $(".fav_clr > option").prop("selected", "selected");
            $(".fav_clr").trigger("change");
        }
    });

    // Select2 Icons
    if (select2Icons.length) {
        // custom template to render icons
        function renderIcons(option) {
            if (!option.id) {
                return option.text;
            }
            var $icon = "<i class='bx bxl-" + $(option.element).data('icon') + " me-2'></i>" + option.text;

            return $icon;
        }
        select2Icons.wrap('<div class="position-relative"></div>').select2({
            templateResult: renderIcons,
            templateSelection: renderIcons,
            escapeMarkup: function(es) {
                return es;
            }
        });
    }
});