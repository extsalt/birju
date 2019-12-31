<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\ImageOptimizer\OptimizerChain;
use Spatie\ImageOptimizer\Optimizers\Jpegoptim;
use Spatie\ImageOptimizer\Optimizers\Pngquant;

class PhotoOptimiseController extends Controller
{
    public function optimise(Request $request)
    {
        if (!$request->hasFile('photo')) return response()->json(null, 419);

        $file = $request->file('photo');

        $name = \Illuminate\Support\Str::random(30) . '.' . $file->getClientOriginalExtension();

        $file->move(public_path("/images"), $name);

        $resizedImage = \Intervention\Image\Facades\Image::make(public_path("/images/$name"))->resize(640, null, function ($constraints) {
            $constraints->aspectRatio();
            $constraints->upsize();
        });
        $resizedImage->save(public_path("images/$name"));


        $photo = \App\Photo::create([
            'url' => "/images/$name",
        ]);

        $optimizerChain = (new OptimizerChain)
            ->addOptimizer(new Jpegoptim([
                'm85',
                '--strip-all',
                '--all-progressive',
            ]))
            ->addOptimizer(new Pngquant([
                '--force',
            ]));

        $optimizerChain->optimize(public_path("/images/$name"));

        return response()->json(['clientId' => $request->get('clientId')], 201);
    }
}
