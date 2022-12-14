const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

registerBlockType( 'myblock/static-example', {
	title: __( 'Static Block Example with JSX' ),
	icon: 'lock',
	category: 'common',
	edit() {
		return (
			<p>Static block example built with JSX.</p>
		);
	},
	save() {
		return (
			<p>Static block example built with JSX.</p>
		);
	},
} );
