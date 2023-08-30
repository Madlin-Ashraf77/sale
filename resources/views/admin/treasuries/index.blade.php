@extends('layouts.admin')

@section('title')
General Setting
@endsection

@section('contentheader')
Treasuries
@endsection


@section('contentheaderlink')
<a href="{{route('admin.treasuries.index')}}">Treasuries</a>
@endsection


@section('contentheaderactive')
Show
@endsection




@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title card_title_center">Treasuries Data</h3>
              
              <input type="hidden" id="token_search" value="{{csrf_token()}}">
              <input type="hidden" id="ajax_search_url" value="{{route('admin.treasuries.ajax_search')}}">


              <a href="{{route('admin.treasuries.create')}}" class="btn btn-sm btn-success">Add new</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="col-md-4">
              <input type="text" id="search_by_text" placeholder="search by company name " class="form-control">

            </div>
            <br>
           
            <div id="ajax_responce_searchDiv">
            @if (@isset($data) && !@empty($data))
            @php
            $i=1;
            @endphp
            <table id="example2" class="table table-bordered table-hover">
                <thead class="custom_thead">
                <th>number</th>
                <th>Treasury Name</th>
                <th>Is master?</th>
                
                <th>The last cash receipt</th>
                <th>The last collection receipt</th>
                <th>Activation Status</th>
                <th></th>
               

                </thead>
                <tbody>
                @foreach($data as $info)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$info->name}}</td>
                        <td>@if($info->is_master==1) Master @else Sub Treasury  @endif</td>
                        <td>{{$info->last_isal_exhcang}}</td>
                        <td>{{$info->last_isal_collect}}</td>
                        <td>@if($info->active==1) Active @else not active  @endif</td>
                       <th>
                        <button class="btn btn-sm btn-primary">Edit</button>
                        <button data-id="{{$info->id}}" class="btn btn-sm btn-info">more</button>
                       </th>
                     
                    </tr>
                    @php
                    $i++;
                    @endphp
                 @endforeach
            
                </tbody>
                 
              </table>
              </div>
<br>
{{$data->links()}}

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

@section('script')
<script src="{{asset('assets/admin/js/treasuries.js')}}"></script>
@endsection



 