<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

use App\User;
use Intervention\Image\Facades\Image;
use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;

class UserController extends Controller
{
    //
    public function show($id)
    {
        $user = User::findorFail($id); //

        // view > usersフォルダにファイルを移動
        return view('users.profile', compact('user'));
    }

    // maru 追加 
    public function setting($id)
    {
        $user = User::findorFail($id); //
        return view('users.setting', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findorFail($id);

        // view > usersフォルダにファイルを移動
        return view('users.profileedit', compact('user'));
        // return view('users.edit', compact('user'));
    }

    public function update($id, ProfileRequest $request)
    {
        $user = User::findorFail($id);
    
        if (!is_null($request['img_name'])) {
            $imageFile = $request['img_name'];

            $list = FileUploadServices::fileUpload($imageFile);
            list($extension, $fileNameToStore, $fileData) = $list;

            $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
            $image = Image::make($data_url);
            $image->resize(400, 400)->save(storage_path() . '/app/public/images/' . $fileNameToStore);

            $user->img_name = $fileNameToStore;
        }

        if (!is_null($request['img_name2'])) {
            $imageFile = $request['img_name2'];

            $list = FileUploadServices::fileUpload($imageFile);
            list($extension, $fileNameToStore, $fileData) = $list;

            $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
            $image = Image::make($data_url);
            $image->resize(400, 400)->save(storage_path() . '/app/public/images/' . $fileNameToStore);

            $user->img_name2 = $fileNameToStore;
        }

        if (!is_null($request['img_name3'])) {
            $imageFile = $request['img_name3'];

            $list = FileUploadServices::fileUpload($imageFile);
            list($extension, $fileNameToStore, $fileData) = $list;

            $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
            $image = Image::make($data_url);
            $image->resize(400, 400)->save(storage_path() . '/app/public/images/' . $fileNameToStore);

            $user->img_name3 = $fileNameToStore;
        }

        // jobの入力
        if(!is_null($request['job'])){
            $user->job = $request->job;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;
        $user->self_introduction = $request->self_introduction;

        $user->save();

        // return redirect()->to('home');
        return redirect()->route('users.show', $id);
    }
}
