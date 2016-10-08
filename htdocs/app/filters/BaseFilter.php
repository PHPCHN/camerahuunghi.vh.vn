<?php
class BaseFilter {
  protected $rules = array();

  public function filter() {
    $validator = Validator::make(Input::all(), $this->rules);
    if($validator->fails()) {
			Session::flash('flash_error_valid', $validator->messages());
      return Redirect::back();
		}
  }
}
