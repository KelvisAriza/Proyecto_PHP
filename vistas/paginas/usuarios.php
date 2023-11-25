<div class="content-wrapper" style="min-height: 717px;">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>ADMINISTRAR USUARIOS</h1>

                </div>

            </div>

        </div><!-- /.container-fluid -->

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <!-- Default box -->
                    <div class="card card-info card-outline">

                        <div class="card-header">

                            <button type="button" class="btn btn-success crear-usuarios" data-toggle="modal"
                                data-target="#modal-crear-usuarios">
                                Crear Nuevo Usuario
                            </button><br>

                        </div><br>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered table-striped dt-responsive tablaUsuarios" width="100%">

                                <thead>

                                    <tr>

                                        <th style="width: 10px;">#</th>                                        
                                        <th>Identificacion</th>
                                        <th>Nombres Completo</th>
                                        <th>Nombre Usuario</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php  ?>



                                    <?php 
                                     foreach($usuarios as $key => $value){

                                        $item="usuarioId";

                                        $valor =$value["nomRol"];

                                        $roles = ctrRoles::ctrMostrarRoles($item ,$valor);
                                                                      
                                    ?>

                                    <tr>
                                        
                                        <td><?php echo ($key+1)?></td>
                                        <td><?php echo $value["identificacion"]?></td>
                                        <td><?php echo $value["nombresCompletos"]?></td>
                                        <td><?php echo $value["nombreUsuario"]?></td>
                                        <td><?php echo $roles["nom_rol"]?></td>
                                        
                                        <td>
                                            <div class='btn-group'>

                                                <button class="btn btn-warning btn-sm btnEditarUsuario"
                                                    data-toggle="modal" idUsuario="<?php echo $value["registroId"]?>"
                                                    data-target="#modal-editar-usuarios">
                                                    <i class="fas fa-pencil-alt text-white"></i>
                                                </button>

                                                <button class="btn btn-danger btn-sm eliminarUsuario"
                                                    idUsuarioE="<?php echo $value["registroId"] ?>">
                                                    <i class=" fas fa-trash-alt"></i>
                                                </button>

                                            </div>

                                        </td>

                                    </tr>


                                    <?php 

                                     }

                                    ?>


                                </tbody>

                            </table>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">

                        </div>
                        <!-- /.card-footer-->

                    </div>
                    <!-- /.card -->

                </div>

            </div>

        </div>

    </section>


</div>


<!--=====================================
Modal Crear usuarios
======================================-->
<div class="modal modal-default fade" id="modal-crear-usuarios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar Nuevo Usuario</h4>
            </div>
            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="number" class="form-control" name="ident" placeholder="Identificación">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="name_com" placeholder="Nombres Completos">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="user_name" placeholder="Nombre Usuario">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="password" class="form-control" name="pass_user" placeholder="Password" autocomplete="current-password">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>


                <div class="form-group has-feedback">

                    <label>Rol</label>
                    <select class="form-control" name="rol_user" required>

                        <?php
                        $roles = ctrRoles::ctrMostrarRoles2();
                        
                        foreach($roles as $rol){
                            
                        ?>
                        <option value="<?php echo $rol["usuarioId"] ?>"><?php echo $rol["nom_rol"] ?></option>
                        <?php
                        }
                        ?>

                    </select>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <?php 
                $guardarusuarios = new ctrUsuarios();
                $guardarusuarios->ctrGuardarUsuarios();  
                ?>


            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<!--=====================================
Modal EDITAR usuarios
======================================-->
<div class="modal modal-default fade" id="modal-editar-usuarios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Editar Usuario</h4>
            </div>
            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" id="idPerfilE" name="idPerfilE" >
                    <input type="number" class="form-control" id="identE" name="identE" placeholder="Identificación">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" id="name_comE" name="name_comE" placeholder="Nombres Completo">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" id="user_nameE" name="user_nameE" placeholder="Nombre Usuario">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" id="pass_userActualE" name="pass_userActualE">
                    <input type="password" class="form-control" id="pass_userE" name="pass_userE" placeholder="password" autocomplete="current-password">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>


                <div class="form-group has-feedback">


                    <label>Rol</label>
                    <select class="form-control" name="rol_userE" required>

                        <?php
                        $roles = ctrRoles::ctrMostrarRoles2();
                        
                        foreach($roles as $rol){
                            
                        ?>
                        <option value="<?php echo $rol["usuarioId"] ?>"><?php echo $rol["nom_rol"] ?></option>
                        <?php
                        }
                        ?>

                    </select>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>

                <?php 

                $editarusuarios = new ctrUsuarios();
                $editarusuarios->ctrEditarusuarios();
                
                
                ?>


            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>