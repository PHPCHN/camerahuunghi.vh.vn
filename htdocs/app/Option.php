<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Option extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'options';

    /**
     * Define attributes deleted_at of the data.
     *
     * @var string
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'keyword',
    ];

    public static function liston_search() {
      return self::listby_ids([1,2]);
    }

    public static function listby_cate($cate) {
      $cate_id = $cate->sup_id;
      if($cate_id == 0) $cate_id = $cate->id;
      $opt_ids = DB::table('category_opts')->where('cate_id', $cate_id)->pluck('opt_id');
      return self::listby_ids($opt_ids);
    }

    private static function listby_ids($opt_ids) {
      $options = self::select(['id', 'name', 'keyword'])->whereIn('id', $opt_ids)->get();
      $option_vals = array();
      foreach($options as $option) {
        $vals = DB::table('option_vals')->select(['label', 'keyword'])
                ->where('opt_id', $option->id)->get();
        $option_vals[] = ['opt' => $option, 'val' => $vals];
      }
      return $option_vals;
    }
}
