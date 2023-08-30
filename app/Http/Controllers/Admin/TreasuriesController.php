<?php

namespace App\Http\Controllers\Admin;

use App\Models\Treasuries;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\TreasuriesRequest;

use Illuminate\Http\Request;


class TreasuriesController extends Controller
{
    public function index()
    {
        
        
        $data=Treasuries::select()->orderby('id','DESC')->paginate(PAGINATION_COUNT);
        if(!empty($data))
        foreach($data as $info){

            $info->added_by_admin=Admin::where('id',$info->added_by)->value('name');
            if(!empty($data)){

             if($info->updated_by>0 and $info->updated_by!=null)
             {
                $info->updated_by_admin=Admin::where('id',$info->updated_by)->value('name');
             }
            }


        }

      


      
        return view('admin.treasuries.index',['data'=>$data]);


    }

    public function create()
    {
        return view('admin.treasuries.create');
    }


    public function store(TreasuriesRequest $request)
    {
        try {
           $com_code=auth()->user()->com_code;
           $checkExists=Treasuries::where(['name'=>$request->name,'com_code'=>$com_code])->first();
           if($checkExists==null){
               if($request->is_master==1){
                $checkExists_isMaster=Treasuries::where(['is_master'=>1,'com_code'=>$com_code])->first();
                if($checkExists_isMaster!=null){
                    return redirect()->route('admin.treasuries.create')->with(['error' => 'Sorry the master treasury is exist']);
                }
               }

             $data['name']=$request->name;
             $data['is_master']=$request->is_master;
             $data['last_isal_exhcange']=$request->last_isal_exhcange;
             $data['last_isal_collect']=$request->last_isal_collect;
             $data['active']=$request->active;
             $data['created_at']=date("Y-m-d H:i:s");
             $data['added_by']=auth()->user()->id;
             $data['com_code']=$com_code;
             $data['date']=date("Y-m-d");
             Treasuries::create($data);
             return redirect()->route('admin.treasuries.index')->with(['success' => 'the data is added successfully']);
           }else{

            return redirect()->route('admin.treasuries.create')->with(['error' => 'Sorry the treasury is exist']);
           }


        }catch(\Exception $ex){
            return redirect()->route('admin.treasuries.create')->with(['error' => 'Sorry' . $ex->getMessage()]);
        }

    
    }


    public function ajax_search(Request $request)
    {
       if($request->ajax()){
        $search_by_text=$request->search_by_text;
        $data=Treasuries::where('name','LIKE',"%{$search_by_text}%")->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('admin.treasuries.ajax_search',['data'=>$data]);

       }

    
    }




}
