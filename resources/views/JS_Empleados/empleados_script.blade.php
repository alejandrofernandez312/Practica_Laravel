<script>
    $('#laravel_crud').DataTable();

    function addEmpleado() {
        $("#empleado_id").val('');
        $('#nombre').val('');
        $('#password').val('');
        $('#dni').val('');
        $('#email').val('');
        $('#telefono').val('');
        $('#direccion').val('');
        $('#empleado-modal').modal('show');
    }

    function editEmpleado(event) {
        var id = $(event).data("id");
        let _url = `/empleadosJS/${id}`;
        $('#titleError').text('');
        $('#descriptionError').text('');

        $.ajax({
            url: _url,
            type: "GET",
            success: function(response) {
                if (response) {
                    $('#empleado_id').val(response.empleado_id);
                    $('#nombre').val(response.nombre);
                    $('#password').val(response.password);
                    $('#dni').val(response.dni);
                    $('#email').val(response.email);
                    $('#telefono').val(response.telefono);
                    $('#direccion').val(response.direccion);
                    $('input:radio[name="tipo"][value='+response.tipo+']').prop('checked',true);
                    $('#empleado-modal').modal('show');
                }
            }
        });
    }

    function createEmpleado() {


        let _url = 'empleadosJS';
        let _token = $('meta[name="csrf-token"]').attr('content');
        var id = $('#empleado_id').val();

        $.ajax({
            url: _url,
            type: "POST",
            data: {
                empleado_id: id,
                nombre: $('#nombre').val(),
                password: $('#password').val(),
                dni: $('#dni').val(),
                email: $('#email').val(),
                telefono: $('#telefono').val(),
                direccion: $('#direccion').val(),
                tipo: $('input:radio[name=tipo]:checked').val(),
                _token: _token
            },
            success: function(response) {
                if (response.code == 200) {
                    if (id != "") {
                        $("#row_" + id + " td:nth-child(2)").html(response.data.nombre);
                        $("#row_" + id + " td:nth-child(3)").html(response.data.dni);
                        $("#row_" + id + " td:nth-child(4)").html(response.data.email);
                        $("#row_" + id + " td:nth-child(5)").html(response.data.telefono);
                        $("#row_" + id + " td:nth-child(6)").html(response.data.direccion);
                        $("#row_" + id + " td:nth-child(7)").html(response.data.f_alta);
                        $("#row_" + id + " td:nth-child(8)").html(response.data.tipo);
                    } else {
                        $('table tbody').prepend('<tr id="row_' + response.data.empleado_id + '"><td>' + response
                            .data.empleado_id + '</td><td>' + response.data.nombre + '</td><td>' + response.data.dni + '</td><td>' + response.data
                            .email +'</td><td>'+ response.data.telefono +'</td><td>'+ response.data.direccion +'</td><td>'+ response.data.f_alta +'</td><td>'+ response.data.tipo + '</td><td><a href="javascript:void(0)" data-id="' + response
                            .data.empleado_id +
                            '" onclick="editEmpleado(event.target)" class="btn btn-info">Edit</a><a href="javascript:void(0)" data-id="' +
                            response.data.id +
                            '" class="btn btn-danger" onclick="deleteEmpleado(event.target)">Delete</a></td></tr>'
                            );
                    }
                    $('#title').val('');
                    $('#description').val('');

                    $('#empleado-modal').modal('hide');
                }
            },
            error: function(response) {
                $('#titleError').text(response.responseJSON.errors.title);
                $('#descriptionError').text(response.responseJSON.errors.description);
            }
        });
    }

    function deleteEmpleado(event) {
        var id = $(event).data("id");
        let _url = `/empleadosJS/${id}`;
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: 'DELETE',
            data: {
                _token: _token
            },
            success: function(response) {
                $("#row_" + id).remove();
            }
        });
    }
</script>

