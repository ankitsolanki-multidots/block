const { RichText } = wp.editor;

wp.blocks.registerBlockType("ourblocktheme/customrichtext", {
    title: "Custom Rich Text Box",
    edit: function( {className, attributes, setAttributes} ) {
        const { content } = attributes;

        function onChangeContent( newContent ) {
            setAttributes( { content: newContent } );
        }

        return (
            <RichText
                tagName="p"
                className={ className }
                onChange={ onChangeContent }
                value={ content }
            />
        );
    },
    save: function( { attributes, className } ) {
        const { content } = attributes;

        return (
            <RichText.Content
                tagName="p"
                className="text-content"
                value={ content }
            />
        );
    },
})
