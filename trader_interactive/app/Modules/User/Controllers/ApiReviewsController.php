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
 * Class ApiReviewsController
 * @package App\Modules\User\Controllers
 */
class ApiReviewsController extends Controller
{

    /**
     * @SWG\Post(
     *      path="/api/contact",
     *      operationId="contact",
     *      tags={"contact"},
     *      summary="Sending Email",
     *      description="Sending Email",
     *      @SWG\Parameter(
     *          name="msg",
     *          description="msg",
     *          required=true,
     *          type="string",
     *          in="body",
     *          @SWG\Schema(
     *              type="object",
     *              example={"msg": "john"},
     *          ),
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Message Send Successfully"
     *       ),
     * )
     *
     *
     * to send email
     */
    public function contact(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $msg = $request->input('msg');// the message
                $data = array('name' => "Sir/Mam", "body" => "$msg");
                $send = Mail::send('User::contact', $data, function ($message) {
                    $message->to('sowmya15227@gmail.com')
                        ->subject('Enquiry Regarding Listings');
                    $message->from('sowmya.prasad@dreamorbit.com');
                });
                $data = new stdClass();
                $data->code = 200;
                $data->message = "Message Send Successfully";

                return response()->json($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @SWG\Get(
     *      path="/api/reviews/id={id}",
     *      operationId="getUserReviewDetails",
     *      tags={"reviews"},
     *      summary="Get Individual Listing Review Details",
     *      description="Returns Individual Listing Review Details",
     *      @SWG\Parameter(
     *          name="id",
     *          description="seller id",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Individual Listing Review Details Found"
     *       ),
     *      @SWG\Response(response=500, description="Individual Listing Review Details Not Found"),
     * )
     *
     *
     * Returns Individual Listing Review Details
     */
    public function reviews($id)
    {
        try {
            $Listings = new Listings();
            $result = $Listings->getUserReviewDetails($id);
            $data = new stdClass();
            if (count($result) > 0) {
                $data->code = 200;
                $data->message = "Individual Listing Review Details Found";
                $data->data = $result;
                return response()->json($data);
            } else {
                $data->code = 500;
                $data->message = "Individual Listing Review Details Not Found";
                $data->data = $result;
                return response()->json($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    /**
     * @SWG\Post(
     *      path="/api/create-reviews",
     *      operationId="createReviews",
     *      tags={"create-reviews"},
     *      summary="Create reviews",
     *      description="Create reviews",
     *      @SWG\Parameter(
     *          name="reviewer_name",
     *          description="reviewer_name",
     *          required=true,
     *          type="string",
     *          in="body",
     *          @SWG\Schema(
     *              type="object",
     *              example={"reviewer_name":"test","seller_id": "1","rating": "2","reviews": "nice"},
     *          ),
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Reviews Created Successfully"
     *       ),
     *      @SWG\Response(response=500, description="Reviews Not Created"),
     * )
     *
     * Create reviews
     *
     */
    public function createReviews(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $Reviews = new Reviews();
                $Reviews->reviewer_name = $request->input('reviewer_name');
                $Reviews->seller_id = $request->input('seller_id');
                $Reviews->rating = $request->input('rating');
                $Reviews->reviews = $request->input('reviews');
                $Reviews->save();
                $data = new stdClass();
                if ($Reviews) {
                    $data->code = 200;
                    $data->message = "Reviews Created Successfully";
                    $data->data = $Reviews;
                    return response()->json($data);
                } else {
                    $data->code = 500;
                    $data->message = "Reviews Not Created";
                    $data->data = $Reviews;
                    return response()->json($data);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
