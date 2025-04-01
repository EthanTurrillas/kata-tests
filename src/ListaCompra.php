<?php

namespace Deg540\DockerPHPBoilerplate;

class ListaCompra
{
    private array $listaCompra = [];
    public function listaCompra(string $product){
        if (str_starts_with($product, 'añadir')) {
            $product = substr($product, 8);
            $this->añadirProducto($product);
        }
        return implode(',', $this->listaCompra);
    }

    private function añadirProducto(string $product){
        $product .= ' x1';
        $this->listaCompra[] = $product;
    }

}
