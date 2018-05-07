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
 * @SWG\Swagger(
 *     schemes={"http"},
 *     host=L5_SWAGGER_CONST_HOST,
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="L5 Swagger API",
 *         description="L5 Swagger API description",
 *     ),
 * )
 */

/**
 * Class ApiListingsController
 * @package App\Modules\User\Controllers
 */
class ApiListingsController extends Controller
{
    /**
     * @SWG\Get(
     *      path="/api/listings",
     *      operationId="getListings",
     *      tags={"listings"},
     *      summary="Get list of listings",
     *      description="Returns list of listings",
     *      @SWG\Response(
     *          response=200,
     *          description="Listing Details Found"
     *       ),
     *       @SWG\Response(response=500, description="Listing Details Not Found"),
     *     )
     *
     * Returns list of listings
     */
    public function listings()
    {
        try {
            $Listings = new Listings();
            $result = $Listings->getListings();
            $data = new stdClass();
            if (count($result) > 0) {
                $data->code = 200;
                $data->message = "Listing Details Found";
                $data->data = $result;
                return response()->json($data);
            } else {
                $data->code = 500;
                $data->message = "Listing Details Not Found";
                $data->data = $result;
                return response()->json($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @SWG\Get(
     *      path="/api/listing-details/id={id}",
     *      operationId="getListingDetails",
     *      tags={"listing-details"},
     *      summary="Get Individual Listing Details",
     *      description="Returns Individual Listing Details",
     *      @SWG\Parameter(
     *          name="id",
     *          description="listing id",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Individual Listing Details Found"
     *       ),
     *      @SWG\Response(response=500, description="Individual Listing Details Not Found"),
     * )
     *
     *
     * Get listings details
     */
    public function listingDetails($id)
    {
        try {

            $Listings = new Listings();
            $result = $Listings->getListingDetails($id);
            $data = new stdClass();
            if (count($result) > 0) {
                $data->code = 200;
                $data->message = "Individual Listing Details Found";
                $data->data = $result;
                return response()->json($data);
            } else {
                $data->code = 500;
                $data->message = "Individual Listing Details Not Found";
                $data->data = $result;
                return response()->json($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @SWG\Get(
     *      path="/api/search-listing-details/make={make}/model={model}/min_price={min_price}/max_price={max_price}",
     *      operationId="getUserListings",
     *      tags={"search-listing-details"},
     *      summary="Get Searched Listing Details",
     *      description="Returns Searched Listing Details",
     *      @SWG\Parameter(
     *          name="make",
     *          description="make",
     *          required=true,
     *          type="string",
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="model",
     *          description="model name",
     *          required=true,
     *          type="string",
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="min_price",
     *          description="minimum price",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="max_price",
     *          description="maximum price",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Searched Listing Details Found"
     *       ),
     *      @SWG\Response(response=500, description="Searched Listing Details Not Found"),
     * )
     *
     *
     * Returns Searched Listing Details
     */
    public function searchListingDetails($make, $model, $min_price, $max_price)
    {
        try {
            $Listings = new Listings();
            $result = $Listings->getUserListings($make, $model, $min_price, $max_price);
            $data = new stdClass();
            if (count($result) > 0) {
                $data->code = 200;
                $data->message = "Searched Listing Details Found";
                $data->data = $result;
                return response()->json($data);
            } else {
                $data->code = 500;
                $data->message = "Searched Listing Details Not Found";
                $data->data = $result;
                return response()->json($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @SWG\Post(
     *      path="/api/create-listings",
     *      operationId="createListings",
     *      tags={"create-listings"},
     *      summary="Create listings",
     *      description="Create listings",
     *      @SWG\Parameter(
     *          name="make",
     *          description="make",
     *          required=true,
     *          type="string",
     *          in="formData"
     *      ),
     *      @SWG\Parameter(
     *          name="model",
     *          description="model",
     *          required=true,
     *          type="string",
     *          in="formData"
     *      ),
     *      @SWG\Parameter(
     *          name="year",
     *          description="year",
     *          required=true,
     *          type="integer",
     *          in="formData"
     *      ),
     *      @SWG\Parameter(
     *          name="description",
     *          description="description",
     *          required=true,
     *          type="string",
     *          in="formData"
     *      ),
     *      @SWG\Parameter(
     *          name="price",
     *          description="price",
     *          required=true,
     *          type="integer",
     *          in="formData"
     *      ),
     *      @SWG\Parameter(
     *          name="colour",
     *          description="colour",
     *          required=true,
     *          type="string",
     *          in="formData"
     *      ),
     *     @SWG\Parameter(
     *          name="thumbnail_1",
     *          description="thumbnail_1",
     *          required=true,
     *          type="file",
     *          in="formData",
     *          @SWG\Schema(
     *              type="file",
     *          ),
     *      ),
     *     @SWG\Parameter(
     *          name="thumbnail_2",
     *          description="thumbnail_2",
     *          required=true,
     *          type="file",
     *          in="formData",
     *          @SWG\Schema(
     *              type="file",
     *          ),
     *      ),
     *     @SWG\Parameter(
     *          name="thumbnail_3",
     *          description="thumbnail_3",
     *          required=true,
     *          type="file",
     *          in="formData",
     *          @SWG\Schema(
     *              type="file",
     *          ),
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Listings Created Successfully"
     *       ),
     *      @SWG\Response(response=500, description="Listings Not Created"),
     * )
     *
     * Create listings
     *
     */
    public function createListings(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $Listings = new Listings();
                $Listings->make = $request->input('make');
                $Listings->model = $request->input('model');
                $Listings->year = $request->input('year');
                $thumbnail_1 = $request->file('thumbnail_1')->store('/listings/thumbnail_1');
                $Listings->thumbnail_1 = $thumbnail_1;
                $thumbnail_2 = $request->file('thumbnail_2')->store('/listings/thumbnail_2');
                $Listings->thumbnail_2 = $thumbnail_2;
                $thumbnail_3 = $request->file('thumbnail_3')->store('/listings/thumbnail_3');
                $Listings->thumbnail_3 = $thumbnail_3;
                $Listings->description = $request->input('description');
                $Listings->price = $request->input('price');
                $Listings->colour = $request->input('colour');
                $Listings->save();
                $data = new stdClass();
                if ($Listings) {
                    $data->code = 200;
                    $data->message = "Listings Created Successfully";
                    $data->data = $Listings;
                    return response()->json($data);
                } else {
                    $data->code = 500;
                    $data->message = "Listings Not Created";
                    $data->data = $Listings;
                    return response()->json($data);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
