<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppStoreRequest;
use Illuminate\Support\Str;

class AppController extends Controller
{
    public function store(AppStoreRequest $request)
    {
        $file = $request->file('photo');

        $name = Str::random() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('/images'), $name);

        $data = $request->validated();
        $data['photo'] = "/images/$name";

        auth()->user()->apps()->create($data);

        return back()->with('success', 'Your app successfully created.');
    }
}
