<?php

namespace App\Http\Controllers\Design;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexDesignController extends Controller
{
    public function setIndexPage(){

        $indexObj = new \stdClass;

        $indexObj->title = 'Freelancer - Start Bootstrap Theme';

        $indexObj->img[1] = "assets/img/portfolio/cake.png";
        $indexObj->img[2] = "assets/img/portfolio/cabin.png";
        $indexObj->img[3] = "assets/img/portfolio/circus.png";
        $indexObj->img[4] = "assets/img/portfolio/game.png";
        $indexObj->img[5] = "assets/img/portfolio/safe.png";
        $indexObj->img[6] = "assets/img/portfolio/submarine.png";
    
        return view('landing')->with(compact('indexObj'));
    }
}
