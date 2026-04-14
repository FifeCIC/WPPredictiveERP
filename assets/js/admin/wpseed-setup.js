/*global evolvewp_erp_setup_params */
jQuery( function( $ ) {

    $( '.button-next' ).on( 'click', function() {
        $('.evolvewp-predictiveerp-setup-content').block({
            message: null,
            overlayCSS: {
                background: '#fff',
                opacity: 0.6
            }
        });
        return true;
    } );

    $( '.evolvewp-predictiveerp-wizard-plugin-extensions' ).on( 'change', '.evolvewp-predictiveerp-wizard-extension-enable input', function() {
        if ( $( this ).is( ':checked' ) ) {
            $( this ).closest( 'li' ).addClass( 'checked' );
        } else {
            $( this ).closest( 'li' ).removeClass( 'checked' );
        }
    } );

    $( '.evolvewp-predictiveerp-wizard-plugin-extensions' ).on( 'click', 'li.evolvewp-predictiveerp-wizard-extension', function() {
        var $enabled = $( this ).find( '.evolvewp-predictiveerp-wizard-extension-enable input' );

        $enabled.prop( 'checked', ! $enabled.prop( 'checked' ) ).change();
    } );

    $( '.evolvewp-predictiveerp-wizard-plugin-extensions' ).on( 'click', 'li.evolvewp-predictiveerp-wizard-extension table, li.evolvewp-predictiveerp-wizard-extension a', function( e ) {
        e.stopPropagation();
    } );
} );
