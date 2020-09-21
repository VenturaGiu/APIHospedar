<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;
use App\Models\Medico;
use App\Http\Controllers\Api\MedicoController;

class ApiTest extends TestCase
{
    //verifica a exibição dos medicos
    public function testListarTudoMedico()
    {
        $controller = new MedicoController();
        $reponse = $controller->listar();
        $this->assertJson($reponse);
    }

    
    //saber se os campos do expected estão certos, igual ao do modal
   public function testVerificarMedico(){
       $medico = new Medico;
       $expected = [
            'crm',
            'nome',
            'telefone',
            'especialidade',
       ];

       $arrayCompared = array_diff($expected, $medico->getFillable());

       $this->assertEquals(0, count($arrayCompared));
   }

}
