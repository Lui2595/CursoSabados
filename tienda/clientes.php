<?php require "inc/top.php";?>
    
    <h1 class="mt-1">Clientes</h1>
    <div>
        <div class="d-flex w-100 justify-content-between">
            <button type="button" class="btn btn-success" id="addCliente">Añadir Cliente</button>
            <div>
                <input type="text" class="form-control d-inline" style="width: auto;">
                <button type="button" class="btn btn-primary">Buscar</button>
            </div>
        </div>
        <table class="table mt-3 bg-white ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>RFC</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Luis Fernando Pruneda</td>
                    <td>Real de Valencia #308</td>
                    <td>PUHL950612N74</td>
                    <td>8441223334</td>
                    <td>luisfer_hdz9@hotmail.com</td>
                    <td>844122334  </td>
                    <td><button type="button" class="btn btn-secondary">Editar</button>
                    <button type="button" class="btn btn-danger">Elminar</button>  </td>
                </tr>
            </tbody>  
        </table>
    </div>
    
    <div class="modal fade" id="clienteModal" tabindex="-1" aria-labelledby="clienteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clienteLabel">Añadir Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="clienteForm" action="controllers/clientes.php" method="POST">
                    <input type="hidden" name="action" id="clienteAction" value="">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">RFC</label>
                        <input type="text" class="form-control" id="rfc" name="rfc"  required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Celular</label>
                        <input type="email" class="form-control" id="celular" name="celular" required>
                    </div>
                                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLose</button>
                    <button type="button" class="btn btn-primary" id="submitCliente">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<?php require "inc/scripts.php";?>
    <script type="text/javascript">
        $("#addCliente").click(()=>{
            $("#clienteModal").modal("show");
            $("#clienteLabel").html("Añadir Cliente");
            $("#clienteAction").val("create");
        });       
        $("#submitCliente").click(()=>{
            $("#clienteForm").submit();
        }) 
        
    </script>

<?php require "inc/foot.php";?>