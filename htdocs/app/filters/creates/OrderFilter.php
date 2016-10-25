<?php
class OrderFilter extends BaseFilter {

  public function __construct() {
    OrderController::order_bkp();

    if(Input::has('sm_order')) {
      $this->rules = [
        'name' => 'required',
        'phone' => 'required|phone',
        'address' => 'required',
      ];

      if(Input::has('ql'))
      foreach (Input::get('ql') as $key => $value) {
        $this->rules['ql.'.$key] = 'ql';
      }

      Validator::extend('phone', function($attribute, $value, $parameters) {
        return preg_match('/^0[0-9]{8,11}$/', $value);
      });

      Validator::extend('ql', function($attribute, $value, $parameters) {
        if(Input::has('ql')) {
          $key = explode('.', $attribute)[1];
          $value = Input::get('ql')[$key];
          $validator = Validator::make(['ql' => $value],
              ['ql' => 'required|integer|min:1']);
          return !$validator->fails();
        }
        return 1;
      });
    }
  }
}
