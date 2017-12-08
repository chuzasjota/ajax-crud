<div class="container">
  <div class="row">
    <h2 class="my-4">Crear Persona</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente excepturi omnis odit ab delectus exercitationem incidunt eum reprehenderit, necessitatibus asperiores eveniet animi sed, quae voluptate quos eos assumenda soluta. Dicta?</p>
    <a href="<?php echo base_url(); ?>" class="btn btn-danger">Atrás</a>
    <div class="col-md-12">
      <form action="<?php echo base_url(); ?>persona/insert" method="post" id="formInsert" class="my-4 form-horizontal">
        <div class="form-body">
          <div class="form-group">
            <label class="control-label col-md-3">Nombre</label>
            <div class="col-md-9">
              <input name="name" placeholder="Nombre" id="name" class="form-control" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">E-mail</label>
            <div class="col-md-9">
              <input name="email" id="email" placeholder="E-mail" class="form-control" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Teléfono</label>
            <div class="col-md-9">
              <input name="phone" id="phone" placeholder="Teléfono" class="form-control" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Ciudad</label>
            <div class="col-md-9">
              <input name="city" id="city" placeholder="Ciudad" class="form-control" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Genero</label>
            <div class="col-md-9">
              <select name="idGender" id="idGender" class="form-control">
                <?php foreach ($genders as $gender) { ?>
                    <option value="<?php echo $gender->idGender; ?>"><?php echo $gender->gender; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9">
              <button type="submit" id="btnSave" class="btn btn-primary">Guardar</button>
              <a href="<?php echo base_url(); ?>" class="btn btn-danger">Atrás</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>