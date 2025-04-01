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
        $result = $listaCompra->listaCompra("añadir pan");
        $this->assertEquals("pan x1", $result);
    }

    /**
     * @test
     */
    public function givenDeleteProductReturnListWithNoProduct()
    {
        $listaCompra = new ListaCompra();
        $listaCompra->listaCompra("añadir pan");
        $result = $listaCompra->listaCompra("eliminar pan");
        $this->assertEquals("", $result);
    }

    /**
     * @test
     */
    public function givenVaciarListReturnEmptyString()
    {
        $listaCompra = new ListaCompra();
        $listaCompra->listaCompra("añadir pan");
        $listaCompra->listaCompra("añadir cebolla");
        $result = $listaCompra->listaCompra("vaciar");
        $this->assertEquals("", $result);
    }

    /**
     * @test
     */
    public function givenDeleteProductNotExistsReturnError()
    {
        $listaCompra = new ListaCompra();
        $listaCompra->listaCompra("añadir pan");
        $result = $listaCompra->listaCompra("eliminar cebolla");
        $this->assertEquals("El producto seleccionado no existe", $result);
    }
}
