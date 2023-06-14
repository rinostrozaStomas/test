@extends('layout.master')

@section('script')
    <script>
        $(document).ready(function() {

            let id = window.location.href.split("/")[5];
            console.log(id);

            $.getJSON('http://sitio2.test/api/tasks/' + id, function(json) {
                $("#title").val(json.title)
                $("#description").val(json.description)

            });

            $("#form-edit").submit(function() {
                event.preventDefault();

                $.ajax({
                    url:"http://sitio2.test/api/tasks/" + id,
                    type: "PUT",
                    data: $("#form-edit").serialize()
                    })
                    .done(function(data) {
                        alert("Se ha guardado correctamente");
                        var url = "http://sitio2.test/crud/";
                        $(location).attr('href', url);
                    });
            });
        });
    </script>
@endsection



@section('content')
    <h4> Editar Tarea</h4>
    <form id="form-edit">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tiulo</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
