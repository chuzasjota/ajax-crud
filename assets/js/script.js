function edit(id){
	// var url = base_url+'persona/edit/'+id;
	$.ajax({
		url: base_url+'persona/edit/'+id,
		type: "GET",
		dataType: "json",
		success: function(data) {				
			$('#modal_form').modal('show');
			$('#nameE').val(data.name);
			$('#emailE').val(data.email);
			$('#phoneE').val(data.phone);
			$('#cityE').val(data.city);
			$('#idGenderE').find('option[value="'+data.idGender+'"]').attr("selected", "selected");
			$('#idPerson').val(data.idPerson);
		},
		error: function (jqXHR, textStatus, errorThrown){
			swal({
				showConfirmButton: false,
			  	title: 'Error get data from ajax',
			  	type: 'error',
			});
		}
	});
}

function deletePerson(id){
	swal({
  title: 'Esta seguro?',
  text: "Desea eliminar la persona!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Eliminar !',
  cancelButtonText: 'No, cancelar!',
  confirmButtonClass: 'btn btn-success',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false,
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    $.ajax({
			url: base_url+'persona/delete/'+id,
			type: "GET",
			dataType: "json",
			success: function(response) {
			  	if (response) {
				    swal({
				      title:'Eliminado!',
				      text: 'Eliminado con exito',
				      type: 'success',
				      showConfirmButton: false,
				      timer: 1500
				    }).then(function () {
  						window.location.href = base_url;
					}, function (dismiss) {
  						window.location.href = base_url;
					});
			  	}
		  	},
		  	error: function (jqXHR, textStatus, errorThrown){
				swal({
					showConfirmButton: false,
				  	title: 'Error get data from ajax',
				  	type: 'error',
				});
			}
		});
  // result.dismiss can be 'cancel', 'overlay',
  // 'close', and 'timer'
  } else if (result.dismiss === 'cancel') {
    swal(
      'Cancelar',
      'La persona quedara a salvo :)',
      'error'
    )
  }
})
}

$(function(){
	$("#formInsert").submit(function(e){
		e.preventDefault()
		e.stopPropagation();
		$.ajax({
			url: $(this).attr("action"),
			type: $(this).attr("method"),
			dataType: "json",
			data: $(this).serialize(),
			success: function(response) {
				if(response){
					swal({
					  showConfirmButton: false,
					  title: 'Persona guardada con exito',
					  type: 'success',
					  timer: 1500
					}).then(function () {
  						window.location.href = base_url;
					}, function (dismiss) {
  						window.location.href = base_url;
					});
				}else{
					swal({
						showConfirmButton: false,
					  	title: 'Ha ocurrido un error en el guardado',
					  	type: 'error',
					});
				}
			}
		});
	});

	$("#formUpdate").submit(function(e){
		e.preventDefault()
		e.stopPropagation();
		$.ajax({
			url: $(this).attr("action"),
			type: $(this).attr("method"),
			dataType: "json",
			data: $(this).serialize(),
			success: function(response) {
				if(response){
					swal({
					  showConfirmButton: false,
					  title: 'Persona editada con exito',
					  type: 'success',
					  timer: 1500
					}).then(function () {
  						window.location.href = base_url;
					}, function (dismiss) {
  						window.location.href = base_url;
					});
				}else{
					swal({
						showConfirmButton: false,
					  	title: 'No ha cambiado ningun valor',
					  	type: 'warning'
					});
				}
			},
			error: function (jqXHR, textStatus, errorThrown){
				swal({
					showConfirmButton: false,
				  	title: 'Error get data from ajax',
				  	type: 'error',
				});
			}
		});
	});
});