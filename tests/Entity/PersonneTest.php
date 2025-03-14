<?php
namespace App\Tests\Entity;

use App\Entity\Personne;
use PHPUnit\Framework\TestCase;

Class PersonneTest extends TestCase{

    public function testCategorie(){

        $p1 = new Personne('wiem', 'akrouti', 16);
        $this->assertSame('mineur', $p1->Categorie());
       
    }

    public function testPersonne(){
       
        $p2 = new Personne('chaima', 'douzi', 21);
        $this->assertSame('majeur', $p2->Categorie());
    }

    public function testInvalidAge(){
        $p = new Personne('ameni','souihi', -1);
        $this->expectException('Exception');
        $p->Categorie();
    }

    /** 
    *@dataProvider agePersonne
    */

    public function testAge($cat,$age){
        $p = new Personne('ameni','souihi', $age);
        $this->assertSame($cat, $p->Categorie());
    }

    public function agePersonne(){
        return [['mineur',12],['mineur',15],['majeur',19],['majeur',21]];
    }
}
?>
