@if(count($users)>0)
              <table class="table">
                  <thead class="thead-light">
                    <tr >
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Created_at</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('users.show',$user->id)}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>

                {{$users->render()}}
                
@else 


        <div class="card" style="margin-top:50px; float:left;">
                <div class="card-body">
                <b>{{$search}}</b>  No result found
                </div>
        </div>
    
</div>
@endif