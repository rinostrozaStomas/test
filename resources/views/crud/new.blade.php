@extends('layout.master')

@section('script')
    <script>
        $(document).ready(function() {

            $("#form-new").submit(function() {
                event.preventDefault();
                $.post("http://sitio2.test/api/tasks",
                        $("#form-new").serialize())
                    .done(function(data) {
                        alert("Se ha guardado correctamente");
                        var url = "http://sitio2.test/crud/";
                        $(location).attr('href', url);
                    });;


            });









        });
    </script>
@endsection



@section('content')
    <form id="form-new">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tiulo</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
