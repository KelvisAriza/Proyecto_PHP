<div class="content-wrapper" style="min-height: 717px;">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>ADMINISTRAR PARTICIPANTES</h1>

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

                            <button type="button" class="btn btn-success crear-participantes" data-toggle="modal"
                                data-target="#modal-crear-participantes">
                                Crear Nuevo Participantes
                            </button><br>

                        </div><br>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered table-striped dt-responsive tablaParticipantes" width="100%">

                                <thead>

                                    <tr>

                                        <th style="width: 10px;">#</th>                                        
                                        <th>Identificacion</th>
                                        <th>Nombres Completo</th>
                                        <th>Vinculacion</th>
                                        <th>Evento</th>
                                        <th>Acciones</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php  ?>

                                    <?php 
                                     foreach($participantes as $key => $value) {

                                        $item="vinculacionId";

                                        $valor =$value["vinculacion"];
                                    
                                        $ev = ctrParticipantes::ctrMostrarVinculacion($item ,$valor);

                                        $ite ="eventoId";
                                        $val=$value["evento"];

                                        $e = ctrEventos::ctrMostrarEventos1($ite,$val);
                                                                      
                                    ?>

                                    <tr>
                                        
                                        <td><?php echo ($key+1)?></td>
                                        <td><?php echo $value["identificacion"]?></td>
                                        <td><?php echo $value["nombresCompletos"]?></td>
                                        <td><?php echo $ev["nombresVinculacion"]?></td>
                                        <td><?php echo $e["nombreActividad"]?></td>
                                        
                                        <td>
                                            <div class='btn-group'>

                                                <button class="btn btn-warning btn-sm btnEditarParticipante"
                                                    data-toggle="modal" idUsuario="<?php echo $value["participanteId"]?>"
                                                    data-target="#modal-editar-usuarios">
                                                    <i class="fas fa-pencil-alt text-white"></i>
                                                </button>

                                                <button class="btn btn-danger btn-sm eliminarParticipante"
                                                    idUsuarioE="<?php echo $value["participanteId"] ?>">
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
<div class="modal modal-default fade" id="modal-crear-participantes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar Nuevo Participante</h4>
            </div>
            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="number" class="form-control" name="identV" placeholder="Identificación">
                    <span class="form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="name_comV" placeholder="Nombres Completo">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">

                    <label>Vinculacion</label>
                    <select class="form-control" name="vin" required>

                        <?php
                        $par = ctrParticipantes::ctrMostrarVinculacion1();
                        
                        foreach($par as $p){
                            
                        ?>
                        <option value="<?php echo $p["vinculacionId"] ?>"><?php echo $p["nombresVinculacion"] ?></option>
                        <?php
                        }
                        ?>

                    </select>

                </div>

                <div class="form-group has-feedback">

                    <label>Eventos</label>
                    <select class="form-control" name="eve" required>

                        <?php
                        $even = ctrEventos::ctrMostrarEventos();
                        
                        foreach($even as $e){
                            
                        ?>
                        <option value="<?php echo $e["eventoId"] ?>"><?php echo $e["nombreActividad"] ?></option>
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
                $guardarparticipantes = new ctrParticipantes();
                $guardarparticipantes->ctrGuardarparticipantes();  
                ?>


            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>