<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Product extends Model
{
    use SoftDeletes;

    const UPLOAD_KEY = 'product';
    const ONTOP = 1;
    const NONTOP = 0;
    const ONHOME = 1;
    const NONHOME = 0;
    const PAGINATE = 20;
    const SORT = [
      'Mới nhất' => 'new',
      'Giá tăng' => 'gia-tang',
      'Giá giảm' => 'gia-giam',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
        'cate_id',
        'description',
        'content',
        'price',
        'image',
        'code',
        'top',
        'new',
        'pro',
    ];

    public static function column() {
       return [
         'id',
         'name',
         'image',
         'description',
         'price',
         'top',
         'new',
         'pro',
         'code',
         'cate_id',
       ];
    }

    public function get_opt_th() {
      $trademark = DB::table('product_opts')
                      ->join('option_vals', 'option_vals.id', '=', 'product_opts.opt_val_id')
                      ->where('product_id', $this->id)
                      ->where('opt_id', 2)->lists('label');
      if(count($trademark)) return $trademark[0];
    }

    public function get_cate() {
      $cate = Category::select(['id', 'sup_id', 'keyword'])->find($this->cate_id);
      if($cate->sup_id != 0)
        $cate = Category::select(['id', 'sup_id', 'keyword'])->find($cate->sup_id);
      return $cate;
    }

    public static function liston_top() {
      $top = self::select(self::column())->where('top', self::ONTOP)->get();
      $link_keys = Category::listfor_links();
      foreach($top as $product)
        $product->link = $link_keys[$product->cate_id].'/'.$product->code;
      return $top;
    }

    public static function listby_mcate() {
      $cates = Category::listfor_links();
      $products = self::select(self::column())->where('home', self::ONHOME)->get();
      $list_mcate = array();
      foreach($products as $product) {
        $key = $cates[$product->cate_id];
        if(!isset($list_mcate[$key])){
          $list_mcate[$key] = array();
        }
        $list_mcate[$key][] = $product;
      }
      return $list_mcate;
    }

    public static function listby_cate($cate_id, $column=null) {
      $cate_ids = Category::where('id', $cate_id)->orWhere('sup_id', $cate_id)->lists('id');
      if(!$column) $column = self::column();
      $products = self::select($column)->whereIn('cate_id', $cate_ids);
      return $products;
    }

    public static function getby_cate($cate, $code) {
      $column = self::column();
      $column[] = 'content';
      if($cate)
        return self::listby_cate($cate->id, $column)->where('code', $code)->first();
    }

    public static function listby_cate_opt($cate_id, $request) {
      $product_ids = self::listby_opt($request);
      $products = self::listby_cate($cate_id);
      if($product_ids!==null)
        $products = $products->whereIn('id', $product_ids);
      $product_sorts = self::listby_sort($products, $request->input('sort'))->paginate(self::PAGINATE);
      return $product_sorts;
    }

    private static function listby_opt($request) {
      $sort = $request->input('sort');
      $options = Option::join('option_vals', 'option_vals.opt_id', '=', 'options.id')
      ->where(function($query) use ($request){
        foreach($request->all() as $opt => $val) {
          $query->orWhere(function($query) use ($opt, $val){
            $query->where('options.keyword', $opt)
                  ->where('option_vals.keyword', $val);
          });
        }
      })->select('option_vals.id')->lists('id');
      if(count($options)>0 && count($options)<=count($request->all())) {
        $product_ids = DB::table('product_opts')->whereIn('opt_val_id', $options)
                        ->groupBy('product_id')
                        ->havingRaw('count(product_id) = '.(count($options)))
                        ->lists('product_id');
        return $product_ids;
      }
    }

    private static function listby_sort($query, $sort) {
      if($sort == 'new') $query_sort = $query->orderBy('created_at', 'desc');
      else if($sort == 'gia-tang') $query_sort = $query->orderBy('price');
      else if($sort == 'gia-giam') $query_sort = $query->orderBy('price', 'desc');
      else if($sort == 'default') $query_sort = $query->orderBy('code');
      else $query_sort = $query;
      return $query_sort;
    }

    public static function search($request) {
      $keys = explode(' ', $request->input('search'));
      $seo_ids = Seo::where(function($query) use ($keys){
        foreach($keys as $key) {
          $query->orWhere('keyword', 'like', '%'.$key.'%')
            ->orWhereRaw("'$key' like concat('%',keyword,'%')");
          }
      })->lists('id');
      $product_search_ids = DB::table('product_seos')->whereIn('seo_id', $seo_ids)->lists('product_id');
      $product_sort_ids = self::listby_opt($request);
      $products = self::select(self::column())->whereIn('id', $product_search_ids);
      if($product_sort_ids!==null)
        $products = $products->whereIn('id', $product_sort_ids);
      $products = self::listby_sort($products, $request->input('sort'))->paginate(self::PAGINATE);
      $link_keys = Category::listfor_links();
      foreach($products as $product)
        $product->link = $link_keys[$product->cate_id].'/'.$product->code;
      return $products;
    }

    public function image_link() {
      return config('uploads.'.self::UPLOAD_KEY).$this->image;
    }
}
