<?php

namespace App\Http\Livewire\Products\Forms;

use Livewire\Component;
use App\Models\Product;

class EditForm extends Component
{
    public $product;

    public function rules()
    {
        return [
            'product.name' => 'required',
            'product.category' => 'required',
            'product.color' => 'required',
            'product.img' => 'required|image',
            'product.stock' => 'required',
            'product.price' => 'required',
            'product.description' => '',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules());
    }

    public function mount($product)
    {
        $this->product = $product;
    }

    public function update()
    {
        $this->validate($this->rules());

        $editProduct = $this->validate();

        $this->product->update($editProduct);
        
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function render()
    {
        return view('products.components.edit-form');
    }
}
