const { registerBlockType } = wp.blocks;
const { RichText } = wp.blockEditor; // Changed from wp.editor to wp.blockEditor

registerBlockType('zacked/my-custom-block', {
    title: 'My Custom Block',
    icon: 'smiley',
    category: 'custom-category',
    attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'p',
        }
    },
    edit: ({ attributes, setAttributes }) => {
        const onChangeContent = newContent => {
            setAttributes({ content: newContent });
        };

        return (
            <RichText
                tagName="p"
                value={attributes.content}
                onChange={onChangeContent}
            />
        );
    },
    save: ({ attributes }) => {
        return (
            <RichText.Content tagName="p" value={attributes.content} />
        );
    }
});
