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



/**?
 * Class ApiSellerController
 * @package App\Modules\User\Controllers
 */
class ApiSellerController extends Controller
{

    /**
     * @SWG\Get(
     *      path="/api/sellers",
     *      operationId="getSellers",
     *      tags={"sellers"},
     *      summary="Get list of sellers",
     *      description="Returns list of sellers",
     *      @SWG\Response(
     *          response=200,
     *          description="Sellers Details Found"
     *       ),
     *       @SWG\Response(response=500, description="Sellers Details Not Found"),
     *     )
     *
     * Returns list of sellers
     */
    public function sellers()
    {
        try {
            $Sellers = new Sellers();
            $result = $Sellers->getSellers();
            $data = new stdClass();
            if (count($result) > 0) {
                $data->code = 200;
                $data->message = "Sellers Details Found";
                $data->data = $result;
                return response()->json($data);
            } else {
                $data->code = 500;
                $data->message = "Sellers Details Not Found";
                $data->data = $result;
                return response()->json($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @SWG\Get(
     *      path="/api/seller-details/id={id}",
     *      operationId="getSellerDetails",
     *      tags={"seller-details"},
     *      summary="Get Individual Seller Details",
     *      description="Returns Individual Seller Details",
     *      @SWG\Parameter(
     *          name="id",
     *          description="seller id",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Individual Seller Details Found"
     *       ),
     *      @SWG\Response(response=500, description="Individual Seller Details Not Found"),
     * )
     *
     * Returns Individual Seller Details
     */
    public function sellerDetails($id)
    {
        try {
            $Sellers = new Sellers();
            $result = $Sellers->getSellerDetails($id);
            $data = new stdClass();
            if (count($result) > 0) {
                $data->code = 200;
                $data->message = "Individual Seller Details Found";
                $data->data = $result;
                return response()->json($data);
            } else {
                $data->code = 500;
                $data->message = "Individual Seller Details Not Found";
                $data->data = $result;
                return response()->json($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @SWG\Get(
     *      path="/api/seller-listing-details/id={id}",
     *      operationId="getIndividualSellerDetails",
     *      tags={"seller-listing-details"},
     *      summary="Get Seller Listing Details",
     *      description="Returns Seller Listing Details",
     *      @SWG\Parameter(
     *          name="id",
     *          description="seller id",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Seller Listing Details Found"
     *       ),
     *      @SWG\Response(response=500, description="Seller Listing Details Not Found"),
     * )
     *
     * Returns Seller Listing Details
     */
    public function sellerListingDetails($id)
    {
        try {
            $Sellers = new Sellers();
            $result = $Sellers->getIndividualSellerDetails($id);
            $data = new stdClass();
            if (count($result) > 0) {
                $data->code = 200;
                $data->message = "Seller Listing Details Found";
                $data->data = $result;
                return response()->json($data);
            } else {
                $data->code = 500;
                $data->message = "Seller Listing Details Not Found";
                $data->data = $result;
                return response()->json($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @SWG\Get(
     *      path="/api/seller-individual-listing-details/id={id}/type={type}",
     *      operationId="getSellerListingDetails",
     *      tags={"seller-individual-listing-details"},
     *      summary="Get Seller Individual Listing Details",
     *      description="Returns Seller Individual Listing Details",
     *      @SWG\Parameter(
     *          name="id",
     *          description="seller id",
     *          required=true,
     *          type="integer",
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="type",
     *          description="listing type",
     *          required=true,
     *          type="string",
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Seller Individual Listing Details Found"
     *       ),
     *      @SWG\Response(response=500, description="Seller Individual Listing Details Not Found"),
     * )
     *
     *
     * Returns Seller Individual Listing Details
     */
    public function sellerIndividualListingDetails($id, $type)
    {
        try {
            $Sellers = new Sellers();
            $result = $Sellers->getSellerListingDetails($id, $type);
            $data = new stdClass();
            if (count($result) > 0) {
                $data->code = 200;
                $data->message = "Seller Individual Listing Details Found";
                $data->data = $result;
                return response()->json($data);
            } else {
                $data->code = 500;
                $data->message = "Seller Individual Listing Details Not Found";
                $data->data = $result;
                return response()->json($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }



    /**
     * @SWG\Post(
     *      path="/api/create-sellers",
     *      operationId="createSellers",
     *      tags={"create-sellers"},
     *      summary="Create sellers",
     *      description="Create sellers",
     *      @SWG\Parameter(
     *          name="createSellers",
     *          description="createSellers",
     *          required=true,
     *          type="string",
     *          in="body",
     *          @SWG\Schema(
     *              type="object",
     *              example={"type": "Dealer","name": "DealerTest","address": "swagger","phone" : "987654321","email": "john@example.com","website" : "ohn@example.com"},
     *          ),
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Sellers Created Successfully"
     *       ),
     *      @SWG\Response(response=500, description="Sellers Not Created"),
     * )
     *
     * Create sellers
     *
     */
    public function createSellers(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $Sellers = new Sellers();
                $Sellers->type = $request->input('type');
                $Sellers->name = $request->input('name');
                $Sellers->address = $request->input('address');
                $Sellers->phone = $request->input('phone');
                $Sellers->email = $request->input('email');
                $Sellers->website = $request->input('website');
                $Sellers->save();
                $data = new stdClass();
                if ($Sellers) {
                    $data->code = 200;
                    $data->message = "Sellers Created Successfully";
                    $data->data = $Sellers;
                    return response()->json($data);
                } else {
                    $data->code = 500;
                    $data->message = "Sellers Not Created";
                    $data->data = $Sellers;
                    return response()->json($data);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @SWG\Post(
     *      path="/api/create-sellers-listings",
     *      operationId="createSellersListings",
     *      tags={"create-sellers-listings"},
     *      summary="Create sellers listings",
     *      description="Create sellers listings",
     *      @SWG\Parameter(
     *          name="seller_listings",
     *          description="seller_listings",
     *          required=true,
     *          type="string",
     *          in="body",
     *          @SWG\Schema(
     *              type="object",
     *              example={"seller_id": "1","listing_id": "2","selling_price": "2131432"},
     *          ),
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="Seller's Listings Created Successfully"
     *       ),
     *      @SWG\Response(response=500, description="Seller's Listings Not Created"),
     * )
     *
     *
     * Create sellers listings
     *
     */
    public function createSellersListings(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $Sellers_Listings = new Sellers_Listings();
                $Sellers_Listings->seller_id = $request->input('seller_id');
                $Sellers_Listings->listing_id = $request->input('listing_id');
                $Sellers_Listings->selling_price = $request->input('selling_price');
                $Sellers_Listings->save();
                $data = new stdClass();
                if ($Sellers_Listings) {
                    $data->code = 200;
                    $data->message = "Seller's Listings Created Successfully";
                    $data->data = $Sellers_Listings;
                    return response()->json($data);
                } else {
                    $data->code = 500;
                    $data->message = "Seller's Listings Not Created";
                    $data->data = $Sellers_Listings;
                    return response()->json($data);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
