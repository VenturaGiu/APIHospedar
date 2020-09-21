<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medico;

class MedicoController extends Controller
{
    //retorna todos os médicos
    public function listar(){
        return Medico::all();
    } 
    //retorna o médico de um id específico
    
    public function listarId(Medico $id){
        return $id;
    }
    
    /**  
     * @param string $crm
     * 
     * 
       */
    public function listarCrm(Request $request, $crm){
        $medico = Medico::Where('crm', $crm)->first();
        return $medico;
    }

    /**  
     * @param string $nome
     * 
     * 
       */
      public function listarNome(Request $request, $nome){
          $medico = Medico::Where('nome', 'like', '%' . $nome . '%')->get();
          return $medico;
    }

    public function add(Request $request){
        try {
            $MedicoData = $request->all();
            Medico::create($MedicoData);
            return response()->json(['msg' => 'Médico cadastrado com sucesso!'], 201);
        } catch (\Exception $e) {
            return $e;
        }
    } 

    /**  
     * @param string $crm
     * 
     * 
       */
    public function update(Request $request, $id){
        try {
            $MedicoData = $request->all();
            $medico = Medico::find($id);
            $medico->update($MedicoData);
            return response()->json(['msg' => 'Dados atualizados com sucesso!'], 201);
        } catch (\Exception $e) {
            return $e;
        }
    } 

    /**  
     * @param string $crm
     * 
     * 
       */
    public function delete(Medico $id){
        try {
            // $medico = Medico::Where('crm', $crm)->first();
            $id->delete();
            return response()->json(['msg' => 'Médico deletado com sucesso!'], 201);
        } catch (\Exception $e) {
            return $e;
        }
    } 
}