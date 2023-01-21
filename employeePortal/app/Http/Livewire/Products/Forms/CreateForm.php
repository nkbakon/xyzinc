<?php

namespace App\Http\Livewire\Products\Forms;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class CreateForm extends Component
{
    use WithFileUploads;
    
    public $name;
    public $category;
    public $color;
    public $img;
    public $stock;
    public $price;
    public $description = '';

    protected $rules = [
        'name' => 'required',
        'category' => 'required',
        'color' => 'required',
        'img' => 'required|image',
        'stock' => 'required',
        'price' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {   
        $data['name'] = $this->name;
        $data['category'] = $this->category;
        $data['color'] = $this->color;
        $data['img'] = $this->img->store('images');
        $data['stock'] = $this->stock;
        $data['price'] = $this->price;
        $data['description'] = $this->description;

        $product = Product::create($data);
        if($product){
            return redirect()->route('products.index')->with('status', 'Product created successfully.');  
        }
        return redirect()->route('products.index')->with('delete', 'Product creating faild, try again.');       
        
    }

    public function mount()
    {
        $this->category = '';
    }

    public function render()
    {
        return view('products.components.create-form');
    }
}
