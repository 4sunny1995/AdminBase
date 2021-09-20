<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = !empty($this->id) ? $this->id : 0;

        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];

            case 'POST':
                return [
                    'name' => 'required|string|max:50',
                    'username' => 'required|string|max:50|unique:users',
                    'email' => 'required|email|min:6|max:255|unique:users',
                    'password' => 'required|min:6|max:30|string',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|string|max:50',
                    'username' => 'required|string|max:50|min:6|unique:users',
                    'email' => 'required|email|min:6|max:255|unique:users'
                ];

            default:
                break;
        }
    }
}
