@extends('layouts.app')
@section('content')

  <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create Menu !</h1>
                            </div>
                            <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
                                     @csrf
                                     <input type="hidden" name="id" value="{{@$menu->id}}">
                                <div class="form-group">
                                    @if(@$menu)
                                    <img src="{{ asset('food/'.@$menu->img)}}" width="150px" height="150px">
                                    @endif
                                        <input type="file" class="form-control" id="image"
                                            placeholder="Food Image" name="menu_img"  @if(@$menu=="") required @endif>
                                   
                                </div>
                                <div class="form-group">
                                   
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Menu Name" name="menu_name" required="" value="{{@$menu->menu_name}}">
                                   
                                </div>
                                <div class="form-group">
                                     <?php $cat_id= explode(",",$menu->category_id); ?>
                                   <select  class="form-control" name="category[]" multiple required="">
                                   	<option>Select Category</option>
                                    @foreach(@$categories as $category)
                                    <option value="{{@$category->id}}"  @if(in_array($category->id,$cat_id)) selected @endif> {{@$category->category_name}}</option>
                                    @endforeach

                                   </select>
                                </div>
                                
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="price"
                                            placeholder="Price" name="price" value="{{@$menu->food_price}}" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="discount"
                                            placeholder="discount" value="{{@$menu->discount}}" name=discount>
                                    </div>
                                </div>
                                 <div class="form-group">
                                   
                                        <textarea  placeholder="Description" class="form-control" name="description" required="">{{@$menu->description}}</textarea> 
                                   
                                </div>
                               
                                  <button type="submit" class="btn btn-primary">
                                    {{ __('ADD') }}
                                </button>
                               
                                
                            </form>
                            <hr>
                           		
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection