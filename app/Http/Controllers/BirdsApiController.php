<?php

namespace App\Http\Controllers;
use App\Models\Bird;
use Illuminate\Http\Request;

class BirdsApiController extends Controller
{
    public function index()
    {
        return Bird::all();
    }
    public function create()
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        return Bird::create([
            'name' => request('name'),
            'description' => request('description'),
        ]);
    }

    public function update(Bird $bird) {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $success = $bird->update([
            'name' => request('name'),
            'description' => request('description'),
        ]);
        return [
            'success' => $success
        ];
    }

    public function delete(Bird $bird) {
        $success = $bird->delete();
        return [
            'success' => $success
        ];
    }
}
