<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller {
    protected $bands = [
        ["id" => 1, 'name' => 'Engenheiros do Hawaii', 'gender' => 'Rock brasileiro'],
        ["id" => 2, 'name' => 'A-ha', 'gender' => 'Pop-rock']
    ];

    public function getAll() {
        return response()->json($this->bands);
    }

    public function getById($id) {
        foreach($this->bands as $band) {
            if($band['id'] == $id) {
                return response()->json($band);
            }
        }
        abort(404, 'Banda não encontrada');
    }

    public function getByGender($gender) {
        $bands = [];
        foreach($this->bands as $band) {
            if($band['gender'] == $gender) {
                $bands[] = $band;
            }
        }
        return response()->json($bands);
    }
}
