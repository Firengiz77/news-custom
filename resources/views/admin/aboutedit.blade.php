@include('admin.nav')
@include('admin.nav2')

<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit News</h1>
            @if(session()->has('message'))
            <div class="alert alert-success">
               {{ session()->get('message') }}
           </div>
          @endif

                              @foreach ($about as $ab)
                              @endforeach
                                  
                              
                              <form method="post" action="{{route('admin.about.edit',['id' => $ab->id])}}" enctype="multipart/form-data">
                                @csrf
                                   
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="image" type="file" placeholder="New Password" value="{{$ab->getFirstMediaUrl('image')}}" />
                                        <label for="inputPassword">Image</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-success btn-lg" type="submit">Edit About</button>
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