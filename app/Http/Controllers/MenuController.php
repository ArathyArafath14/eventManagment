<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $menus=Menu::where('status',1)->get();
       $categories=Category::where('status',1)->get();
       return view('admin/Menu/menu_list',compact('menus','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('status',1)->get();
      return view('admin/menu/add-menu',compact('categories'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->id=="")
       {
         $menu =new Menu();
       }
       else
       {
         $menu =Menu::find($request->id);
       }
       if($request->menu_img){
            $image = $request->file('menu_img');
            $fileName = $image->getClientOriginalName();
            $fileExtension = $image->getClientOriginalExtension();
            $newImageName = date('Y_m_d_').uniqid().'.'.$fileExtension;
            $path = public_path('food');
            $image->move($path, $newImageName);
        }else{
            $newImageName = $menu->img;
             } 
            
             $menu->img=$newImageName;
             $menu->menu_name=$request->menu_name;
             $menu->category_id=implode(",",$request->category);
             $menu->food_price=$request->price;
             $menu->discount=$request->discount;
             $menu->description=$request->description;
             $menu->status=1;
             if($menu->save())
             {
                return redirect('menu')->with('success', 'Menu saved!'); 
             }
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu=menu::find($id);
        $categories=Category::where('status',1)->get();
        return view('admin/menu/add-menu',compact('menu','categories')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $menu= Menu::find($id);
        $menu->status=0;
        $menu->save();
    return redirect('menu')->with('success', 'Menu deleted!');
    }
}
