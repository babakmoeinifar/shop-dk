<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Role;
use App\Rules\Nationalcode;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate();
        if (request()->wantsJson()) {
            return $users;
        }
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::orderBy('id', 'desc')->get();
        $cities = City::whereParentId(0)->get();
        return view('admin.users.create', compact('roles', 'cities')
        ,['user' => new User()]);
    }

    public function store()
    {
        request()->validate([
            'fname' => ['required', 'string', 'min:3', 'max:191'],
            'lname' => ['required', 'string', 'min:3', 'max:191'],
            'email' => 'nullable | max:191 | unique:users,email',
            'mobile' => 'required | numeric | digits:11 | unique:users,mobile',
        ]);

        User::create([
            'fname' => request('fname'),
            'lname' => request('lname'),
            'email' => request('email'),
            'mobile' => request('mobile'),
            'role_id' => request('role_id'),
            'nationalcode' => request('nationalcode'),
            'bankcard' => request('bankcard'),
            'city_id' => request('city_id'),
            'password' => bcrypt(request('mobile'))
        ]);

        return redirect('shoppy/users')->with('flash', 'کاربر جدید ایجاد شد');
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('id', 'desc')->get();
        $cities = City::whereParentId(0)->get();
        return view('admin.users.edit', compact('user', 'roles', 'cities'));
    }

    public function update(User $user)
    {
        request()->validate([
            'fname' => ['required', 'string', 'min:3', 'max:191'],
            'lname' => ['required', 'string', 'min:3', 'max:191'],
            'email' => ['nullable', 'max:191', Rule::unique('users')->ignore($user->id)],
            'mobile' => ['required', 'numeric', 'digits:11', Rule::unique('users')->ignore($user->id)],
            'nationalcode' => [new Nationalcode()]
        ]);

        if (trim(request('password')) == '') {
            $input = request()->except('password');
        } else {
            $input = request()->all();
            $input['password'] = bcrypt(request('password'));
        }

        if (request()->hasFile('image')) {
            $image_tmp = Input::file('image');
            if ($image_tmp->isValid()) {
                $input = saveImageFile($image_tmp, $input, 200, 200, 'images/users/');
                $this->removeOldImageFile($user);
            }
        }

        $user->update($input);
        return redirect('shoppy/users')->with('flash', 'کاربر موردنظر ویرایش شد');
    }

    public function destroy(User $user)
    {
        if (file_exists($user->image)) {
            unlink($user->image);
        }
        $user->delete();
        return back()->with('flash', 'کاربر موردنظر حذف شد');
    }

    /**
     * @param User $user
     */
    protected function removeOldImageFile(User $user): void
    {
        $prePhoto = User::where('id', $user->id)->pluck('image')->first();
        if (file_exists($prePhoto)) {
            unlink($prePhoto);
        }
    }
}
