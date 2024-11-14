@forelse ($customer->addresses as $address)
    <div>
        <div>{{$address->addressLine1}}</div>
        <div>{{$address->addressLine2}}</div>
        <div>{{$address->city}}, {{$address->postalCode}}, {{ $address->state }} , {{$address->country}}</div>
    </div>
@empty
    <div>Aucune adresse</div>
@endforelse
<form action="/customers/{{$customer->id}}/addresses/create" method="post">
    @csrf
    <!-- Je vous laisse écrire l'interieur du formulaire -->
</form>