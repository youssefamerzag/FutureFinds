
<form action="{{ route('dashboard.storeProduct')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="product_title">
    <input type="text" name="product_description">
    <input type="text" name="product_price">
    <input type="file" name="product_image">
    <select name="category">
        <option value="1">Phones</option>
        <option value="2">Tables</option>
        <option value="3">Laptops</option>
        <option value="4">Constoles</option>
    </select>
    <input type="submit">
</form>