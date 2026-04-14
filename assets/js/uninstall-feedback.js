jQuery(document).ready(function($) {
    var deactivateLink = '';
    
    // Intercept deactivate link click
    $('tr[data-slug="' + evolvewpCoreUninstall.plugin_slug.split('/')[0] + '"] .deactivate a').on('click', function(e) {
        e.preventDefault();
        deactivateLink = $(this).attr('href');
        $('#evolvewp-predictiveerp-uninstall-feedback-modal').fadeIn(200);
    });
    
    // Close modal
    $('.evolvewp-predictiveerp-modal-close, .evolvewp-predictiveerp-modal-overlay').on('click', function() {
        $('#evolvewp-predictiveerp-uninstall-feedback-modal').fadeOut(200);
    });
    
    // Show details textarea for certain reasons
    $('input[name="reason"]').on('change', function() {
        var value = $(this).val();
        if (value === 'missing_features' || value === 'not_working' || value === 'other') {
            $('.evolvewp-predictiveerp-details').slideDown(200);
        } else {
            $('.evolvewp-predictiveerp-details').slideUp(200);
        }
    });
    
    // Skip and deactivate
    $('.evolvewp-predictiveerp-skip').on('click', function() {
        window.location.href = deactivateLink;
    });
    
    // Submit feedback and deactivate
    $('.evolvewp-predictiveerp-submit').on('click', function() {
        var $btn = $(this);
        var reason = $('input[name="reason"]:checked').val();
        
        if (!reason) {
            alert('Please select a reason');
            return;
        }
        
        $btn.prop('disabled', true).text('Submitting...');
        
        $.ajax({
            url: evolvewpCoreUninstall.ajaxurl,
            type: 'POST',
            data: {
                action: 'evolvewp_erp_uninstall_feedback',
                nonce: evolvewpCoreUninstall.nonce,
                reason: reason,
                details: $('textarea[name="details"]').val(),
                email: $('input[name="email"]').val()
            },
            success: function() {
                window.location.href = deactivateLink;
            },
            error: function() {
                window.location.href = deactivateLink;
            }
        });
    });
});
