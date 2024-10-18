<a href="{{ route('shops.create') }}"> Create New shop</a>

<table>
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Category ID</th>
    <th>Action</th>
  </tr>
  @foreach ($shop as $shops)
  <tr>
    <td>{{ $shop->name }}</td>
    <td>{{ $shop->description }}</td>
    <td>{{ $shop->low_price }}</td>
    <td>{{ $shop->category_id }}</td>
    <td>
      <a href="{{ route('shop.show',$shop->id) }}">Show</a>
      <a href="{{ route('shop.edit',$shop->id) }}">Edit</a>
    </td>
  </tr>
  @endforeach
</table>