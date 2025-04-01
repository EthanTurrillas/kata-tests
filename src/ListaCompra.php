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
        elseif (str_starts_with($product, 'eliminar')){
            $product = substr($product, 9);
            $this->eliminarProducto($product);
        }
        return implode(',', $this->listaCompra);
    }

    private function añadirProducto(string $product){
        $product .= ' x1';
        $this->listaCompra[] = $product;
    }
    private function eliminarProducto(string $product){
        foreach ($this->listaCompra as $key => $value) {
            if (str_starts_with($value, $product)) {
                unset($this->listaCompra[$key]);
            }
        }
    }
}
