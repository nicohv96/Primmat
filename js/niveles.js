$(function(){
	console.log('funcionando');
	obtener_clases();
	obtener_clases_alumnos();

	$('#form_crear_clase').submit(function(e){
		const datos_post = {
			nombre: $('#nombre_clase').val(),
			descripcion: $('#desc_clase').val()
		};
		e.preventDefault();
		$.post(
			'../.controladores/insert/insertar_clase.php',
			datos_post,
			function(respuesta){
				console.log(respuesta);
				obtener_clases();
				$('#form_crear_clase').trigger('reset');
			}
		);
	});

	$('#form_agregar_clase').submit(function(e){
		const datos_post = {
			codigo: $('#codigo_clase').val(),
		};
		e.preventDefault();
		$.post(
			'../.controladores/insert/insertar_clase_alumno.php',
			datos_post,
			function(respuesta){
				console.log(respuesta);
				obtener_clases_alumnos();
				$('#form_agregar_clase').trigger('reset');
			}
		);
	});

	function obtener_clases(){
		$.ajax({
			url: '../.controladores/mostrar/mostrar_clase_profesor.php',
			type: 'GET',
			success: function(respuesta){
				//console.log(respuesta);
				var clases = JSON.parse(respuesta);
				var plantilla = '';
				clases.forEach(clase => {
					plantilla += `
						<tr clase_id="${clase.id}">
							<td>${clase.nombre}</td>
							<td>${clase.descripcion}</td>
							<td>
								<button class="btn btn-danger clase_borrar">
									<i class="fa fa-trash"></i>
								</button>
								
								<a href="../.vistas/temas_clase.php?clase=${clase.id}" class="btn btn-primary clase_ingresar">Ingresar</a>

								<button class="btn btn-info clase_detalle">
									Ver detaller <i class="fa fa-plus"></i>
								</button>
							</td>
						</tr>
					`
				});
				$('#clases').html(plantilla);			
			}
		});
	}

	function obtener_clases_alumnos(){
		$.ajax({
			url: '../.controladores/mostrar/mostrar_clase_alumno.php',
			type: 'GET',
			success: function(respuesta_alumno){
				//console.log(respuesta_alumno);
				var clases_alumno = JSON.parse(respuesta_alumno);
				var plantilla = '';
				clases_alumno.forEach(clase_alumno => {
					plantilla += `
						<tr clase_alumno_id="${clase_alumno.id}">
							<td>${clase_alumno.nombre}</td>
							<td>${clase_alumno.descripcion}</td>
							<td>
								<button class="btn btn-danger clase_borrar_alumno">
									<i class="fa fa-trash"></i>
								</button>

								<a href="../.vistas/temas_clase.php?clase=${clase_alumno.id}" class="btn btn-primary clase_ingresar">Ingresar</a>

								<button class="btn btn-info clase_detalle">
									Ver detaller <i class="fa fa-plus"></i>
								</button>
							</td>
						</tr>
					`
				});
				$('#clases_alumno').html(plantilla);
			}
		});
	}

	$(document).on('click', '.clase_borrar', function(){
		if(confirm('¿Esta seguro que desea eliminar este elemento?')){
			//console.log('Clickeado');
			var elemento = $(this)[0].parentElement.parentElement;
			var id_clase = $(elemento).attr('clase_id');
			//console.log(elemento);
			$.post(
				'../.controladores/borrar/borrar_clase.php',
				{id_clase},
				function(respuesta){
					obtener_clases();
					console.log(respuesta);
				}
			);
		}
	})


	$(document).on('click', '.clase_detalle', function(){
		var elemento = $(this)[0].parentElement.parentElement;
		var id_clase = $(elemento).attr('clase_id');
		//console.log(elemento);
		$.post(
			'../.controladores/mostrar/mostrar_detalle_clase_profesor.php',
			{id_clase},
			function(respuesta){
				var detalles_clases = JSON.parse(respuesta);
				detalles_clases.forEach(detalle_clase => {
					alert('El codigo de la clase es: '+detalle_clase.codigo_clase);
				});
			}
		);
	})

	/*
	$(document).on('click', '.clase_detalle_alumno', function(){
		var elemento = $(this)[0].parentElement.parentElement;
		var id_clase = $(elemento).attr('clase_alumno_id');
		//console.log(elemento);
		$.post(
			'../.controladores/mostrar/mostrar_detalle_clase_alumno.php',
			{id_clase},
			function(respuesta){
				var detalles_clases = JSON.parse(respuesta);
				detalles_clases.forEach(detalle_clase => {
					alert('El responsble de la clase es: '+detalle_clase.codigo_clase);
				});
			}
		);
	})
	
	$(document).on('click', '.clase_borrar_alumno', function(){
		if(confirm('¿Esta seguro que desea eliminar esta clase?')){
			//console.log('Clickeado');
			var elemento = $(this)[0].parentElement.parentElement;
			var id_clase = $(elemento).attr('clase_id');
			//console.log(elemento);
			$.post(
				'../.controladores/borrar/borrar_clase.php',
				{id_clase},
				function(respuesta){
					obtener_clases();
					console.log(respuesta);
				}
			);
		}
	})
	

	$(document).on('click', '.clase_ingresar', function(){
		var elemento = $(this)[0].parentElement.parentElement;
		var id_clase = $(elemento).attr('clase_id');
    	$.post(
			'../.vistas/temas_clase.php',
			{id_clase}
		);
		location.href = '../.vistas/temas_clase.php';
	});
	*/
});