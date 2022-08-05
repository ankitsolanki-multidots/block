wp.blocks.registerBlockType("ourblocktheme/banner", {
    title: "Banner",
    edit: EditComponent,
    save: saveComponent
})

function EditComponent() {
    return (<p>this is fron edit component </p>)
}

function saveComponent() {
    return (<p>This is from our block</p>)
} 