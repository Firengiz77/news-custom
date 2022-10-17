@include('admin.nav')
@include('admin.nav2')

<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Article </h1>
            @if(session()->has('message'))
            <div class="alert alert-success">
               {{ session()->get('message') }}
           </div>
          @endif

            <div class="row">
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Action</th>
                                <th>Add Article  <span data-toggle="tooltip" data-placement="bottom" title="Add">
                                    <button  class="btn btn-primary btn-large icon" type="submit" data-toggle="modal" data-target="#staticBackdrop-1">
                                        <i class="fas fa-plus"></i>
                                       </button>
                               </span></th>
                            

                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($article as $a )
                            <tr>
                                <td>{{$a->id}}</td>
                                <td>{{$a->title}}</td>
                                <td>{{$a->description}}</td>
                               
                                <td>{{$a->author}}</td>
                                <td>
                                    <img src="{{$a->getFirstMediaUrl('image')}}" class="card-img-top " alt="..." width="auto" height="50px"></td>
                                <td>{{$a->created_at}}</td>    
                               
                                    <td>
                         <a href="{{route('admin.article.articleedit',['id' => $a->id])}}" style="color: white">
                              <span  data-toggle="tooltip" data-placement="bottom" title="Edit">
                                   <button  class="btn btn-primary btn-large icon" type="submit" >
                                       <i class="fas fa-pencil-alt"></i>
                                    </button>
                              </span>
                            </a>
                             
                                {{-- <span data-toggle="tooltip" data-placement="bottom" title="Add">
                                     <button  class="btn btn-primary btn-large icon" type="submit" data-toggle="modal" data-target="#staticBackdrop-1">
                                         <i class="fas fa-plus"></i>
                                        </button>
                                </span> --}}
                           
                                 <a href="{{route('admin.article.delete',['id' => $a->id])}}">
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
                <form method="post" action="{{route('admin.article.store')}}" enctype="multipart/form-data">
                    @csrf
                   Title: <input class="long-input" name="title" type="text" placeholder="Title"> <br> <br>
                   Description: <input class="long-input" name="description" type="text" placeholder="Description"> <br> <br>

                   Author: <input class="long-input" name="author" type="text" placeholder="Author"  ><br> <br>
                   Image: <input class="long-input" name="image" type="file" placeholder="Image"> <br> <br>
                   <br>
                    <button class="btn btn-success btn-lg" type="submit">Add Article</button>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
