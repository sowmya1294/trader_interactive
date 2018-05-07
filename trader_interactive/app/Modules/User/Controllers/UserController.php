<?php

namespace App\Modules\User\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Modules\Admin\Models\Listings;
use App\Modules\Admin\Models\Sellers;
use Illuminate\Support\Facades\Mail;

/**
 * Class UserController
 * @package App\Modules\User\Controllers
 */
class UserController extends Controller
{
    /** show the details on index
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function index(Request $request)
    {
        try {
            $User = new User();
            if ($request->isMethod('post')) {
                $email = $request->input('email');
                $password = Hash::make($request->input('password')); //password is secret/12345
                $isAdmin=0;
                $checkUserDetails = $User->checkUserDetails($email, $password,$isAdmin);
                if ($checkUserDetails) {
                    $getUserDetails = $User->getUserDetails();
                    $session = $request->session()->put('user', $getUserDetails);
                    return redirect('/listings');
                } else {
                    return view("User::index");
                }
            } else {
                return view("User::index");
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**  enquiry
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function enquiry(Request $request, $id)
    {
        try {
            if ($request->session()->has('user')) {
                if ($request->isMethod('post')) {
                    $Sellers = new Sellers();
                    $getSellerDetails = $Sellers->getSellerDetails($id);

                    $msg = $request->input('msg');// the message
                    $msg = wordwrap($msg, 250);// use wordwrap() if lines are longer than 70 characters
                    mail("sowmya15227@gmail.com", "My subject", $msg);// send email

                    return view("User::enquiry", ['SellerDetails' => $getSellerDetails[0]]);
                } else {
                    $Sellers = new Sellers();
                    $getSellerDetails = $Sellers->getSellerDetails($id);
                    return view("User::enquiry", ['SellerDetails' => $getSellerDetails[0]]);
                }
            } else {
                return redirect('/');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**send mail
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function contact(Request $request)
    {
        try {
            if ($request->session()->has('user')) {
                if ($request->isMethod('post')) {
                    $msg = $request->input('msg');// the message
                    $data = array('name' => "Sir/Mam", "body" => "$msg");
                    $send = Mail::send('User::contact', $data, function ($message) {
                        $message->to('sowmya15227@gmail.com')
                            ->subject('Enquiry Regarding Listings');
                        $message->from('sowmya.prasad@dreamorbit.com');

                    });
                    return redirect("/listings");
                }
            } else {
                return redirect('/');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /** show listings
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function listings(Request $request)
    {
        try {
            if ($request->session()->has('user')) {
                if ($request->isMethod('post')) {
                    $make = $request->input('make');
                    $model = $request->input('model');
                    $min_price = $request->input('min_price');
                    $max_price = $request->input('max_price');
                    $Listings = new Listings();
                    $getUserListings = $Listings->getUserListings($make, $model, $min_price, $max_price);
                    return view("User::listings", ['Listings' => $getUserListings]);
                }
                return view("User::listings");
            } else {
                return redirect('/');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /** individual listing details
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|string
     */
    public function listingDetails(Request $request, $id)
    {
        try {
            if ($request->session()->has('user')) {
                $Listings = new Listings();
                $getListingDetails = $Listings->getUserListingDetails($id);
                $getReviewDetails = $Listings->getUserReviewDetails($id);
                return view("User::listing-details", ['ListingDetails' => $getListingDetails, 'ReviewDetails' => $getReviewDetails]);
            } else {
                return redirect('/');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**? logout user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function logout(Request $request)
    {
        try {
            if ($request->session()->has('user')) {
                $request->session()->forget('user');
                return redirect('/');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
