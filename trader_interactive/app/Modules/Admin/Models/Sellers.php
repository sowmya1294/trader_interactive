<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Sellers
 * @package App\Modules\Admin\Models
 */
class Sellers extends Model
{

    protected $table = "sellers";

    /**
     * Get sellers
     * @return int|string
     */
    public function getSellers()
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
     * Get seller details
     *
     * @param $id
     * @return int|string
     */
    public function getSellerDetails($id)
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
     * get seller listing details
     * @param $id
     * @param $make
     * @return int|string
     */
    public function getSellerListingDetails($id, $make)
    {
        try {
            $result = DB::table('sellers_listings')
                ->join('sellers', 'sellers_listings.seller_id', '=', 'sellers.id')
                ->join('listings', 'sellers_listings.listing_id', '=', 'listings.id')
                ->where('sellers.id', $id)
                ->where('make', $make)
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
     * get individual seller details
     *
     * @param $id
     * @return int|string
     */
    public function getIndividualSellerDetails($id)
    {
        try {
            $result = DB::table('sellers_listings')
                ->join('sellers', 'sellers_listings.seller_id', '=', 'sellers.id')
                ->join('listings', 'sellers_listings.listing_id', '=', 'listings.id')
                ->where('sellers.id', $id)
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
