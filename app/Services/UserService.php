<?php
namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\UserInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserService
{
    private $userRepository;
    public function __construct(UserInterface $userRepository)
    {

        $this -> userRepository = $userRepository;
    }
    public function all(Request $request)
    {
        $users = $this -> userRepository -> all();
        return $users;
    }
    public function findUserById($id){
        return $this -> userRepository -> findById($id);
    }
    public function updateUser($id,UserRequest $request){
        $body = $request -> only('name','username','email');

        $user = $this -> userRepository -> update(['id'=>$id],$body);
        return $user;
    }
    public function createUser(UserRequest $request)
    {
        $body = $request -> only('username','name','email','password');
        $body['password'] = Hash::make($body['password']);

        $user = $this -> userRepository -> create($body);
        return $user;
    }
    public function deleteUser($id)
    {
        try
        {
            DB::beginTransaction();
            $user = $this -> userRepository ->findOrFail($id) -> delete();
            DB::commit();
            return $user;
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            DB::rollBack();
        }
    }
}
