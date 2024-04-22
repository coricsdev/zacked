const { registerBlockType } = wp.blocks;
const { RichText } = wp.editor;

registerBlockType('zacked/custom-block', {
    title: 'Custom Block',
    icon: 'smiley',
    category: 'layout',
    attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'p',
        }
    },

    edit: ({ attributes, setAttributes }) => {
        const onChangeContent = (newContent) => {
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
