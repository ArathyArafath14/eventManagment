@extends('layouts.app')
@section('content')

  <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
                        <div class="p-5">
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Menu List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Menu Image</th>
                                            <th>Menu Name</th>
                                            <th>Categories</th>
                                            <th>price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php $i=1;?>

                                        @foreach(@$menus as $menu)
                                   <tr>
                                    <?php $cat_id= explode(",",$menu->category_id); ?>
                                            <th>{{@$i}}</th>
                                             <th><img src="{{ asset('food/'.@$menu->img)}}" width="150px" height="150px"></th>
                                              <th>{{@$menu->menu_name}}</th>
                                              <th> @foreach(@$categories as $category)
                                              @if(in_array($category->id,$cat_id)) {{@$category->category_name}},
                                              @endif
                                               @endforeach</th>
                                              
                                                <th>{{@$menu->food_price}}  @if(isset($menu->discount))( {{@$menu->discount}} % discount ) @endif</th>

                                            <th>
                                                <a class="btn btn-info" href="{{ route('menu.edit',$menu->id) }}">Edit </a>
                                                 <form action="{{ route('menu.destroy', $menu->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                                            </th>
                                            
                                                    
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection