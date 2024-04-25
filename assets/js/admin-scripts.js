wp.domReady(() => {
    wp.hooks.addFilter(
        'blocks.registerBlockType',
        'zacked/custom-category',
        function(settings, name) {
            if (!settings.categories) {
                settings.categories = [];
            }
            settings.categories.push({
                slug: 'custom-category',
                title: 'Custom Theme Block Category',
                icon: 'star-filled'
            });
            return settings;
        }
    );
});
