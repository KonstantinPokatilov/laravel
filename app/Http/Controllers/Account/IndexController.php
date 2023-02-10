<?php declare(strict_types=1);

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Events\LoginEvent;

class IndexController extends Controller
{
    public function __invoke(Request $request) : View
    {
        event(new LoginEvent(Auth::user()));
        return \view('account.index');
    }
}
