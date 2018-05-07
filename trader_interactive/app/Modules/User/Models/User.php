<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class User
 * @package App\Modules\User\Models
 */
class User extends Model
{

    protected $table = "user";


    /**? get user detail
     * @return int|string
     */
    public function getUserDetails()
    {
        try {
            $result = DB::table($this->table)
                ->get();
            if ($result) {
                return $result;
            } else {
                return 0;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**? check user details
     * @param $email
     * @param $password
     * @param $isAdmin
     * @return int|string
     */
    public function checkUserDetails($email, $password,$isAdmin)
    {
        try {
            $result = DB::table($this->table)
                ->where('email', $email)
                ->where('password', $password)
                ->where('isAdmin', $isAdmin)
                ->get();
            if ($result) {
                return $result;
            } else {
                return 0;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**?  get user by email
     * @param $email
     * @return int|string
     */
    public function getUser($email)
    {
        try {
            $result = DB::table($this->table)
                ->where('email', $email)
                ->get();
            if ($result) {
                return $result;
            } else {
                return 0;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

