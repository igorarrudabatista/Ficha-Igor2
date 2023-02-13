<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\FICHA;

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
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        $categoria = Categoria::latest()->paginate(5);
        return view('categoria.index',compact('categoria', 'userCount'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

   public function create()
   {
    $userCount  =  FICHA::where('status_id', '=', auth()->id())
    ->count();
       return view('categoria.create',compact('userCount'));
   }
    

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
    

    public function show(Categoria $categoria)
    {
        return view('categoria.show',compact('categoria'));
    }

     public function edit(Categoria $categoria)
     {
         return view('categoria.edit',compact('categoria'));
     }

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
    

     public function destroy(Categoria $categoria)
     {
         $categoria->delete();
    
         return redirect()->route('categoria.index')
                         ->with('delete','Ministério deletado com sucesso!');
     }
 }

