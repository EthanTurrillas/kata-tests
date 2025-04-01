<?php

namespace Deg540\DockerPHPBoilerplate;

class ListaCompra
{
    private array $listaCompra = [];
    public function listaCompra(string $product){
        $product = strtolower($product);
        if (str_starts_with($product, 'añadir')) {
            $product = substr($product, 8);
            $this->añadirProducto($product);
        }
        else if (str_starts_with($product, 'eliminar')){
            $product = substr($product, 9);
            $this->eliminarProducto($product);
        }
        else{
            $this->listaCompra = [];
        }
        return implode(', ', $this->listaCompra);
    }

    private function añadirProducto(string $product){
        $product .= ' x1';
        $this->listaCompra[] = $product;
    }

    private function eliminarProducto(string $product)
    {
        foreach ($this->listaCompra as $key => $value) {
            if (str_starts_with($value, $product)) {
                unset($this->listaCompra[$key]);
                return;
            }
        }
        $this->listaCompra[0] = "El producto seleccionado no existe";
    }
}
