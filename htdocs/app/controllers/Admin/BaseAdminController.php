<?php

class BaseAdminController extends BaseController
{
    /**
     * Instantiate a new AdminBaseController instance.
     */
      public function __construct()
      {
          $this->beforeFilter('auth');
      }
    /**
     * Save upload image from request file into uploads folder
     *
     * @param string $path
     * @param UploadedFile $file
     *
     * @return string
     */
    public function imageUpload($path, $file)
    {
        $dir = config("uploads.$path");
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $name = $file->getClientOriginalName();
        while (file_exists($dir.$name)) {
            $name = (rand(10, 99))."_".$name;
        }
        $file->move($dir, $name);
        return $name;
    }

    /**
     * Remove image from uploads folder
     *
     * @param string $path
     * @param string $filename
     *
     * @return boolean
     */
    public function imageRemove($path, $filename)
    {
        $dir = config("uploads.$path");
        if (file_exists($dir.$filename)) {
            unlink($dir.$filename);
            return true;
        }
        return false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
