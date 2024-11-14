<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Address;
use Illuminate\Http\Request;

class CustomerControler extends Controller
{
    public function categories($id)
{
    $customer = Customer::findOrFail($id);
    return view('customer.categories', compact('customer'));
}
public function show($id)
{
    $customer = Customer::with(['orders', 'categories', 'orders.orderdetails', 'orders.orderdetails.product'])->findOrFail($id);
    return view('customer.show', compact('customer'));
}
function createAddressForm($id){
    return view("customers-create-address", ["customer" => Customer::find($id)]);
}

function createAddress(Request $request, $id){
    // Création de l'adresse
    $address = new Address();
    $address->addressLine1 = $request->input("addressLine1");
    $address->addressLine2 = $request->input("addressLine2");
    $address->city = $request->input("city");
    $address->state = $request->input("state");
    $address->postalCode = $request->input("postalCode");
    $address->country = $request->input("country");
    $address->save();

    // Ajout de l'adresse au client
    $customer = Customer::find($id);

    // La méthode attach permet d'ajouter une relation entre deux tables. Elle va ajouter une ligne dans la table de relation.
    $customer->addresses()->attach($address);
    
    // Redirection vers la page de détail du client
    return redirect("/customers/$id");
}

}
