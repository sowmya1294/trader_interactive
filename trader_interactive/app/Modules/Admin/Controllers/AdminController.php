<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Listings;
use App\Modules\Admin\Models\Sellers;
use App\Modules\Admin\Models\Users;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    /**
     * Return dashboards details
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function dashboard(Request $request)
    {
        try {
            if ($request->session()->has('admin')) {
                $Listings = new Listings();
                $Sellers = new Sellers();
                $Users = new Users();
                $getListings = $Listings->getListings();
                $getSellers = $Sellers->getSellers();
                $getUsers = $Users->getUsers();
                return view("Admin::dashboard", ['Listings' => $getListings, 'Sellers' => $getSellers, 'Users' => $getUsers]);
            } else {
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * get details of Admin
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function index(Request $request)
    {
        try {
            $Users = new Users();
            if ($request->isMethod('post')) {
                $email = $request->input('email');
                $password = Hash::make($request->input('password')); //password is secret
                $isAdmin=1;
                $checkAdminDetails = $Users->checkAdminDetails($email, $password,$isAdmin);
                if ($checkAdminDetails) {
                    $getAdminDetails = $Users->getAdmin($email);
                    $session = $request->session()->put('admin', $getAdminDetails);
                    return redirect('/admin/dashboard');
                } else {
                    return redirect('/admin/dashboard');
                }
            } else {
                return view("Admin::index");
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Returns listings
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */

    public function listings(Request $request)
    {
        try {
            if ($request->session()->has('admin')) {
                $Listings = new Listings();
                $getListings = $Listings->getListings();
                return view("Admin::listings", ['Listings' => $getListings]);
            } else {
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Return listings details
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     *
     */
    public function listingDetails(Request $request, $id)
    {
        try {
            if ($request->session()->has('admin')) {
                $Listings = new Listings();
                $getListingDetails = $Listings->getListingDetails($id);
                return view("Admin::listing-details", ['ListingDetails' => $getListingDetails[0]]);
            } else {
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get seller car details
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */

    public function sellerCarDetails(Request $request, $id)
    {
        try {
            if ($request->session()->has('admin')) {
                $Sellers = new Sellers();
                $type = "Car";
                $getSellerDetails = $Sellers->getSellerDetails($id);
                $getSellerListingDetails = $Sellers->getSellerListingDetails($id, $type);
                return view("Admin::seller-car-details", ['SellerDetails' => $getSellerDetails[0], 'SellerListingDetails' => $getSellerListingDetails]);
            } else {
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Returns seller details
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function sellerDetails(Request $request, $id)
    {
        try {
            if ($request->session()->has('admin')) {
                $Sellers = new Sellers();
                $type1 = "Truck";
                $type2 = "Car";
                $type3 = "MotorCycle";
                $type4 = "RV";
                $getSellerDetails = $Sellers->getSellerDetails($id);
                $getSellerListingDetails1 = $Sellers->getSellerListingDetails($id, $type1);
                $getSellerListingDetails2 = $Sellers->getSellerListingDetails($id, $type2);
                $getSellerListingDetails3 = $Sellers->getSellerListingDetails($id, $type3);
                $getSellerListingDetails4 = $Sellers->getSellerListingDetails($id, $type4);
                return view("Admin::seller-details", ['SellerDetails' => $getSellerDetails[0], 'SellerListingDetails1' => $getSellerListingDetails1, 'SellerListingDetails2' => $getSellerListingDetails2, 'SellerListingDetails3' => $getSellerListingDetails3, 'SellerListingDetails4' => $getSellerListingDetails4]);
            } else {
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Get seller motor cycle details
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function sellerMotorCycleDetails(Request $request, $id)
    {
        try {
            if ($request->session()->has('admin')) {
                $Sellers = new Sellers();
                $type = "MotorCycle";
                $getSellerDetails = $Sellers->getSellerDetails($id);
                $getSellerListingDetails = $Sellers->getSellerListingDetails($id, $type);
                return view("Admin::seller-motorcycle-details", ['SellerDetails' => $getSellerDetails[0], 'SellerListingDetails' => $getSellerListingDetails]);
            } else {
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Get seller RV details
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function sellerRvDetails(Request $request, $id)
    {
        try {
            if ($request->session()->has('admin')) {
                $Sellers = new Sellers();
                $type = "RV";
                $getSellerDetails = $Sellers->getSellerDetails($id);
                $getSellerListingDetails = $Sellers->getSellerListingDetails($id, $type);
                return view("Admin::seller-rv-details", ['SellerDetails' => $getSellerDetails[0], 'SellerListingDetails' => $getSellerListingDetails]);
            } else {
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Get seller truck details
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function sellerTruckDetails(Request $request, $id)
    {
        try {
            if ($request->session()->has('admin')) {
                $Sellers = new Sellers();
                $type = "Truck";
                $getSellerDetails = $Sellers->getSellerDetails($id);
                $getSellerListingDetails = $Sellers->getSellerListingDetails($id, $type);
                return view("Admin::seller-truck-details", ['SellerDetails' => $getSellerDetails[0], 'SellerListingDetails' => $getSellerListingDetails]);
            } else {
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get sellers
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function sellers(Request $request)
    {
        try {
            if ($request->session()->has('admin')) {
                $Sellers = new Sellers();
                $getSellers = $Sellers->getSellers();
                return view("Admin::sellers", ['Sellers' => $getSellers]);
            } else {
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Get users
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function users(Request $request)
    {
        try {
            if ($request->session()->has('admin')) {
                $Users = new Users();
                $getUsers = $Users->getUsers();
                return view("Admin::users", ['Users' => $getUsers]);
            } else {
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Logs out a user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     *
     */
    public function logout(Request $request)
    {
        try {
            if ($request->session()->has('admin')) {
                $request->session()->forget('admin');
                return redirect('/admin');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
