<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Services\PayUService\Exception;

class RegistroMasivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('admin.users.registroMasivo');
    }

    public function guardar(Request $request){

        $notificacion = "";
        $tipo = "";

        try{
                $path = $request->file('path')->store("/");// $path = public_path('Ejemplo.csv'); // Le pasamos el archivo

                rename ($path,"csv/datos.csv");
                // rename ("csv/".$path,"csv/datos.csv");

                // dd($path);

                $path = public_path('csv/datos.csv'); // $path = public_path('Ejemplo.csv'); // Le pasamos el archivo
                // echo $path;
                $arregloLineas = file($path);
                $codificado = array_map('utf8_encode', $arregloLineas);
                $array = array_map('str_getcsv',$codificado);//
                $arregloPalabras = array();
                $indicePalabras = 0;
                $palabra='';

                // dd($array);
                
                if(count($array[0]) == 1){
                    for($cadena = 0; $cadena < count($array); $cadena++){//Recorre las listas
                        for ($letra=0; $letra < strlen($array[$cadena][0]); $letra++) {//Recorre las letras 
                            if(((string)strcmp($array[$cadena][0][$letra], (string) ';' )==0)){
                                $arregloPalabras[$cadena][$indicePalabras] = (string) $palabra;
                                $palabra = '';
                                $indicePalabras++;
                            }else{
                                // echo "  / " . $array[$cadena][0][$letra] . "No es igual   /";
                                $palabra = (string) $palabra . (string) $array[$cadena][0][$letra];
                            }
                        }
                        $arregloPalabras[$cadena][7]=$palabra;
                        $palabra = '';
                        $indicePalabras = 0;
                    }
                }else{
                    for($i = 0; $i < count($array); $i++){
                        for($j = 0; $j < 8; $j++){
                            $arregloPalabras[$i][$j] = $array[$i][$j];
                        }
                    }
                }

                for ($i=1; $i < count($arregloPalabras); $i++) {

                    $tabla=DB::select('select users.id 
                    from users 
                    where users.codigosiss = '.(string)$arregloPalabras[$i][4] .' or  
                    users.cedula = ' . (string) $arregloPalabras[$i][3]);

                    if(count($tabla)==0){
                    
                        $user = User::create([
                            'name'=>(string)$arregloPalabras[$i][0],
                            'apellidopaterno'=>(string)$arregloPalabras[$i][1],
                            'apellidomaterno'=>(string)$arregloPalabras[$i][2],
                            'cedula'=>(string)$arregloPalabras[$i][3],
                            'codigosiss'=>(string)$arregloPalabras[$i][4],
                            'email'=>(string)$arregloPalabras[$i][5],
                            'password'=>(string)bcrypt($arregloPalabras[$i][6]) 
                            ]);
                        if( //Le agrega el rol, solo si existe el rol del archivo en el sistema
                            (strcasecmp($arregloPalabras[$i][7], (string) 'docente')==0) or
                            (strcasecmp($arregloPalabras[$i][7], (string) 'estudiante')==0) or
                            (strcasecmp($arregloPalabras[$i][7], (string) 'auxiliar')==0) or
                            (strcasecmp($arregloPalabras[$i][7], (string) 'administrador')==0)
                        ){ //Controla que el rol sea valido
                            $user->assignRole($arregloPalabras[$i][7]);
                        }  
                    }
                }

                //Redireccionamiento
            if (! Gate::allows('gestion_usuarios')) {
                return abort(401);
            }

            //Redireccionamiento
            $users = User::all();
            error_log ('holamundo');
            error_log('App.timezone');

            $tipo = "alert alert-success";
            $notificacion = "Se procesaron los datos correctamente!";

            return view('admin.users.index', compact('users','notificacion', 'tipo'));

        }catch (Exception $e){

                //Redireccionamiento
                if (! Gate::allows('gestion_usuarios')) {
                    return abort(401);
                }
    
                //Redireccionamiento
                $users = User::all();
                error_log ('holamundo');
                error_log('App.timezone');

            $notificacion = "El archivo no es compatible!!!";
            $tipo = "alert alert-danger";

            return view('admin.users.index', compact('users','notificacion', 'tipo'));

        }

    }

    public function e(Request $request){

        $path = $request->file('path')->store("/");// $path = public_path('Ejemplo.csv'); // Le pasamos el archivo
        // echo "csv/".$path;
        rename ("csv/".$path,"csv/datos.csv");
    }

}
