<?php
namespace App\Tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

Class ProductTest extends TestCase{
    public function testDefault(){
        $product = new Product('pomme','food', 1);
        $this->assertSame(0.055, $product->ComputeTVA());
    }
    
    public function testFruit(){
        $product = new Product('pomme','fruit', 1);
        $this->assertSame(0.196, $product->ComputeTVA());
    }

    public function testInvalidPrice(){
        $p = new Product('fraise','fruit', -1);
        $this->expectException('Exception');
        $p->ComputeTVA();
    }

    /** 
    *@dataProvider priceFood
    */
    public function testFood($prix,$tva){
        $product = new Product('pomme','food', $prix);
        $this->assertSame($tva, $product->ComputeTVA());
    }

    public function priceFood(){
        return [[0,0.0],[1,0.055],[10,0.55],[20,1.1]];
    }

}
?>