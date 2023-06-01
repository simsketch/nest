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
}
