$(function(){

	// Lista de docente
	$.post( '../../View/funciones/categoria.php' ).done( function(respuesta)
	{
		$( '#categoria' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#categoria' ).change( function()
	{
		var el_continente = $(this).val();

	});


})
