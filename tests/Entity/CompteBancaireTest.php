<?php
namespace App\Tests\Entity;

use App\Entity\CompteBancaire;
use PHPUnit\Framework\TestCase;

Class CompteBancaireTest extends TestCase{

    public function testSolde(){

        $cb = new CompteBancaire('wiem', 390.0);
        $this->assertSame(140.0, $cb->Retirer(250.0));
       
    }

    public function testSoldeInsuffisant(){
        $cb = new CompteBancaire('ameni', 120.0);
        $this->expectException('Exception');
        $cb->Retirer(250.0);
    }

    /** 
    *@dataProvider argentRetirer
    */

    public function testArgent($solde,$reste){
        $arg = new CompteBancaire('wiwi', $solde);
        $this->assertSame($reste, $arg->Retirer(250.0));
    }

    public function argentRetirer(){
        return [[390.0,140.0],[500.0,250.0],[750.0,500.0],[597.0,347.0]];
    }
}
?>