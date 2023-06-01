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
            'isAlive' => request('isAlive'),
            'isHungry' => request('isHungry'),
            'bellySize' => request('bellySize'),
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
            'isAlive' => request('isAlive'),
            'isHungry' => request('isHungry'),
            'bellySize' => request('bellySize'),
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

    public function walk(Bird $bird) {
        $bird = Bird::find($bird);
        $newBellySize = $bird->bellySize - request('minutesOfWalking');
        if ($newBellySize > 50 || $newBellySize < 1) {
            $bird->update([
                'isAlive' => false,
            ]);
        }
        if ($newBellySize >= 1 && $newBellySize <=10) {
            $bird->update([
                'isHungry' => true,
            ]);
        }
        $success = $bird->update([
            'bellySize' => $newBellySize,
        ]);
        return [
            'success' => $success
        ];
    }

    public function drink(Bird $bird) {
        $bird = Bird::find($bird);
        $newBellySize = $bird->bellySize + request('pintsOfWater');
        if ($newBellySize > 50 || $newBellySize < 1) {
            $bird->update([
                'isAlive' => false,
            ]);
        }
        if ($newBellySize >= 1 && $newBellySize <=10) {
            $bird->update([
                'isHungry' => true,
            ]);
        }
        $success = $bird->update([
            'bellySize' => $newBellySize,
        ]);
        return [
            'success' => $success
        ];
    }

    public function eat(Bird $bird) {
        $bird = Bird::find($bird);
        $newBellySize = $bird->bellySize + request('morselsOfFood');
        if ($newBellySize > 50 || $newBellySize < 1) {
            $bird->update([
                'isAlive' => false,
            ]);
        }
        if ($newBellySize >= 1 && $newBellySize <=10) {
            $bird->update([
                'isHungry' => true,
            ]);
        }
        $success = $bird->update([
            'bellySize' => $newBellySize,
        ]);
        return [
            'success' => $success
        ];
    }

    public function isAlive(Bird $bird) {
        $bird = Bird::find($bird);
        if ($bird->isAlive) {
            return true;
        } else if (!$bird->isAlive) {
            return false;
        } else {
            return [
                'success' => $bird
            ];
        }
    }

    public function isHungry(Bird $bird) {
        $bird = Bird::find($bird);
        if ($bird->isHungry) {
            return true;
        } else if (!$bird->isHungry) {
            return false;
        } else {
            return [
                'success' => $bird
            ];
        }
    }
}
