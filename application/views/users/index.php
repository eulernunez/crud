<div class="ui-widget-header ui-corner-top ui-helper-clearfix" style="padding: 0.2em 0.6em;"><h3><?php echo $title; ?></h3></div>
<table class="table table-striped">
    <thead>
        <tr >
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Edad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $users_item): ?>
        <tr class="clickable-row">
            <td><?php echo $users_item['name']; ?></td>
            <td><?php echo $users_item['email']; ?></td>
            <td><?php echo $users_item['phone']; ?></td>
            <td><?php echo $users_item['age']; ?></td>
            <td>
                <a class="btn btn-success" href="<?php echo site_url('users/edit/'.$users_item['id']); ?>">Editar</a>
            </td>
<!--            <td>
                <button type="button" class="btn btn-success" data-toggle="modal" id="<?php echo $users_item['id']; ?>" onclick="$(this).addClass('selected');" data-target="#myModalEdit">Editar</button>
            </td>-->
            <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" id="<?php echo $users_item['id']; ?>" onclick="$(this).addClass('selected');" data-target="#myModalDelete">Eliminar</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>    
</table>
<div class="clearfix">&nbsp;</div>
<div id="result"></div>    

<div class="modal fade" style="z-index:5000; margin-top: 60px;" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
            </div>
            <div class="modal-body">
                
                ¿Estás seguro que deseas eliminar a este usuario? 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="float: left;">Cancelar</button>
                <button type="button" class="btn btn-danger" style="float: left;" onclick="userDelete();" >Eliminar</button>
            </div>
        </div>
    </div>
</div>


    
    
    
<script type="text/javascript">
    baseUrl = '<?php echo base_url(); ?>';
    //<![CDATA[
    
    function userDelete() {
        var id;
        $(".selected").each(function() {
               id = $(this).attr('id');
            });
        
        $('#myModalDelete').modal('hide');

        var formData = {id: id};
        urlPath = baseUrl + '/index.php/users/delete/';

        $.ajax({
            type: "POST",
            url: urlPath,
            data: formData,
            cache: false,
            success: function (html) {
                html = "<div class='alert alert-success'>Success!</div>";
                setTimeout(function() {
                    window.location.href = baseUrl + 'index.php/users/';
                }, 1000);
                $("#result").html(html);
            },
            error: function (xhr, status) {
                html = "<div class='alert alert-danger'>Error!</div>"
                $("#result").html(html);
            }
        });

    }
    //]]>

</script>