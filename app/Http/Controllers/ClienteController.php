<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
class ClienteController extends Controller
{
    public function getAll(){
        $estudiante=Estudiante::all();
        return $estudiante;
    }

    public function deleteEstudiante($id){
        $estudiant= $this->getEstudiante($id);
        $estudiant->delete();
        return Redirect::to('estudiantes/lista');
    }
    public function deleteEstudiante2($id){
        $estudiant= $this->getEstudiante($id);
        $estudiant->delete();
        return $estudiant;
    }

    public function getEstudiante($id){
        $estudiant=Estudiante::find($id);
        return $estudiant;
    }

    public function edit($id)
    {
        return view('editarEstudiante',["estudiante"=>Estudiante::findOrFail($id)]);
    }
    public function update(EstudianteFormRequest $request,$id)
    {

        $estudiante=Estudiante::find($id);
        $estudiante->nombre_estudiante=$request->get('nombre_estudiante');
        $estudiante->apellido_estudiante=$request->get('apellido_estudiante');
        $estudiante->fecha_nacimiento_estudiante=$request->get('fecha_nacimiento_estudiante');
        $estudiante->edad_estudiante=$request->get('edad_estudiante');
        $estudiante->grado_estudiante=$request->get('grado_estudiante');
        $estudiante->seccion_estudiante=$request->get('seccion_estudiante');
        $estudiante->ciclo_estudiante=$request->get('ciclo_escolar_estudiante');
        $estudiante->id_genero=$request->get('id_genero');
        $estudiante->update();
        return Redirect::to('estudiantes/lista');
    }

    public function editEstudiante2($id, Request $request){
        $estudiant = $this->getEstudiante($id);
        $estudiant->fill($request->all())->save();
        return $estudiant;
    }


    public function registerEstudiante(){
        $genero=Genero::all();
        return view('registrarEstudiante', compact('genero'));
    }

    public function showEstudiante(){



        $estudiante=DB::table('estudiante as e')
            ->join('genero as q','e.id_genero','=','q.id_genero')
            ->select('e.id_estudiante','e.nombre_estudiante','e.apellido_estudiante','e.fecha_nacimiento_estudiante','e.edad_estudiante','e.grado_estudiante','e.seccion_estudiante','e.ciclo_escolar_estudiante','q.tipo_genero')
            ->where('e.nombre_estudiante','LIKE','%'.'%')
            ->orderBy('nombre_estudiante','asc')
            ->paginate(7);
        return view('listaDeEstudiante', compact('estudiante'));
    }

    public function saveEstudiante(Request $request){
        if($request->control=='form' || $request->control=='api') {
            //Validaciones del formulario
            $data = request()->validate([
                'nombre_estudiante' => 'required|max:75',
                'apellido_estudiante' => 'required|max:75',
                'fecha_nacimiento_estudiante' => 'required|max:75',
                'edad_estudiante' => 'required|max:75',
                'grado_estudiante' => 'required|max:75',
                'seccion_estudiante' => 'required|max:75',
                'ciclo_escolar_estudiante' => 'required|max:75',
                'id_genero' => 'required'
            ], [
                'nombre_estudiante.required' => 'El nombre no debe estar vacio.',
                'apellido_estudiante.required' => 'El apellido no debe estar vacio.',
                'fecha_nacimiento_estudiante.required' => 'La fecha de nacimiento no debe estar vacio.',
                'edad_estudiante.required' => 'La edad no debe estar vacio.',
                'grado_estudiante.required' => 'El grado  no debe estar vacio.',
                'seccion_estudiante.required' => 'La seccion  no debe estar vacio.',
                'ciclo_escolar_estudiante.required' => 'El ciclo escolar  no debe estar vacio.',
                'id_genero.required' => 'El id del genero no debe estar vacio.',

                'nombre_estudiante.max' => 'El nombre no puede tener más 75 caracteres.',
                'apellido_estudiante.max' => 'El apellido no puede tener más 75 caracteres.',
                'fecha_nacimiento_estudiante.max' => 'La fecha de nacimiento no puede tener más 75 caracteres.',
                'edad_estudiante.max' => 'La edad no puede tener más 75 caracteres.',
                'grado_estudiante.max' => 'El gradp no puede tener más 75 caracteres.',
                'seccion_estudiante.max' => 'La seccion no puede tener más 75 caracteres.',
                'ciclo_escolar_estudiante.max' => 'El ciclo escolar no puede tener más 75 caracteres.',

            ]); // termina el bloque de validaciones

            try {
                //Guardar el producto
                $estudiante = Estudiante::create([
                    'nombre_estudiante' => $data['nombre_estudiante'],
                    'apellido_estudiante' => $data['apellido_estudiante'],
                    'fecha_nacimiento_estudiante' => $data['fecha_nacimiento_estudiante'],
                    'edad_estudiante' => $data['edad_estudiante'],
                    'grado_estudiante' => $data['grado_estudiante'],
                    'seccion_estudiante' => $data['seccion_estudiante'],
                    'ciclo_escolar_estudiante' => $data['ciclo_escolar_estudiante'],
                    'id_genero' => $data['id_genero'],


                ]);

            } catch (QueryException $queryException) { //capturamos el error en el catch
                return redirect()->route('estudiante.index')->with('warning', 'Ocurrio un error al registrar el Estudiante. ');
            }
        }
        if($request->control=='form'){
            return redirect()->route('estudiante.index')->with('success', 'Registro realizado exitosamente');
        }elseif($request->control=='api'){
            return response()->json([
                'nombre_estudiante' => 'INGRESADO',
                'apellido_estudiante' => 'Guardado Exitosamente',
            ]);

        }
    }


}
