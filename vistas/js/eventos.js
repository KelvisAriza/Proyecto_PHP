$(".tablaEventos").DataTable({
	
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});


/*EDITAR EVENTO*/

$(".tablaEventos").on("click", ".btnEditarEvento", function(){

	var idEvento = $(this).attr("idEvento");
	//console.log(idEvento);
	var datos = new FormData();
	datos.append("idEvento", idEvento);

	$.ajax({

		url:"ajax/eventos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#idEventoE").val(respuesta["eventoId"]);
			$("#tipoE").val(respuesta["tipoActividad"]);
			$("#nameE").val(respuesta["nombreActividad"]);
			$("#fechaE").val(respuesta["fecha"]);
			$("#asignadoE").val(respuesta["asignadoRB"]); 		
		}

	})

})


/**ELIMINAR EVENTO */

$(document).on("click", ".eliminarEvento", function(){

	var idEventoE = $(this).attr("idEventoE");
	
	swal({
		title: '¿Está seguro de eliminar este evento?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, eliminar evento!'
	}).then(function(result){


		if (result.value) {

			var datos = new FormData();
			datos.append("idEventoE", idEventoE);
			

			$.ajax({

				url: "ajax/eventos.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success:function (respuesta) {

					console.log(respuesta);

					if (respuesta == "ok") {
						swal({
							type: "success",
							title: "¡CORRECTO!",
							text: "El evento ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function (result) {

							if (result.value){

								window.location = "eventos";
								
                     		}
                		})
             		}
          		}
        	})
      	}

    })

})