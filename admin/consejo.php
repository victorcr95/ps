<?php include"template/header.php"; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Consejo</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Consejo</a></li>
                        <li class="breadcrumb-item active">Ver</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->

                <div class="row">
                    <div class="col-md-12">
                         <?php
                                    error_reporting(E_ALL ^ E_NOTICE);
                                    if($_GET["error"]=="no"){
                                        echo "<div class='alert alert-primary alert-dismissable'>";
                                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                        echo "Registro Exitoso";
                                        echo "</div>";
                                    } else if($_GET["error"]=="si"){
                                        echo "<div class='alert alert-danger alert-dismissable'>";
                                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                        echo "Error al registrar";
                                        echo "</div>";
                                    } 

                                    
                                ?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Consejo</h4>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Ver</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Crear</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Eliminar</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="p-20">
                                            <div class="table-responsive">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Departamento / Sección</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!isset($conexion)){ include("../config/conexion.php");}
                                            $sql = "SELECT c.id,c.nombre, d.nombre AS dep_sec  FROM consejo AS c INNER JOIN departamentos AS d ON c.dep_sec=d.id";
                                            $ejecutar = $conexion->query($sql);
                                            $cont=0;
                                            while($reg = $ejecutar->fetch_assoc()){
                                                $cont=$cont+1;
                                                echo "<tr>";
                                                echo "<th scope='row'>".($reg["id"])."</th>";
                                                echo "<td>".($reg["nombre"])."</td>";
                                                echo "<td>".($reg["dep_sec"])."</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                        <form action="logica/consejo_save.php" method="POST">
                                    <div class="form-body">
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre Completo</label>
                                                    <input type="text" id="firstName" class="form-control" required="" name="nombre" placeholder="John doe">
                                                    <small class="form-control-feedback"> Campo Requerido </small> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Departamento / Sección</label>
                                                    <select class="form-control custom-select" required="" name="dep_sec">
                                                        <option value=""></option>
                                                        <?php 
                                                          if(!isset($conexion)){ include("../config/conexion.php");}
                                                          $sql = "SELECT * FROM departamentos";
                                                          $ejecutar = $conexion->query($sql);
                                                          while($reg = $ejecutar->fetch_assoc()){
                                                            echo "<option value=".$reg["id"].">".($reg["nombre"])."</option>";
                                                             }
                                                            ?>
                                                    </select>
                                                    <small class="form-control-feedback"> Campo Requerido </small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                                        <button type="button" class="btn btn-inverse" onclick="location.reload();" >Cancelar</button>
                                    </div>
                                </form>
                                    </div>
                                    <div class="tab-pane p-20" id="messages" role="tabpanel">
                                             <form action="logica/consejo_delete.php" method="POST">
                                    <div class="form-body">
                                        <div class="row p-t-20">                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <select class="form-control custom-select" required="" name="id_consejo">
                                                        <option value=""></option>
                                                        <?php 
                                                          if(!isset($conexion)){ include("../config/conexion.php");}
                                                          $sql = "SELECT * FROM consejo";
                                                          $ejecutar = $conexion->query($sql);
                                                          while($reg = $ejecutar->fetch_assoc()){
                                                            echo "<option value=".$reg["id"].">".($reg["nombre"])."</option>";
                                                             }
                                                            ?>
                                                    </select>
                                                    <small class="form-control-feedback"> Campo Requerido </small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                                        <button type="button" class="btn btn-inverse" onclick="location.reload();" >Cancelar</button>
                                    </div>
                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
<?php include"template/footer.php"; ?>
