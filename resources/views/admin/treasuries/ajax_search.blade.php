
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

<div class="col-md-12" id="ajax_pagination_in_search">
{{$data->links()}}
</div>


            @else
            <div class="alert alert_danger"> 
                sorry! there is no data to display
            </div>
            @endif

           


             
            