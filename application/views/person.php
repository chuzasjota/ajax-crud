<!-- Page Content -->
<div class="container">

	<!-- Introduction Row -->
	<h1 class="my-4">Bienvenidos</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, explicabo dolores ipsam aliquam inventore corrupti eveniet quisquam quod totam laudantium repudiandae obcaecati ea consectetur debitis velit facere nisi expedita vel?</p>

	
	<?php if($persons){?>
	<!-- Team Members Row -->
	<div class="row">
		<div class="col-lg-12">
			<h2 class="my-4">Personas</h2>
		</div>
		<?php foreach ($persons as $person) {
			$id = $person->idPerson;
			$name = $person->name;
			$email = $person->email;
			$phone = $person->phone;
			$city = $person->city;
			$gender = $person->idGender;
		?>
			<div class="col-lg-4 col-sm-6 text-center mb-4">
				<?php  
					if ($gender == 1) {
						$url = 'http://placehold.it/200x200?text=Masculino';
					}else if($gender == 2){
						$url = 'http://placehold.it/200x200?text=Femenino';
					}
				?>
				<img class="rounded-circle img-fluid d-block mx-auto" src="<?php echo $url; ?>" alt="">
				<h3><?php echo $name; ?>
					<small><?php echo $city; ?></small>
				</h3>
				<p><?php echo $email; ?></p>
				<p><?php echo $phone; ?></p>
        <button class="btn btn-warning" onclick="edit(<?php echo $id;?>)">Editar</button>
				<button class="btn btn-danger" onclick="deletePerson(<?php echo $id;?>)">Eliminar</button>
			</div>
		<?php } ?>
	</div>
	<?php }else{
		print 'No hay Personas';
	} ?>

</div>
    <!-- /.container -->
    <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Editar Persona</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body form">
        <form action="<?php echo base_url(); ?>persona/update" method="post" id="formUpdate" class="my-4 form-horizontal">
        <input type="hidden" name="idPerson" id="idPerson" />
        <div class="form-body">
          <div class="form-group">
            <label class="control-label col-md-3">Nombre</label>
            <div class="col-md-9">
              <input name="name" placeholder="Nombre" id="nameE" class="form-control" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">E-mail</label>
            <div class="col-md-9">
              <input name="email" id="emailE" placeholder="E-mail" class="form-control" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Teléfono</label>
            <div class="col-md-9">
              <input name="phone" id="phoneE" placeholder="Teléfono" class="form-control" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Ciudad</label>
            <div class="col-md-9">
              <input name="city" id="cityE" placeholder="Ciudad" class="form-control" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Genero</label>
            <div class="col-md-9">
              <select name="idGender" id="idGenderE" class="form-control">
                <?php foreach ($genders as $gender) { ?>
                    <option value="<?php echo $gender->idGender; ?>"><?php echo $gender->gender; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
          <div class="modal-footer">
            <button type="submit" id="btnSave" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
      </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->