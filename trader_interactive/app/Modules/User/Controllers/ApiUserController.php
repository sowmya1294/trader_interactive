<?php

namespace App\Modules\User\Controllers;

use App\Modules\Admin\Models\Reviews;
use App\Modules\Admin\Models\Sellers_Listings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Users;
use App\Modules\Admin\Models\Listings;
use App\Modules\Admin\Models\Sellers;
use Illuminate\Support\Facades\Mail;
use stdClass;
use Illuminate\Support\Facades\Hash;



/**
 * Class ApiUserController
 * @package App\Modules\User\Controllers
 */
class ApiUserController extends Controller
{

    /**
     * @SWG\Get(
     *      path="/api/users",
     *      operationId="getUsers",
     *      tags={"users"},
     *      summary="Get list of users",
     *      description="Returns list of users",
     *      @SWG\Response(
     *          response=200,
     *          description="User Details Found"
     *       ),
     *       @SWG\Response(response=500, description="User Details Not Found"),
     *     )
     *
     * Returns list of users
     */
    public function users()
    {
        try {
            $Users = new Users();
            $result = $Users->getUsers();
            $data = new stdClass();
            if (count($result) > 0) {
                $data->code = 200;
                $data->message = "User Details Found";
                $data->data = $result;
                return response()->json($data);
            } else {
                $data->code = 500;
                $data->message = "User Details Not Found";
                $data->data = $result;
                return response()->json($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @SWG\Post(
     *      path="/api/create-users",
     *      operationId="createUsers",
     *      tags={"create-users"},
     *      summary="Create User",
     *      description="Create User",
     *      @SWG\Parameter(
     *          name="name",
     *          description="name",
     *          required=true,
     *          type="string",
     *          in="body",
     *          @SWG\Schema(
     *              type="multipart/form-data",
     *              example={"name": "john","email": "john@example.com","password": "swagger","phone" : "987654321"},
     *          ),
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="User Created Successfully"
     *       ),
     *      @SWG\Response(response=500, description="User Not Created"),
     * )
     *
     *
     * Create User
     */
    public function createUsers(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $Users = new Users();
                $Users->name = $request->input('name');
                $Users->email = $request->input('email');
                $Users->password = Hash::make($request->input('password'));
                $Users->phone = $request->input('phone');
                $Users->save();
                $data = new stdClass();
                if ($Users) {
                    $data->code = 200;
                    $data->message = "User Created Successfully";
                    $data->data = $Users;
                    return response()->json($data);
                } else {
                    $data->code = 500;
                    $data->message = "User Not Created";
                    $data->data = $Users;
                    return response()->json($data);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
