 @extends('layout.master')


 @section('script')
     <script>
         $(document).ready(function() {
             $.getJSON('http://sitio2.test/api/tasks', function(json) {
                 var tr = [];
                 for (var i = 0; i < json.length; i++) {
                     tr.push('<tr>');
                     tr.push('<td>' + json[i].id + '</td>');
                     tr.push('<td>' + json[i].title + '</td>');
                     tr.push('<td>' + json[i].description + '</td>');
                     tr.push('<td><a href="/crud/edit/' + json[i].id + '"  class=\'btn btn-success\'>Edit</a> &nbsp;&nbsp;' +
                         '<button class=\'btn-delete btn btn-danger\' data-id=' + json[i].id + ' >Delete</button> ' +
                         '</td>');
                     tr.push('</tr>');
                 }
                 $('#tbl-data tbody').append($(tr.join('')));

                 $(".btn-delete").on("click", function() {
                    let id = $(this).data("id");
                     $.ajax({
                         url: 'http://sitio2.test/api/tasks/'+ id,
                         type: 'DELETE',
                         success: function(result) {
                             alert(result);
                             window.location.reload();
                         }
                     });
                 });



             });







         });
     </script>
 @endsection




 @section('content')
     <h2>Lista Tareas</h2>

     <a href="/crud/new" class="btn btn-primary"> Nueva tarea</a>

     <div class="table-responsive">
         <table class="table table-striped table-sm" id="tbl-data">
             <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Titulo</th>
                     <th scope="col">Descripcion</th>
                     <th scope="col"> </th>
                 </tr>
             </thead>
             <tbody>
             </tbody>
         </table>
     </div>
 @endsection
