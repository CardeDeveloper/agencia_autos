<?php

namespace agencia\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use agencia\Http\Requests;
use agencia\Http\Controllers\Controller;
use File;
use Carbon\Carbon;

class autoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general=DB::Select('select * from autos');
        $modelo= DB::select('select * from autos order by autos.modelo desc');
        $precio= DB::select('select * from autos order by autos.precio asc');
        return view('index')->with('general', $general)->with('modelo', $modelo)->with('precio', $precio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user()->id;
        $date=Carbon::now()->day.Carbon::now()->month.Carbon::now()->year.Carbon::now()->hour.Carbon::now()->minute.Carbon::now()->second;
            $name=$request['imagen'];
            $file=$name;
            $name=$name->GetClientOriginalName();
            $extension =pathinfo($name, PATHINFO_EXTENSION);
            $fileName=$user."_".$date.".".$extension;
            \Storage::disk('local')->put($fileName, \File::get($file));
            $host= $_SERVER["HTTP_HOST"];
            $url="img/".$fileName;


         \agencia\auto::create([
            'nombre'=> $request['nombre'],
            'modelo'=> $request['modelo'],
            'color'=> $request['color'],
            'precio'=> $request['precio'],
            'existencia'=> $request['existencia'],
            'imagen'=> $url,
            
        ]);
         return redirect('/home')->with('status', 'Un Nuevo Registro');
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
        $general=DB::Select('select * from autos where id=?',[$id]);

        return view('edit')->with('general',$general);
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

        $auto= \agencia\auto::find($id);
        $auto->nombre=$request->nombre;
        $auto->modelo=$request->modelo;
        $auto->color=$request->color;
        $auto->precio=$request->precio;
        $auto->existencia=$request->existencia;
        $auto->save();
        return redirect('/home')->with('status', 'Una actualizacion con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function venta(Request $request)
    {

        $auto= \agencia\auto::find($request['auto']);
        if($auto->existencia<1){
            return redirect('home')->withErrors('No Hay existencias');

        }else{
            $auto->existencia= ($auto->existencia)-1;
            $auto->save();
        }
        
         \agencia\venta::create([
            'auto_id'=> $request['auto'],
            'vendedor'=> $request['usuario'],
            
            
        ]);
         return redirect('/home')->with('status', 'Una venta con exito!');

    }

    public function api($query=null)
    {
        if(!$query)
        {
            $query="";
        }
       $queryDB= DB::select("SELECT nombre as name,  id as value from autos WHERE nombre like '%".$query."%'");
        $array=[
        "succes" => "true",
        "results" => $queryDB,
    
];
return $array;

    }

    public function pdf($array)
    {
        
        $general=DB::Select('select * from autos');
        $modelo= DB::select('select * from autos order by autos.modelo desc');
        $precio= DB::select('select * from autos order by autos.precio asc');
       if ($array=="general") {
            
            $array=$general;
        }elseif ($array=="modelo") {
                $array=$modelo;
            }
            elseif ($array=="precio") {
                $array=$precio;
            }else{
                return redirect('home')->withErrors('Error al procesar el PDF');
            }
        
        

        //generar PDF
        //$view =  \View::make('pdf', $array)->render();
        $pdf = \App::make('dompdf.wrapper');
        //$pdf->loadHTML($view);
        $pdf->loadview('pdf',compact('array'));
        return $pdf->stream('Autos');

    }
}
