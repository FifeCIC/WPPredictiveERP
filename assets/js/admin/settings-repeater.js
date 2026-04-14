jQuery(document).ready(function($) {
    'use strict';

    // Initialize repeater fields
    $('.evolvewp-predictiveerp-repeater-container').each(function() {
        var $container = $(this);
        var $items = $container.find('.evolvewp-predictiveerp-repeater-items');
        var $template = $container.find('.evolvewp-predictiveerp-repeater-template');
        var itemIndex = $items.find('.evolvewp-predictiveerp-repeater-item').length;

        // Make items sortable
        $items.sortable({
            handle: '.evolvewp-predictiveerp-repeater-handle',
            placeholder: 'evolvewp-predictiveerp-repeater-placeholder',
            update: function() {
                updateItemNumbers($items);
            }
        });

        // Add new item
        $container.on('click', '.evolvewp-predictiveerp-repeater-add', function(e) {
            e.preventDefault();
            var template = $template.html();
            var newItem = template.replace(/\{\{INDEX\}\}/g, itemIndex);
            $items.append(newItem);
            itemIndex++;
            updateItemNumbers($items);
        });

        // Remove item
        $container.on('click', '.evolvewp-predictiveerp-repeater-remove', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to remove this item?')) {
                $(this).closest('.evolvewp-predictiveerp-repeater-item').remove();
                updateItemNumbers($items);
            }
        });

        // Toggle item content
        $container.on('click', '.evolvewp-predictiveerp-repeater-toggle', function(e) {
            e.preventDefault();
            var $item = $(this).closest('.evolvewp-predictiveerp-repeater-item');
            $item.toggleClass('collapsed');
            $(this).find('.dashicons').toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');
        });
    });

    // Update item numbers
    function updateItemNumbers($items) {
        $items.find('.evolvewp-predictiveerp-repeater-item').each(function(index) {
            $(this).find('.evolvewp-predictiveerp-repeater-number').text(index + 1);
        });
    }
});
