<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\AuctionCategory;
use App\AuctionDetail;
use App\AuctionImage;
use App\AuctionPlace;
use App\Comment;
use DB;

class AuctionDetailsViewController extends Controller
{
    public function index($id) {
        
        //$auctionTitle = AuctionDetail::find($id);
        
        $comments = Comment::where('auction_id', $id)->get();
        
        $auctionDetails = DB::table('all_auction_details_views')
                            ->select('all_auction_details_views.*')
                            ->where('all_auction_details_views.id', $id)
                            ->first();
        return view('frontEnd.auctionDetailsView.auctionDetailsView',['auctionDetails' => $auctionDetails, 'comments' => $comments]);
    }
}