<div class="table-responsive">
    <table class="table table-bordered" > 
        <tr>
            <th>Product Name</th>
            <td>{{$data->product_name}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>Rp.{{$data->description}}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{$data->price}}</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td>{{$data->stock}}</td>
        </tr>
        <tr>
            <th>Weight</th>
            <td>{{$data->weight}}</td>
        </tr>
        {{-- <tr>
            <th>Foto Kamar</th>
            <td> <img width="100" src="{{asset($data->foto_kamar)}}"/> </td>
        </tr> --}}
    </table>
</div>