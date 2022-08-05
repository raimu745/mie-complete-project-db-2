
<table class="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
    @php
      $i=1;
    @endphp
    @foreach ($images as $item) 
    <tr>
    <td>{{$i++}}</td>
    
      <td><img src="{{asset('uploads/country/'.$item->image)}}" alt="" width="70" height="70"></td>
     <td><a href="{{url('admin/countrysingledelete',['id'=>encrypt($item->id)])}}" class="btn btn-danger">Delete</a></td> 
     
    </tr>
  @endforeach
  </tbody>
</table>

    