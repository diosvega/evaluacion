<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Session;

class ItemController extends Controller
{
    public function index(){

        $items = Item::orderBy('created_at','desc')->get();
        return view('item.item',['allItem'=>$items]);
    }

    public function ItemSave(Request $request){
        $this->validate($request,[
        'name' => 'required',
        'type' => 'required',
        'qty' => 'required'
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->type = $request->type;
        $item->qty = $request->qty;

        $item->save();
        return redirect('/item')->with('message','Item added successfully');

    }

    public function Edit(Request $request){

        $item = Item::find($request['id']);
//        echo $item;


        $html ='<form method="get" action="http://127.0.0.1:8000/item/updateItem">
          <div class="form-group">
            <label for="exampleInputEmail1">Name:</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name" value="'.$item->name.'">
            <input type="hidden" id="id" name="id" value="'.$item->_id.'">
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Sex:</label>
            <input type="text" class="form-control" id="type" name="type" aria-describedby="emailHelp" placeholder="Enter Type" value="'.$item->type.'">
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Age:</label>
            <input type="text" class="form-control" id="qty" name="qty" aria-describedby="emailHelp" placeholder="Enter Qty" value="'.$item->qty.'">
          </div>
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Save</button>
        </form>';

return $html;

    }

        public function ItemUpdate(Request $request){


            $item = Item::find($request->id);
            $item->name = $request->name;
            $item->type = $request->type;
            $item->qty = $request->qty;
    
            $item->save();
            return redirect('/item')->with('message','Item update successfully');
            
    
        }

        public function Delete(Request $request){


            $item = Item::find($request->id);    
            $item->delete();
            return redirect('/item')->with('message','Item delete successfully');
            
    
        }

    }
