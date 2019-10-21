<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\HostRecommended;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function recommendHost(){
        try {
            (new HostRecommended(request()->all()));

            return response(['success' => true], 200);

        }catch (\Exception $e) {
            return response(['success' => false], 500);
        }
    }
    public function contact(){
        try {
           (new Contact(request()->all()));

            return response(['success' => true], 200);

        }catch (\Exception $e) {
            return response(['success' => false], 500);
        }
    }
}
