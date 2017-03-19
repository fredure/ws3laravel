<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\View;
use App\MasterClass;
use App\Ordered;
use Auth;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'view']]);
    }

    // GET
    public function index()
    {
        $views = View::all();

        if(Auth::check()){
            $ordereds = Auth::user()->ordereds;
            return view('index', ['views' => $views, 'ordereds' => $ordereds] );
        }else
        	return view('index', ['views' => $views]);
    }

    // GET
    public function view($id){
        $views = View::all();
        $view = View::find($id);

        return view('view', ['views' => $views, 'view' => $view] );
    }

    // GET
    public function order($id){
        $masterClass = MasterClass::find($id);
        $count = count($masterClass->ordereds);

        return view('order', ['masterClass' => $masterClass, 'count' => $count]);
    }

    // POST
    public function ok(){
        $id = Request::input('id');

        $masterClass = MasterClass::find($id);

        Ordered::create([
            'user_id' => Auth::user()->id,
            'master_class_id' => $id
        ]);

        return redirect()->route('home.view', $masterClass->view->id);
    }

    // POST
    public function cabinet(){
        $views = View::all();
        $user = Auth::user();

        return view('cabinet', ['user' => $user, 'views' => $views]);
    }

    // GET
    public function add(){
        $views = View::all();

        $times = array(
            '9:00-11:00',
            '11:00-13:00',
            '13:00-15:00',
            '15:00-17:00',
        );

        $thead = [];
        $month = date('m');
        for ($i = 1; $i < 8; $i++){
            $thead[] = date('d', strtotime('+'.$i.' day')).'.'.$month;
        }

        $data = [];

        foreach ($times as $key => $time) {

            $date = new \DateTime();
            $tm = explode(':',$time)[0];
            $date->setTime($tm, 0);

            $data[$time] = [];

            for ($i = 1; $i < 8; $i++){

                $date->modify('+1 day');
                $datetime = $date->format('Y-m-d H:i:s');
                $data[$time][$datetime] = null;
                $masterClasses = MasterClass::where('datetime', '=', $datetime)->get();
                if(empty($data[$time][$datetime]) && $masterClasses->toArray())
                    $data[$time][$datetime] = $masterClasses;
            }
        }

        return view('add', [
            'times' => $times,
            'thead' => $thead,
            'views' => $views,
            'data' => $data
        ]);
    }

    // POST
    public function addPost(){

        $data = Request::all();

        MasterClass::create([
            'view_id' => $data['view'],
            'user_id' => Auth::user()->id,
            'name' => $data['name'],
            'description' => $data['description'],
            'datetime' => $data['datetime'],
            'humans' => $data['humans'],
            'price' => $data['price']
        ]);

        return redirect()->route('home.cabinet');
    }

    // GET
    public function edit($id){
        $masterClass = MasterClass::find($id);
        return view('edit', ['masterClass' => $masterClass]);
    }

    // POST
    public function editPost(){
        $id = Request::input('id');
        $price = Request::input('price');
        $description = Request::input('description');

        $masterClass = MasterClass::find($id);

        $masterClass->price = $price;
        $masterClass->description = $description;

        $masterClass->save();

        return redirect()->back();
    }


    // POST
    public function cancel(){
        $id = Request::input('id');
        Ordered::destroy($id);

        return redirect()->back();
    }
}
