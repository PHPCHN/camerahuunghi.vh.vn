<?php

class News extends Model
{

    const UPLOAD_KEY = 'news';
    const PAGINATE = 20;

    public static function const_about() {
      return [
        'gioi-thieu' => 'const_abouts',
        'chinh-sach' => 'const_policies',
        'tuyen-dung' => 'const_recruits',
        'ho-tro' => 'const_supports',
      ];
    }

    public static function const_abouts() {
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

    public static function const_recruits() {
      return [
        'nhan-vien-marketing-online',
        'nhan-vien-ky-thuat',
      ];
    }

    public static function const_supports() {
      return [
        'ky-thuat',
        'tu-van-giai-phap-thiet-bi',
        'download-tai-lieu-phan-mem',
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

    public static function column() {
      return [
        'id',
        'title',
        'description',
        'image',
        'content',
        'created_at',
      ];
    }

    public function image_link() {
      return Config::get('uploads.'.self::UPLOAD_KEY).$this->image;
    }
}
