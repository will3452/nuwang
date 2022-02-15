<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DemoController extends Controller
{
    public function index()
    {
        return view('demo.index');
    }

    public function pixelateImage()
    {
        return view('demo.pixelate-image');
    }

    public function postPixelateImage()
    {
        $img = Image::make(request()->image)->pixelate(request()->size ?? 20);

        return $img->response('jpg');
    }
}
