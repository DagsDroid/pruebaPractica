$(document).ready(function(){

$('#btnIniciarSesion').on('click', function(){
	var user = $('#txtUser').val();
	var pass = $('#txtPass').val();

	if (user=="" && pass=="") {
		$('.msj').text('*Por favor ingrese un usuario y contraseña');
	}else if (user=="") {
		$('.msj').text('*Por favor ingrese un usuario');
	}else if (pass=="") {
		$('.msj').text('*Por favor ingrese un contraseña');
	}else{
		//CODIGO AJAX
		var datosLogin =  JSON.stringify($('#frmLogin :input').serializeArray());

		$.ajax({
			type: 'post',
			async: false,
			dataType: 'json',
			data: {datosLogin:datosLogin, key:'login'},
			url: '../controler/UsuarioControler.php',
			success: function (data){
				if(data.estado==true){
					location.reload();
				}else{
					swal(data.desc);
				}
			},
			error: function(xhr, status){
				swal(
					"Error", 
					"Informe: " + status
				);

			}

		//FIN DEL AJAX
		});
			
		
	}
});




});