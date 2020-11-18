<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use DB;

class UserController extends Controller
{
    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        // $listUser = $this->user->all();
            // dd(1);
        $listUser = DB::table('users')
            ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->leftjoin('roles', 'roles.id', '=', 'role_user.role_id')
            ->leftjoin('user_class', 'users.id', '=', 'user_class.user_id')
            ->where('user_class.name', '=', 'admin')
            ->select('users.*', 'roles.display_name')->get();
        // dd($listUser);
        return view('admin.user.index', compact('listUser'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // Insert data to user table
            $userCreate = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            // DB::table('user_detail')->insertGetId([
            //     'user_id'              => $userCreate->id,
            // ]);
            DB::table('user_class')->insertGetId([
                'user_id'           => $userCreate->id,
                'name'              => 'admin',
            ]);
            // Insert data to role_user
            $userCreate->roles()->attach($request->roles);
//            $roles = $request->roles;
//            foreach ($roles as $roleId) {
//                \DB::table('role_user')->insert([
//                    'user_id' => $userCreate->id,
//                    'role_id' => $roleId
//                ]);
//            }

            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }


    }

    /**
     * @param $id
     * show form edit
     */
    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->findOrfail($id);
        $listRoleOfUser = DB::table('role_user')->where('user_id', $id)->pluck('role_id');
        return view('admin.user.edit', compact('roles', 'user', 'listRoleOfUser'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // update user tabale
            $this->user->where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            // Update to role_user table
            DB::table('role_user')->where('user_id', $id)->delete();
            $userCreate = $this->user->find($id);
            $userCreate->roles()->attach($request->roles);
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            dd(error);
            DB::rollBack();
        }


    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete user
            $user = $this->user->find($id);
            $user->delete($id);
            // Delete user of role_user table
            $user->roles()->detach();
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }
}
