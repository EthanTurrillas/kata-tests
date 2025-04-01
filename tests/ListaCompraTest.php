<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\ListaCompra;
use PHPUnit\Framework\TestCase;

class ListaCompraTest extends TestCase
{
    /**
     * @test
     */
    public function givenAddProductReturnListWithProduct()
    {
        $listaCompra = new ListaCompra();
        $result = $listaCompra->listaCompra("añadir Pan");
        $this->assertEquals("Pan x1", $result);
    }
}
