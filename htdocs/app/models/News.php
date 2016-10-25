<?php

class News extends Model
{

    const UPLOAD_KEY = 'news';
    const PAGINATE = 20;

    public static function const_about() {
      return [
        'gioi-thieu',
      ];
    }

    public static function const_policies() {
      return [
        'uu-dai',
        'bao-hanh',
        'van-chuyen',
        'doi-tra-hang',
        'bao-mat-thong-tin',
      ];
    }

    public static function const_recruit() {
      return [
        'tuyen-dung',
      ];
    }

    public static function const_support() {
      return [
        'ho-tro',
      ];
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

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
        'title',
        'description',
        'image',
        'content',
        'keyword',
    ];

    public function image_link() {
      return Config::get('uploads.'.self::UPLOAD_KEY).$this->image;
    }
}
