<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PagesController extends Controller {

    public function getindex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout() {
        $first = 'Raymon';
        $last = 'Leidelmeijer';

        $fullname = $first . " " . $last;
        $email = 'info@sneakers.com';
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about')->withFullname($fullname)->withEmail($email);
    }

    public function getContact() {
        return view('pages.contact');
    }


}
