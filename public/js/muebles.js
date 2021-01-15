$(document).ready(function(){

	mostrarDatosTablaMuebles();

	$('#btnAgregarMueble').click(function(){
		$.ajax({
			type:"POST",
			data:$('#frmAgregaMueble').serialize(),
			url:base_url + "/agregarMueble",
			success:function(respuesta){

				console.log(respuesta);
				if (respuesta > 0) {
					mostrarDatosTablaMuebles();
					swal(":)", "Genial agregado con exito!", "success");
				} else {
					swal(":(", "No se pudo agregar!", "error");
				}
			}
		});

		return false;
	});
});

function mostrarDatosTablaMuebles() {
	$.ajax({
			url:base_url + "/todosLosUsuario",
			dataType:"JSON",
			success:function(respuesta){

				cadena = '<table class="table table-hover table-dark text-center" id="tablaMuebles">'+
							'<thead>'+
								'<tr>'+
									'<th>Mueble</th>' +
									'<th>Tipo de Madera</th>' +
									'<th>Costo de Venta</th>' +
									'<th>Costo de Compra</th>' +
									'<th>Fecha</th>' +
									'<th>Editar</th>' +
									'<th>Eliminar</th>' +
								'</tr>'+
							'</thead>'+
							'<tbody>';
				$.each(respuesta, function(i, item) {
					cadena = cadena + "<tr>"+
											"<td>" + item.nombre + "</td>" +
											"<td>" + item.tipoMadera + "</td>" +
											"<td>" + item.costoVenta + "</td>" +
											"<td>" + item.costoCompra + "</td>" +
											"<td>" + item.fecha + "</td>" + 
											'<td>'+
												'<span class="btn btn-sm" style="background-color: #44BBA4; color: #FFFFFF;" data-toggle="modal" data-target="#modalActualizarMueble" '+
												' onclick="obtenerIdMueble(' + item.id_mueble + ')">'+
													'<span class="fas fa-user-edit"></span>'+
												'<span>'+
											'</td>' +
											'<td>'+
												'<span class="btn btn-danger btn-sm" onclick="eliminarMueble(' + item.id_mueble + ')">'+
													'<span class="fas fa-user-times"></span>'+
												'</span></td>' +
									  "</tr>";
				});
				cadena = cadena + "</tbody></table>";
				$('#tablaMueblesC').html(cadena);
				$("#tablaMuebles").DataTable();
			}
	});

	return false;
}

function eliminarMueble(idMueble) {

	swal({
		title: "¿Estas seguro de realizar esta acción?",
		text: "Una vez eliminado no podrá ser recuperado!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type:"POST",
				dataType:"JSON",
				data:"idMueble=" + idMueble, 
				url:base_url + "/eliminarMueble",
				success:function(respuesta) {
					if (respuesta['status']) {
						mostrarDatosTablaMuebles();
						swal(":)", "Genial agregado con exito!", "success");
					} else {
						
						swal(":(", "No se pudo eliminar!", "error");
					}
				}
			});
		} 
	});

}

function obtenerIdMueble(idMueble) {
	$.ajax({
		type:"POST",
		data:"idMueble=" + idMueble,
		dataType:"JSON", 
		url:base_url + "/obtenerMuebleId",
		success:function(respuesta) {

			$.each(respuesta, function(i, item) {
				$('#idMuebleA').val(item.id_mueble);
				$('#nombreA').val(item.nombre);
				$('#tipoA').val(item.tipoMadera);
				$('#costoVentaA').val(item.costoVenta);
				$('#costoCompraA').val(item.costoCompra);
				$('#fechaA').val(item.fecha);
			});
		}
	});
}

function actualizarMueble(){
	$.ajax({
			type:"POST",
			data:$('#frmAgregaUsuariou').serialize(),
			url:base_url + "/actualizarMueble",
			success:function(respuesta){

				console.log(respuesta);
				if (respuesta) {
					mostrarDatosTablaMuebles();
					swal(":)", "Genial actualizado con exito!", "success");
				} else {
					swal(":(", "No se pudo actualizar!", "error");
				}
			}
		});

		return false;
}
