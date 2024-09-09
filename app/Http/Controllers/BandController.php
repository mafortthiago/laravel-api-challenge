<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{

    public function getAll(){
        $bands = $this->getBands();
        return response()->json([$bands]);
    }
    public function getById($id){
        $band = null;
        foreach($this->getBands() as $band){
            if($band['id'] == $id){
                return response()->json($band);
            }
        }
        abort(404);
    }
    public function getByGender($gender){
        $bands = [];

        foreach($this->getBands() as $_band) {
            if ($_band['gender'] == $gender) {
                $bands[] = $_band;
            }
        }

        return response()->json($bands);
    }

    public function insert(Request $request){
        $validate = $request->validate([
            'name' =>'required|min:3'
        ]);
        return response()->json($request->all());
    }

    protected function getBands(){
        return [
            ["id" => 1, 'name' => 'Engenheiros do hawaii', 'gender' => 'Rock brasileiro'],
            ["id" => 2, 'name' => 'A-ha', 'gender' => 'Pop-rock']
        ];
    }
}
