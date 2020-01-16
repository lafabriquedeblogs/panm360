wp.domReady( () => {

    wp.blocks.registerBlockStyle( 'core/paragraph',
    	[
    	{
	        name: 'agenda-first-part',
			label: 'Agenda premiere partie'
		},
		{
			name: 'chapeau-header',
			label: 'Chapeau Header'
		}

		]
	);

} );