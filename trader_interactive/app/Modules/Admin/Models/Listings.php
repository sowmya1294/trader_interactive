<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Listings
 * @package App\Modules\Admin\Models
 */
class Listings extends Model
{

    protected $table = "listings";

    /**
     * Get listings
     * @return int|string
     */
    public function getListings()
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
     * get listing details
     * @param $id
     * @return int|string
     */

    public function getListingDetails($id)
    {
        try {
            $result = DB::table($this->table)
                ->where('id', $id)
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
     * get user listings
     *
     * @param $make
     * @param $model
     * @param $min_price
     * @param $max_price
     * @return int|string
     */
    public function getUserListings($make, $model, $min_price, $max_price)
    {
        try {
            $result = DB::table($this->table)
                ->where('make', $make)
                ->where('model', 'LIKE', "%{$model}%")
                ->where('price', '>=', $min_price)
                ->where('price', '<=', $max_price)
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
     * Get user listings
     *
     * @param $id
     * @return int|string
     */
    public function getUserListingDetails($id)
    {
        try {
            $result = DB::table('sellers_listings')
                ->join('sellers', 'sellers_listings.seller_id', '=', 'sellers.id')
                ->join('listings', 'sellers_listings.listing_id', '=', 'listings.id')
                ->where('listing_id', $id)
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
     * Get user review details
     *
     * @param $id
     * @return int|string
     *
     */
    public function getUserReviewDetails($id)
    {
        try {
            $result = DB::table('reviews')
                ->join('sellers', 'reviews.seller_id', '=', 'sellers.id')
                ->where('seller_id', $id)
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
