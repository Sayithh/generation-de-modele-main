<h1>Catégories du client {{ $customer->customerNumber }}</h1>

<ul>
    @foreach($customer->categories as $category)
        <li>{{ $category->name }} {{ $category->description }}</li>
    @endforeach
</ul>
