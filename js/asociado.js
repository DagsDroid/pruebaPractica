$(document).ready(function () {

	//MASKED INPUT
	$('#txtDui').mask('00000000-0');
	$('#txtNit').mask('0000-000000-000-0');
	$('#txtNombre').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#txtApellido').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');

	//FOR MOD
	$('#txtDuiMod').mask('00000000-0');
	$('#txtNitMod').mask('0000-000000-000-0');
	$('#txtNombreMod').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
	$('#txtApellidoMod').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');


	//EVENTO PARA AGREGAR UN ASOCIADP
	$('#btnGuardar').on('click', function () {
		var nombre = $('#txtNombre').val();
		var apellido = $('#txtApellido').val();
		var dui = $('#txtDui').val();
		var nit = $('#txtNit').val();
		var estado = $('#slcEstadoCivil').val();
		var direccion = $('#txtDireccion').val();
		var dep = $('#slcDepartamento').val();
		var mun = $('#slcMunicipio').val();

		if (nombre=="" && apellido=="" && dui=="" && nit=="" && estado=="0" && direccion=="" && dep=="0" && mun=="0") {
			$('.msj').text('*Por favor llene el formulario');
		}else if (nombre=="") {
			$('.msj').text('*Por favor digite el nombre del asociado');
		}else if (apellido==""){
			$('.msj').text('*Por favor digite el apellido del asociado');
		}else if(dui==""){
			$('.msj').text('*Por favor digite el dui del asociado');
		}else if(nit==""){
			$('.msj').text('*Por favor digite el nit del asociado');
		}else if(estado=="0"){
			$('.msj').text('*Por favor seleccion un estado civil');
		}else if(direccion==""){
			$('.msj').text('*Por favor digite una direccion');
		}else if(dep=="0"){
			$('.msj').text('*Por favor seleccione un departamento');
		}else if (mun=="0"){
			$('.msj').text('*Por favor seleccione un municipio');
		}else{
			

			Swal.fire({
			  title: '¿Esta seguro?',
			  text: "¿Desea agregar un nuevo registro?",
			  icon: 'info',
			  showCancelButton: true,
			  confirmButtonText: 'Si, Guardar!',
			  cancelButtonText: 'No, Cancelar!',
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  reverseButtons: true
			}).then((result) => {
				if (result.isConfirmed) {
					var dataAsociado = JSON.stringify($('#frmAgregarAsociado :input').serializeArray());

					$.ajax({
						type: 'post',
						async: false,
						dataType:'json',
						data:{dataAsociado:dataAsociado,key:'addAsociado'},
						url:'../controler/AsociadoControler.php',
						success: function(data){							
							if (data.estado==true) {
								const Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									showConfirmButton: false,
									timer: 3000,
									timerProgressBar: true,
									didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									}
								});

								Toast.fire({
								  icon: 'success',
								  title: 'Asociado Agregado'
								})
								setTimeout ( function () {
									location.reload();
								}, 1000);
							}else{
								Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'Informe: ' + data.desc
								});
							}
						},
						error: function(xhr,status){

						}
					});
				}
			});
			
		}
	});


	//EVENTO PARA MODIFICAR UN ASOCIADO
	$('#btnModificar').on('click', function () {

		var id = $('#txtIdMod').val();
		var nombre = $('#txtNombreMod').val();
		var apellido = $('#txtApellidoMod').val();
		var dui = $('#txtDuiMod').val();
		var nit = $('#txtNitMod').val();
		var estado = $('#slcEstadoCivilMod').val();
		var direccion = $('#txtDireccionMod').val();
		var dep = $('#slcDepartamentoMod').val();
		var mun = $('#slcMunicipioMod').val();

		if (nombre=="" && apellido=="" && dui=="" && nit=="" && estado=="0" && direccion=="" && dep=="0" && mun=="0") {
			$('.msj').text('*Por favor llene el formulario');
		}else if (nombre=="") {
			$('.msj').text('*Por favor digite el nombre del asociado');
		}else if (apellido==""){
			$('.msj').text('*Por favor digite el apellido del asociado');
		}else if(dui==""){
			$('.msj').text('*Por favor digite el dui del asociado');
		}else if(nit==""){
			$('.msj').text('*Por favor digite el nit del asociado');
		}else if(estado=="0"){
			$('.msj').text('*Por favor seleccion un estado civil');
		}else if(direccion==""){
			$('.msj').text('*Por favor digite una direccion');
		}else if(dep=="0"){
			$('.msj').text('*Por favor seleccione un departamento');
		}else if (mun=="0"){
			$('.msj').text('*Por favor seleccione un municipio');
		}else{
			
			
			Swal.fire({
			  title: '¿Esta seguro?',
			  text: "¿Desea modificar el registro con ID: "+id+"?",
			  icon: 'info',
			  confirmButtonText: 'Si, Modificar!',
			  cancelButtonText: 'No, Cancelar!',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  reverseButtons: true
			}).then((result) => {
				if (result.isConfirmed) {
					var dataAsociado = JSON.stringify($('#frmModificarAsociado :input').serializeArray());

					$.ajax({
						type: 'post',
						async: false,
						dataType:'json',
						data:{dataAsociado:dataAsociado,key:'updateAsociado'},
						url:'../controler/AsociadoControler.php',
						success: function(data){							
							if (data.estado==true) {
								const Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									showConfirmButton: false,
									timer: 3000,
									timerProgressBar: true,
									didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									}
								});

								Toast.fire({
								  icon: 'success',
								  title: 'Asociado Modificado'
								})
								setTimeout ( function () {
									location.reload();
								}, 1000);
							}else{
								Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'Informe: ' + data.desc
								});
							}
						},
						error: function(xhr,status){

						}
					});
				}
			});
			
		}
	});


	//EVENTO PARA ASIGNARLE VALOR AL SELECT DE MUNICIPIO DE MODIFICAR CADA VEZ QUE CAMBIE
	$('#slcDepartamento').on('change', function() {

		if ($(this).val()!=0) {
			
			$('#slcMunicipio').empty();
			var esp = $(this).val();

			$.ajax({
				type: 'post',
				async: false,
				dataType: 'json',
				data: {esp:esp, key:'getMunicipio'},
				url: '../controler/AsociadoControler.php',
				success: function (data){				

					$("#slcMunicipio").append('<option value="0">..::Seleccione un Municipio::..</option>');
						$.each(data, function(id,value){
							if (id!=0) {

	 							$("#slcMunicipio").append('<option value="'+id+'">'+value+'</option>');						
							}else{
	 							$("#slcMunicipio").append('<option value="'+id+'">'+value+'</option>');						

							}
	     				});			
				},
				error: function(xhr, status){
					$('#slcMunicipio').append('<option value="0">'+status+'</option>');
				}

			//FIN DEL AJAX
			});
		}else{
			$('#slcMunicipio').empty();
			$('#slcMunicipio').append('<option value="0">..::Esperando::..</option>');
		}
	});

	//EVENTO PARA ASIGNARLE VALOR AL SELECT DE MUNICIPIO DE MODIFICAR CADA VEZ QUE CAMBIE
	$('#slcDepartamentoMod').on('change', function() {

		if ($(this).val()!=0) {
			
			$('#slcMunicipioMod').empty();
			var esp = $(this).val();

			$.ajax({
				type: 'post',
				async: false,
				dataType: 'json',
				data: {esp:esp, key:'getMunicipio'},
				url: '../controler/AsociadoControler.php',
				success: function (data){				

					$("#slcMunicipioMod").append('<option value="0">..::Seleccione un Municipio::..</option>');
						$.each(data, function(id,value){
							if (id!=0) {

	 							$("#slcMunicipioMod").append('<option value="'+id+'">'+value+'</option>');						
							}else{
	 							$("#slcMunicipioMod").append('<option value="'+id+'">'+value+'</option>');						

							}
	     				});			
				},
				error: function(xhr, status){
					$('#slcMunicipioMod').append('<option value="0">'+status+'</option>');
				}

			//FIN DEL AJAX
			});
		}else{
			$('#slcMunicipioMod').empty();
			$('#slcMunicipioMod').append('<option value="0">..::Esperando::..</option>');
		}
	});


	var table = $('#listadoAsociado').DataTable();
	$('#listadoAsociado tbody').on('click','tr', function () {
		var datad = table.row(this).data();
		var code = datad[1];

		$.ajax({
			type: 'post',
			async: false,
			dataType:'json',
			data:{code:code,key:'getAsociado'},
			url:'../controler/AsociadoControler.php',
			success: function(data){							
				if (data.estado==true) {
					$('#txtIdMod').val(data.id);
					$('#txtNombreMod').val(data.nombre);
					$('#txtApellidoMod').val(data.apellido);
					$('#txtDuiMod').val(data.dui);
					$('#txtNitMod').val(data.nit);
					$('#slcEstadoCivilMod').val(data.estadoCivil);
					$('#txtDireccionMod').val(data.direccion);
					$('#slcDepartamentoMod').val(data.dep);
					$('#slcMunicipioMod').val(data.mun);



					//MOSTRAR DATOS
					$('#mIdAsociado').text(data.id);
					$('#mNombreAsociado').text(data.nombre+" "+data.apellido);
					$('#mDui').text(data.dui);
					$('#mNit').text(data.nit);
					$('#mEstadoCivil').text(data.nombreEstadoCivil);
					$('#mDireccion').text(data.direccion);
					$('#mDepartamento').text(data.nombreDepartamento);
					$('#mMunicipio').text(data.nombreMunicipio);

				var esp = $('#slcDepartamentoMod').val();
				$('#slcMunicipioMod').empty();
				$.ajax({
					type: 'post',
					async: false,
					dataType: 'json',
					data: {esp:esp, key:'getMunicipio'},
					url: '../controler/AsociadoControler.php',
					success: function (data2){
						


						$("#slcMunicipioMod").append('<option value="0">..::Seleccione un municipio::..</option>');
							$.each(data2, function(id,value){
								if (id!=0) {
									$("#slcMunicipioMod").append('<option value="'+id+'">'+value+'</option>');						
								}else{
									$("#slcMunicipioMod").append('<option value="'+id+'">'+value+'</option>');						

								}
							});	
						$('#slcMunicipioMod').val(data.mun);		
				},
				error: function(xhr, status){
					$('#slcMunicipioMod').append('<option value="0">'+status+'</option>');
				}

				//FIN DEL AJAX
				});	
				}else{
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Informe: ' + data.desc
					});
				}
			},
			error: function(xhr,status){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Servidor no conectado, informe: ' + status
				});
			}
		});


	});



	$('#listadoAsociado tbody').on('click','tr .btnBaja', function () {

		Swal.fire({
		  title: '¿Seguro?',
		  text: "¿Desea dar de baja al asociado?",
		  icon: 'info',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  reverseButtons: true,
		  confirmButtonText: 'Si, dar de baja!'
		}).then((result) => {
			if (result.isConfirmed) {

				var id = $(this).attr('id');

				$.ajax({
					type: 'post',
					async: false,
					dataType:'json',
					data:{code:id,key:'bajaAsociado'},
					url:'../controler/AsociadoControler.php',
					success: function(data){							
						if (data.estado==true) {
							const Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000,
								timerProgressBar: true,
								didOpen: (toast) => {
									toast.addEventListener('mouseenter', Swal.stopTimer)
									toast.addEventListener('mouseleave', Swal.resumeTimer)
								}
							});

							Toast.fire({
							  icon: 'success',
							  title: 'ASOCIADO DE BAJA'
							})
							setTimeout ( function () {
								location.reload();
							}, 1000);
						}else{
							Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'Informe: ' + data.desc
							});
						}
					},
					error: function(xhr,status){

					}
				});
			}
		})


		
	});

	$('#listadoAsociado tbody').on('click','tr .btnActive', function () {
		Swal.fire({
		  title: '¿Seguro?',
		  text: "¿Desea activar el asociado?",
		  icon: 'info',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  reverseButtons: true,
		  confirmButtonText: 'Si, Activar!'
		}).then((result) => {
			if (result.isConfirmed) {

				var id = $(this).attr('id');

				$.ajax({
					type: 'post',
					async: false,
					dataType:'json',
					data:{code:id,key:'activeAsociado'},
					url:'../controler/AsociadoControler.php',
					success: function(data){							
						if (data.estado==true) {
							const Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000,
								timerProgressBar: true,
								didOpen: (toast) => {
									toast.addEventListener('mouseenter', Swal.stopTimer)
									toast.addEventListener('mouseleave', Swal.resumeTimer)
								}
							});

							Toast.fire({
							  icon: 'success',
							  title: 'ASOCIADO ACTIVADO'
							})
							setTimeout ( function () {
								location.reload();
							}, 1000);
						}else{
							Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'Informe: ' + data.desc
							});
						}
					},
					error: function(xhr,status){

					}
				});
			}
		})


		
	});


		






























});