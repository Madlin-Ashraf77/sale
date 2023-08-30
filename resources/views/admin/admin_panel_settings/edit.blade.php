@extends('layouts.admin')

@section('title')
Edit General Setting
@endsection

@section('contentheader')
Edit
@endsection


@section('contentheaderlink')
<a href="{{route('admin.adminPanelSetting.index')}}">Setting</a>
@endsection


@section('contentheaderactive')
Edit
@endsection




@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title card_title_center">Edit General Setting Data</h3>
             
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            @if (@isset($data) && !@empty($data))
<form action="{{route('admin.adminPanelSetting.update')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label>Company Name</label>
<input name="system_name" id="system_name" class="form-control" value="{{$data['system_name']}}" placeholder="Enter Company Name" oninvalid="setCustomValidity('please enter a company name')" onchange="try{setCustomValidity('')}catch(e){} " required>
@error('system_name')
<span class="text-danger">{{$message}}</span>
@enderror
</div>



<div class="form-group">
<label>Company Address</label>
<input name="address" id="address" class="form-control" value="{{$data['address']}}" placeholder="Enter Company Name" oninvalid="setCustomValidity('please enter a company name')" onchange="try{setCustomValidity('')}catch(e){} " required>
@error('address')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

<div class="form-group">
<label>Company Phone</label>
<input name="phone" id="phone" class="form-control" value="{{$data['phone']}}" placeholder="Enter Company Name" oninvalid="setCustomValidity('please enter a company name')" onchange="try{setCustomValidity('')}catch(e){} " required>
@error('phone')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

<div class="form-group">
<label>An alert message on the screen</label>
<input name="general_alert" id="general_alert" class="form-control" value="{{$data['general_alert']}}" placeholder="Enter Company Name" oninvalid="setCustomValidity('please enter a company name')" onchange="try{setCustomValidity('')}catch(e){} " >
</div>



<div class="form-group">
<label>Company Logo</label>
<div class="image">
 
<img class="custom_img" style="width: 200px;" src="{{asset('assets/admin/uploads').'/'.$data['photo']}}" alt="Company Logo">
<button type="button" class="btn btn-sm btn-success" id="update_image"> Change photo</button>
<button type="button" class="btn btn-sm btn-danger" style="display:none;" id="cancel_update_image">Cancel updating</button>

</div>

<div  id="oldimage">

</div>

</div>



<div class="form-group text-center">
        <button type="submit" class="btn btn-primary btn-sm">Save modifications</button>

</div>



</form>
                
              
            @else
            <div class="alert alert_danger"> 
                sorry! there is no data to display
            </div>
            @endif


             
            </div>
          </div>
          </div>
          </div>


@endsection



 