@include('admin.nav')
@include('admin.nav2')
    <div id="layoutSidenav_content">
        <main>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Admin Panel</h1>
                @if(session()->has('message'))
                <div class="alert alert-success">
                   {{ session()->get('message') }}
               </div>
              @endif

                <div class="row">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Profile
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                    <th> Add Admin
                                        <span data-toggle="tooltip" data-placement="bottom" title="Add">
                                        <button  class="btn btn-primary btn-large icon" type="submit" data-toggle="modal" data-target="#staticBackdrop-1">
                                            <i class="fas fa-plus"></i>
                                           </button>
                                   </span></th>

                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($user as $u )
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>

                                    <td>

                                  <span  data-toggle="tooltip" data-placement="bottom" title="Edit">
                                    <a href="{{route('admin.adminedit',['id' => $u->id])}}" style="color: white">
                                       <button  class="btn btn-primary btn-large icon" type="submit" >
                                           <i class="fas fa-pencil-alt"></i>
                                       </a>
                                        </button>
                                  </span>

                                    <span data-toggle="tooltip" data-placement="bottom" title="Add">
                                         <button  class="btn btn-primary btn-large icon" type="submit" data-toggle="modal" data-target="#staticBackdrop-1">
                                             <i class="fas fa-plus"></i>
                                            </button>
                                    </span>
                                     <a href="{{route('admin.delete',['id' => $u->id])}}">
                                        <button  class="btn btn-primary btn-large icon" type="submit" data-toggle="tooltip" data-placement="bottom" title="Delete"> <i class="far fa-trash-alt"></i>
                                        </button></a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </main>
      @include('admin.footer')
    </div>
</div>


{{-- add modal --}}
<div class="modal fade  pad-no " id="staticBackdrop-1" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel1" aria-hidden="true">
<div class="modal-dialog modal-xl  modal-dialog-centered">
    <div class="modal-content">

        <div class="modal-body register-modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            <div class="register-modal-inputs ">
                <form method="post" action="{{route('admin.add')}}">
                    @csrf
                   Name: <input class="long-input" name="name" type="text" placeholder="Name"> <br> <br>
                   Email: <input class="long-input" name="email" type="email" placeholder="Email"> <br> <br>

                   Password: <input class="long-input" name="password" type="password" placeholder="Password"  ><br> <br>
                   Confirm Password: <input class="long-input" name="confirmation_password" type="password" placeholder="Confirm Password"> <br> <br>
                   <br>
                    <button class="btn btn-success btn-lg" type="submit">Add User</button>
                </form>
            </div>
        </div>

    </div>
</div>
</div>







