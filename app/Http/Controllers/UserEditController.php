<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\shopRequestForm\FormEditRequestUser;
use App\User;

class UserEditController extends Controller
{
    public function editUser(FormEditRequestUser $request, $id){
        $dataUser = $request->all();
        $user = User::find($id);

                if(empty($dataUser['active'])){
                    $user['active'] = 'off';
                }

                if(!empty($dataUser['active'])){
                    $user['active'] = 'on';
                }

                if(!($dataUser['password'] == $user['password'])){
                    $dataUser['password'] = Hash::make($request->password);
                }

        if(!empty($dataUser['picture'])){
            $dataUser['picture'] = $request->file('picture')->storePublicly('images/users');;
        }

        $resultUser = $user->update($dataUser);

        if($resultUser){
            return redirect()
                ->route('view-edit-user', $user->id)
                ->with(['success' => 'Успешно сохранено !']);
        }else{
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

    }
}
