<?php
 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

 
class AgendaController extends Controller
{
 
    public function index()
    {
    	//$info_agenda = DB::table('agenda');
        $info_agenda=DB::table('agenda')->get();
    	return view('publik.agenda', ['info_agenda' => $info_agenda]);
    }
 
}