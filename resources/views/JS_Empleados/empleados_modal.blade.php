<div class="modal fade" id="empleado-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form name="userForm" class="form-horizontal">
                    <input type="hidden" name="empleado_id" id="empleado_id">

                    {{-- NOMBRE --}}
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Enter Nombre">
                            <span id="nombreError" class="alert-message"></span>
                        </div>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="form-group">
                        <label for="password" class="col-sm-2">Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Password">
                            <span id="passwordError" class="alert-message"></span>
                        </div>
                    </div>

                    {{-- DNI --}}
                    <div class="form-group">
                        <label for="dni" class="col-sm-2">DNI</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="Enter DNI">
                            <span id="dniError" class="alert-message"></span>
                        </div>
                    </div>

                    {{-- EMAIL --}}
                    <div class="form-group">
                        <label for="email" class="col-sm-2">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                            <span id="emailError" class="alert-message"></span>
                        </div>
                    </div>

                    {{-- TELEFONO --}}
                    <div class="form-group">
                        <label for="telefono" class="col-sm-2">Teléfono</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                placeholder="Enter telefono">
                            <span id="telefonoError" class="alert-message"></span>
                        </div>
                    </div>

                    {{-- DIRECCION --}}
                    <div class="form-group">
                        <label for="direccion" class="col-sm-2">Dirección</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                placeholder="Enter dirección">
                            <span id="direccionError" class="alert-message"></span>
                        </div>
                    </div>

                    {{-- TIPO --}}
                    <div class="form-group">
                        <label for="f_alta" class="col-sm-2">Tipo</label>
                        <div class="col-sm-12">
                            <input type="radio" class="form-check-input" id="A" value="A" name="tipo">Administrador<br>
                            <input type="radio" class="form-check-input" id="O" value="O" name="tipo">Operario<br>
                            <span id="f_altaError" class="alert-message"></span>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="createEmpleado()">Save</button>
            </div>
        </div>
    </div>
</div>
