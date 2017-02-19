<div class="ui-widget-header ui-corner-top ui-helper-clearfix" style="padding: 0.2em 0.6em;"><h3><?php echo $title; ?></h3></div>
<?php echo validation_errors(); ?>
<?php echo form_open('users/create'); ?>
    <table class="table table-form">
        <tr>
            <td><label for="name">Nombre</label></td>
            <td>
                <input type="input" class="form-control" name="name" size="50" placeholder="Introduce tu nombre" /></td>
        </tr>
        <tr>
            <td><label for="email">Correo Electrónico</label></td>
            <td><input type="email" class="form-control" name="email" size="50" placeholder="Introduce tu email" /></td>
        </tr>
        <tr>
            <td><label for="phone">Teléfono</label></td>
            <td><input type="input" class="form-control" name="phone" placeholder="Introduce tu teléfono" /></td>
        </tr>
        <tr>
            <td><label for="age">Edad</label></td>
            <td><input type="input" class="form-control" name="age" placeholder="Introduce tu edad" /></td>
        </tr>
        <tr>
            <td><label for="roles">Roles</label></td>
            <td>
                <select name="roles[]" class="form-control" multiple >
                    <?php foreach($roles as $role) :?>
                        <option value="<?php echo $role['id']; ?>"><?php echo $role['name']; ?></option>
                    <? endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" class="btn btn-success" value="Guardar" />
                <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/users"> Cancelar </a>
            </td>    
        </tr>
    </table>    
</form>
