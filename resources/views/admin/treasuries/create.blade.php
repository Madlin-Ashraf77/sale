@extends('layouts.admin')

@section('title')
Add new Treasury
@endsection

@section('contentheader')
Treasuries
@endsection


@section('contentheaderlink')
<a href="{{route('admin.treasuries.index')}}">Treasuries</a>
@endsection


@section('contentheaderactive')
Add
@endsection




@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title card_title_center">Add new Treasury</h3>
            </div>


            <!-- /.card-header -->
            <div class="card-body">
            

<form action="{{route('admin.treasuries.store')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label>Treasury Name</label>
<input name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Enter Company Name" oninvalid="setCustomValidity('please enter a company name')" onchange="try{setCustomValidity('')}catch(e){} " required>
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror
</div>




<div class="form-group">
<label> ? Is master </label>
<select name="is_master" id="is_master" class="form-control"> 
   <option value="">choose the type</option>
   <option @if(old('is_master')==1) selected="selected"  @endif value="1">master</option>
   <option @if(old('is_master')==0) selected="selected"  @endif value="0">sup</option>

</select>

@error('is_master')
<span class="text-danger">{{$message}}</span>
@enderror
</div>



<div class="form-group">
<label>The last cash receipt number of this safe</label>
<input name="last_isal_exhcange" id="last_isal_exhcange" class="form-control" value="{{old('nalast_isal_exhcangeme')}}" placeholder="Enter value" oninvalid="setCustomValidity('please enter a company name')" onchange="try{setCustomValidity('')}catch(e){} " required>
@error('last_isal_exhcange')
<span class="text-danger">{{$message}}</span>
@enderror
</div>


<div class="form-group">
<label>The last cash collect number of this safe</label>
<input name="last_isal_collect" id="last_isal_collect" class="form-control" value="{{old('last_isal_collect')}}" placeholder="Enter value" oninvalid="setCustomValidity('please enter a company name')" onchange="try{setCustomValidity('')}catch(e){} " required>
@error('last_isal_collect')
<span class="text-danger">{{$message}}</span>
@enderror
</div>


<div class="form-group">
<label>Activation Status</label>
<select name="active" id="active" class="form-control"> 
   <option value="">choose status</option>
   <option selected @if(old('active')==1) selected="selected"  @endif value="1">active</option>
   <option @if(old('active')==0) selected="selected"  @endif value="0">not active</option>

</select>

@error('is_master')
<span class="text-danger">{{$message}}</span>
@enderror
</div>


</div>



<div class="form-group text-center">
        <button type="submit" class="btn btn-primary btn-sm">Save modifications</button>
      <a href="{{route('admin.treasuries.index')}}" class="btn btn-sm btn-danger">cancel</a>
</div>





</form>
                
              
            


             
            </div>
          </div>
          </div>
          </div>


@endsection



 