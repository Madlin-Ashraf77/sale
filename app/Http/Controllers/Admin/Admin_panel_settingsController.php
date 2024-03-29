<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin_panel_setting;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin_panel_settings_Request;
use Illuminate\Http\Request;

class Admin_panel_settingsController extends Controller
{
    public function index()
    {
       $data=Admin_panel_setting::where('com_code',auth()->user()->com_code)->first();

       if(!empty($data))
       {
        if($data['updated_by']>0 and $data['updated_by']!=null)
        {
           $data['updated_by_admin']=Admin::where('id',$data['updated_by'])->value('name');
        }
       }

       return view('admin.admin_panel_settings.index',['data'=>$data]);
    }
    public function edit()
    {
      $data=Admin_panel_setting::where('com_code',auth()->user()->com_code)->first();
      return view('admin.admin_panel_settings.edit',['data'=>$data]);
   
    }

public function update(Admin_panel_settings_Request $request)
{
   try{
      $admin_panel_setting=Admin_panel_setting::where('com_code',auth()->user()->com_code)->first();
      $admin_panel_setting->system_name=$request->system_name;
      $admin_panel_setting->address=$request->address;
      $admin_panel_setting->phone=$request->phone;
      $admin_panel_setting->general_alert=$request->general_alert;
      $admin_panel_setting->updated_by=auth()->user()->id;
      $admin_panel_setting->updated_at=date("Y-m-d H:i:s");

   if($request->has('photo')){
      $request->validate([
         'photo'=>'required|mimes:png,jpg,jpeg|max:2000',

      ]);
      $the_file_path=upload('assets/admin/uploads',$request->photo);
      $admin_panel_setting->photo=$the_file_path;
   }
   $admin_panel_setting->save();
   return redirect()->route('admin.adminPanelSetting.index')->with(['success' => 'the data has been updated successfully !']);
   }
   
   catch(\Exception $ex){
      return redirect()->route('admin.adminPanelSetting.index')->with(['error' => 'Sorry' . $ex->getMessage()]);
   }
}

}
