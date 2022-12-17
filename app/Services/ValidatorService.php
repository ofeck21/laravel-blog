<?php
namespace App\Services;

use Illuminate\Support\Facades\Validator;

class ValidatorService {

    public function isValidateFail($request, $rules) {
        return $this->validateInput($request, $rules)->fails();
    }

    public function validateInput($request, $rules) {
        $validator = Validator::make($request->all(), $rules);
        return $validator;
    }

    public function getErrors($request, $rules) {
        $validator = $this->validateInput($request, $rules);
        return $validator->errors();
    }
}
?>
