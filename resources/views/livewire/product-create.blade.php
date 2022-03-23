<div class="table-responsive">
    <form method="post" enctype="multipart/form-data" action="{{url('admin/')}}">
        @csrf
    <table class="table table-bordered" > 
        <tr>
            <th>Product Name</th>
            <td><input name="product-name" type="text" class="form-control"/> </td>
        </tr>
        <tr>
            <th>Product Category</th>
            <td>
                <select name="product-category" class="form-control">
                    <option value="0">Category</option>
                    @foreach($category as $tm)
                    <option value="{{$tm->id}}">{{$tm->category_name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <th>Price</span> </th>
            <td> <input name="price" type="text" class="form-control"></td> 
        </tr>
        <tr>
            <th>Stock</span> </th>
            <td> <input name="stock" type="text" class="form-control"></td> 
        </tr>
        <tr>
            <th>Weight</span> </th>
            <td> <input name="weight" type="text" class="form-control"></td> 
        </tr>
        <tr>
            <th>Description</th>
            <td><input name="desc" type="text" class="form-control"/> </td>
        </tr>
        <tr>
            <th>Product Picture</th>
            <td><input name="pict" type="file" class="form-control"/> </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" class="btn btn-primary" /> 
            </td>
        </tr>
    </table>
    </form>
</div>