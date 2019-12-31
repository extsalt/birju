<?php

namespace App\Http\Controllers;

use App\App;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function store(PostStoreRequest $request)
    {
        $app = App::query()->where('app_id', request()->get('app_id'))
            ->where('app_secret', request()->get('app_secret'))
            ->first();

        if (is_null($app)) {
            return response()->json(['message' => 'Unauthorised access.'], 401);
        }

        if (!$request->filled('body') && !$request->hasFile('photo')) {
            return response()->json(['message' => 'Bad request'], 419);
        }

        $post = $app->posts()->create($request->only('body'));

        $photo = null;

        if ($request->hasFile('photo')) {
            $name = Str::random() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/images'), $name);

            $post->photos()->create(['url' => "/images/$name"]);
        }

        return response()->json(['message' => 'Post created'], 201);
    }
}
