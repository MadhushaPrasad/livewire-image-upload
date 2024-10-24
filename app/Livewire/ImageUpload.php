<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;

class ImageUpload extends Component
{
    use WithFileUploads;
    public $image;
    public $productImage;

    public function render()
    {
        return view('livewire.image-upload');
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'image' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
            'productImage' => 'image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);
        $imageName = $this->image->store("images", 'public');
        $productImage = $this->productImage->store("images/product", 'public');
        $validatedData['title'] = $imageName;
        $validatedData['product_image'] = $productImage;
        Image::create($validatedData);

        session()->flash('message', 'Image has been successfully Uploaded.');
        return redirect()->to('/livewire-image-upload');
    }
}
