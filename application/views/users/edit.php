<div class="ui-widget-header ui-corner-top ui-helper-clearfix" style="padding: 0.2em 0.6em;"><h3><?php echo $title; ?></h3></div>
<?php echo validation_errors(); ?>
 
<?php echo form_open('users/edit/'.$user_item['0']['id']); ?>
    <table class="table table-form">
        <tr>
            <td><label for="name">Nombre</label></td>
            <td><input type="input" class="form-control" name="name" size="50" value="<?php echo $user_item['0']['name'] ?>" /></td>
        </tr>
        <tr>
            <td><label for="email">Correo Electrónico</label></td>
            <td><input type="email" name="email" class="form-control" value="<?php echo $user_item['0']['email'] ?>" /></td>
        </tr>
        <tr>
            <td><label for="phone">Teléfono</label></td>
            <td><input type="input" class="form-control" name="phone" value="<?php echo $user_item['0']['phone'] ?>" /></td>
        </tr>
        <tr>
            <td><label for="age">Edad</label></td>
            <td><input type="input" class="form-control" name="age" value="<?php echo $user_item['0']['age'] ?>" /></td>
        </tr>
        <tr>
            <td><label for="roles">Roles</label></td>
            <td>
                <select name="roles[]" class="form-control" multiple >
                    <?php foreach($roles as $role) :?>
                        <?php $default = 1; ?>
                        <?php foreach($user_item as $key => $item) : ?>
                            <?php if($role['id']==$item['role_id']) : ?>
                                <option value="<?php echo $role['id']; ?>" selected><?php echo $role['name']; ?></option>
                                <?php $default = 0; ?>
                            <?php endif; ?>
                        <? endforeach; ?>
                                <?php if($default==1) : ?>
                                <option value="<?php echo $role['id']; ?>" ><?php echo $role['name']; ?></option>
                                <?php endif; ?>
                     <? endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" class="btn btn-success" value="Editar" />
                <a class="btn btn-danger" href="<?php echo base_url() ?>index.php/users"> Cancelar </a>
            </td>    
        </tr>        
    </table>
</form>
