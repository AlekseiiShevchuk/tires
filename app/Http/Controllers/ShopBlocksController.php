<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShopBlocksController extends Controller
{
    public function index()
    {
        if (! Gate::allows('shop_block_access')) {
            return abort(401);
        }
        return view('shop_blocks.index');
    }
}
