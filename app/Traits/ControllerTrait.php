<?php

namespace App\Traits;


trait ControllerTrait
{
    public function uploadImage($image, $location = '')
    {
        $imageName = uniqid(rand()) . '.' . $image->getClientOriginalExtension();
        $image->move($location, $imageName);
        return $imageName;
    }
}
