<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\HostRecommended;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function recommendHost(){
        try {
            Mail::to('klaus1993@live.com')->send(new HostRecommended(request()->all()));

            return response(['success' => true], 200);

        }catch (\Exception $e) {
            return response(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function contact(){
        try {
            $data = request()->only(['name','email', 'phone', 'message']);

            Mail::to('klaus1993@live.com')->send(new Contact($data));
            // Mail::to(request('mail'))->send(new Contact($data));

            return response(['success' => true], 200);

        }catch (\Exception $e) {
            dd($e->getMessage());
            return response(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
