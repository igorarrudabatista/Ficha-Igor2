<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:categoria-list|categoria-create|categoria-edit|categoria-delete', ['only' => ['index','show']]);
         $this->middleware('permission:categoria-create', ['only' => ['create','store']]);
         $this->middleware('permission:categoria-edit',   ['only' => ['edit','update']]);
         $this->middleware('permission:categoria-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::latest()->paginate(5);
        return view('categoria.index',compact('categoria'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
   public function create()
   {
       return view('categoria.create');
   }
    
//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
    public function store(Request $request)
    {
        // request()->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
    
        categoria::create($request->all());
    
         return redirect()->route('categoria.index')
                         ->with('success','Categoria criado com sucesso!');
     }
    
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
    public function show(Categoria $categoria)
    {
        return view('categoria.show',compact('categoria'));
    }
    
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function edit(Categoria $categoria)
     {
         return view('categoria.edit',compact('categoria'));
     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, Categoria $categoria)
     {
        //   request()->validate([
        //      'name' => 'required',
        //      'detail' => 'required',
        //  ]);
    
         $categoria->update($request->all());
    
         return redirect()->route('categoria.index')
                         ->with('edit','Atualiazado com sucesso!');
     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(Categoria $categoria)
     {
         $categoria->delete();
    
         return redirect()->route('categoria.index')
                         ->with('delete','Ministério deletado com sucesso!');
     }
 }

