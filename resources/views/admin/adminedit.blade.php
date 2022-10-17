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

                              @foreach ($user as $u)
                              @endforeach
                                  
                              
                              <form method="post" action="{{route('admin.edit',['id' => $u->id])}}">
                                @csrf
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" type="text" name="name" value="{{$u->name}}"  />
                                        <label for="inputEmail">Name <label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control"  name="email" type="email" placeholder="Email" value="{{$u->email}}"/>
                                        <label for="inputPassword">Email Address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="password" type="password" placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="newpassword" type="password" placeholder="New Password" />
                                        <label for="inputPassword">New Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="confirmation_password" type="password" placeholder="Confirm Password"/>
                                        <label for="inputPassword">Confirm Password</label>
                                    </div>

                                  
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-success btn-lg" type="submit">Edit User</button>
                                    </div>
                                </form>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


</div>