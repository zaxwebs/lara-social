<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfileImage extends Component
{
    public $image;
    public $size;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image, $size = 'sm')
    {
        //
        $this->image = $image;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.profile-image');
    }
}
