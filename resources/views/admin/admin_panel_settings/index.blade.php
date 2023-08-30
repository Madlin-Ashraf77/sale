@extends('layouts.admin')

@section('title')
General Setting
@endsection

@section('contentheader')
Setting
@endsection


@section('contentheaderlink')
<a href="{{route('admin.adminPanelSetting.index')}}">Setting</a>
@endsection


@section('contentheaderactive')
Show
@endsection




@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title card_title_center">General Setting Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            @if (@isset($data) && !@empty($data))
            <table id="example2" class="table table-bordered table-hover">
                
                <tr> 
                    <td  class="width30" style="font-weight: bold;">Company Name</td>
                    <td>{{$data['system_name']}}</td>
               </tr>


                <tr> 
                    <td  class="width30" style="font-weight: bold;">Company Code</td>
                    <td>{{$data['com_code']}}</td>
            
               </tr>

            <tr> 
                    <td  class="width30" style="font-weight: bold;">Company Status</td>
                    <td>
                        @if ($data['active']==1) Active @else Not active @endif</td>
            
            </tr>


            <tr> 
                    <td  class="width30" style="font-weight: bold;">Company Address</td>
                    <td>{{$data['address']}}</td>
            
            </tr>


            <tr> 
                    <td  class="width30" style="font-weight: bold;">Company Phone</td>
                    <td>{{$data['phone']}}</td>
            
            </tr>


            <tr> 
                    <td  class="width30" style="font-weight: bold;">On-screen alert message for the company</td>
                    <td>{{$data['general_alert']}}</td>
            
            </tr>



            <tr> 
                    <td  class="width30" style="font-weight: bold;">Company Logo</td>
                    <td>
                        <div class="image">
                           <img class="custom_img" style="width: 100px;" src="{{asset('assets/admin/uploads').'/'.$data['photo']}}" alt="Company Logo">
                        </div>
                    </td>
            
            </tr>

            

            <tr> 
                    <td  class="width30" style="font-weight: bold;">The date of the last update</td>
                    <td>

                    @if($data['updated_by']>0 and $data['updated_by']!=null)
                         
                    @php
                    $dt=new DateTime($data['updated_at']);
                    $date=$dt->format("y-m-d");
                    $time=$dt->format("h:i"); 
                    $newDateTime=date("A",strtotime($time));
                    $newDateTimeType=(($newDateTime=='AM')?'Morning/':'Evening/');
                    @endphp

                     
                    {{$date}}
                    /
                    {{$time}}
                    /
                    {{$newDateTimeType}}
                    By 
                    {{$data['updated_by_admin']}}
                    



                     @else
                     there is no update

                    @endif


                  <a href="{{route('admin.adminPanelSetting.edit')}}" class="btn btn-sm btn-success"> Edit</a>


                    </td>
            
                 </tr>

            
              </table>
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



 