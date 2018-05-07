<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Users
 * @package App\Modules\Admin\Models
 */
class Users extends Model
{

    protected $table = "user";

    /**
     * Get users
     *
     * @return int|string
     */
    public function getUsers()
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

    /**
     *
     * Check admin details
     *
     * @param $email
     * @param $password
     * @param $isAdmin
     * @return int|string
     */
    public function checkAdminDetails($email, $password,$isAdmin)
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

    /**
     * Get admin
     *
     * @param $email
     * @return int|string
     */
    public function getAdmin($email)
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
