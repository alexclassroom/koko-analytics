jQuery(document).on('gform_confirmation_loaded', function(event, formId) {
    window.koko_analytics.trackEvent('Gravity Form submitted', 'Form ID: ' + formId + ', Page: ' + window.location.pathname);
});
