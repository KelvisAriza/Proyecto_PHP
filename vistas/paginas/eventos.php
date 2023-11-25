<div class="content-wrapper" style="min-height: 717px;">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>ADMINISTRAR EVENTOS</h1>

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

                            <button type="button" class="btn btn-success crear-eventos" data-toggle="modal"
                                data-target="#modal-crear-eventos">
                                Crear Nuevo Evento
                            </button><br>

                        </div><br>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered table-striped dt-responsive tablaEventos" width="100%">

                                <thead>

                                    <tr>

                                        <th style="width: 10px;">#</th>                                        
                                        <th>Tipo Actividad</th>
                                        <th>Nombre Actividad</th>
                                        <th>Fecha</th>
                                        <th>Asignado</th>
                                        <th>Acciones</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php  ?>

                                    <?php 
                                     foreach($eventos as $key => $value){

                                        $item="registroId";

                                        $valor =$value["asignadoRB"];

                                        $nombre = ctrUsuarios::ctrMostrarNombre($item ,$valor);
                                                                      
                                    ?>

                                    <tr>
                                        
                                        <td><?php echo ($key+1)?></td>
                                        <td><?php echo $value["tipoActividad"]?></td>
                                        <td><?php echo $value["nombreActividad"]?></td>
                                        <td><?php echo $value["fecha"]?></td>
                                        <td><?php echo $nombre["nombresCompletos"]?></td>
                                        
                                        <td>
                                            <div class='btn-group'>

                                                <button class="btn btn-warning btn-sm btnEditarEvento"
                                                    data-toggle="modal" idEvento="<?php echo $value["eventoId"]?>"
                                                    data-target="#modal-editar-eventos">
                                                    <i class="fas fa-pencil-alt text-white"></i>
                                                </button>

                                                <button class="btn btn-danger btn-sm eliminarEvento"
                                                    idEventoE="<?php echo $value["eventoId"] ?>">
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
Modal Crear eventos
======================================-->
<div class="modal modal-default fade" id="modal-crear-eventos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar Nuevo Evento</h4>
            </div>
            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="tipoA" placeholder="Tipo Actividad">
                    <span class="form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="name_a" placeholder="Nombre Actividad">
                    <span class="form-control-feedback"></span>
                </div>

                <div aria-hidden="true">
                    <?php 
                        date_default_timezone_set('America/Bogota');
                        $fecha_actual = date("Y-m-d H:i:s");
                    ?>
                </div>
                
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="datetime" class="form-control" value="<?= $fecha_actual?>" name="fecha" placeholder="Fecha">
                    <span class="form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">

                    <label>Asignado</label>
                    <select class="form-control" name="asignado" required>

                        <?php
                        $nombre = ctrUsuarios::ctrMostrarNombre2($item, $valor);
                        
                        foreach($nombre as $nom){
                            
                        ?>
                        <option value="<?php echo $nom["registroId"] ?>"><?php echo $nom["nombresCompletos"] ?></option>
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
                $guardareventos = new ctrEventos();
                $guardareventos->ctrGuardareventos();  
                ?>


            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<!--=====================================
Modal EDITAR eventos
======================================-->
<div class="modal modal-default fade" id="modal-editar-eventos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Editar Eventos</h4>
            </div>
            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" id="idEventoE" name="idEventoE" >
                    <input type="text" class="form-control" id="tipoE" name="tipoE" placeholder="Tipo Actividad">
                    <span class="form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" id="nameE" name="nameE" placeholder="Nombre Actividad">
                    <span class="form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="datetime" class="form-control" id="fechaE" name="fechaE" placeholder="Fecha">
                    <span class="form-control-feedback"></span>
                </div>
                
                <div class="form-group has-feedback">


                    <label>rol</label>
                    <select class="form-control" id="asignadoE" name="asignadoE" required>

                        <?php
                        $nombre = ctrUsuarios::ctrMostrarNombre2($item, $valor);
                        
                        foreach($nombre as $nom){
                            
                        ?>
                        <option value="<?php echo $nom["registroId"] ?>"><?php echo $nom["nombresCompletos"] ?></option>
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

                $editareventos = new ctrEventos();
                $editareventos->ctrEditareventos();
                
                
                ?>


            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>