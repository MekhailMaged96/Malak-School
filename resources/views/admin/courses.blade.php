@isadmin
@extends('layouts.admin')
@section('span')

<span>Courses</span>
    
@endsection
@section('admincontent')

<div class="col-md-9 col-sm-9">
    <section class="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                                Courses
                        </div>
                        <div class="card-body">
                        <nav class="navbar navbar-light bg-light nav-manage">
                            <form class="form-inline">
                            <a href="{{route('assign')}}" class="btn btn-outline-secondary" type="button">Assign Courses</a>
                           
                            </form>
                        </nav>

                        
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($courses as $course)
                                    <tr>
                                        <tr id="course{{$course->id}}">
                                        <th scope="row">{{$course->id}}</th>
                                        <td>{{$course->name}}</td>
                                        <td>{{$course->created_at}}</td>
                                        <td><button class="btn btn-info open-modal"  data-toggle="modal" data-target="#ModalCenter" value="{{$course->id}}">Edit
                                            </button>
                                            <button class="btn btn-danger delete-post" data-toggle="modal" data-target="#deleteModal" value="{{$course->id}}">Delete
                                            </button></td>
                                        </tr>
                                @endforeach   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @include('courses.edit')
    @include('courses.delete')
</div>
 @section('script')

<script>
$('body').on('click', '.open-modal', function () {
    var id = $(this).val();
    $.get('courses/' + id, function (data) {
        $('#course_id').val(data.id);
        $('#name').val(data.name);
        $('#btn-save').val("update");
        $('#Modal-Center').modal('show');
      console.log(data.name);
    })
  
})
$('#modal-edit').on('click','#btn-save',function(e){
     e.preventDefault();
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
   
      var  Data = {
            name: $('#name').val(),
           
        };

   
    var state = $('#btn-save').val();
    var type = "POST";
    var course_id = $('#course_id').val();
    var ajaxurl = 'courses';
    if (state == "update") {
        type = "PUT";
        ajaxurl = 'courses/' + course_id;
    }
    $.ajax({
            type: type,
            url: ajaxurl,
            data: Data,
            dataType: 'json',
            success: function (data) {
                console.log(data.updated_at);
                var link = '<tr id="course' + data.id + '"><th scope="row">' + data.id + '</th><td>' + data.name + '</td><td>' + data.created_at + '</td>';
                link += '<td><button class="btn btn-info open-modal"  data-toggle="modal" data-target="#ModalCenter" value="' + data.id + '">Edit</button>&nbsp;';
                link += '<button class="btn btn-danger delete-post" data-toggle="modal" data-target="#deleteModal" value="' + data.id + '">Delete</button></td></tr>';

                $("#course" + course_id).replaceWith(link);

                $('#form-data').trigger("reset");
                $('#ModalCenter').modal('hide');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    $('body').on('click', '.delete-post', function () {
        var course_id = $(this).val();
     
      
        $.get('courses/' + course_id, function (data) {
            $('#course_id').val(data.id);
            $('#name').val(data.name);
            $('#span-title').text($('#name').val());
            console.log(course_id);
        });
       
       
    });

     $('#modal-delete').on('click','#btn-save',function (e) {
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       e.preventDefault();
      var course_id=$('#course_id').val();
    
        $.ajax({
            type: "DELETE",
            url: 'courses/' + course_id,
            success: function (data) {
                console.log(data);
                $("#course" + course_id).remove();

            $('#deleteModal').modal('hide');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


</script>
 @endsection
@endsection
@endisadmin