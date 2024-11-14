<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
<body>
<form action="/orders/create" method="post" class="p-4 border rounded shadow">
    @csrf
    <div class="mb-3">
        <label for="orderNumber" class="form-label">Numéro de commande</label>
        <input type="text" name="orderNumber" id="orderNumber" class="form-control">
    </div>

    <div class="mb-3">
        <label for="orderDate" class="form-label">Date de l'order</label>
        <input type="date" name="orderDate" id="orderDate" class="form-control">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            <option value="Shipped">Shipped</option>
            <option value="Resolved">Resolved</option>
            <option value="Cancelled">Cancelled</option>
            <option value="On Hold">On Hold</option>
            <option value="Disputed">Disputed</option>
            <option value="In Process">In Process</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="comments" class="form-label">Commentaires</label>
        <textarea name="comments" id="comments" class="form-control" rows="5"></textarea>
    </div>

    <div class="mb-3">
        <label for="customerNumber" class="form-label">Numéro de client</label>
        <select name="customerNumber" id="customerNumber" class="form-select">
            @foreach($customers as $customer)
                <option value="{{$customer->customerNumber}}">{{$customer->contactLastName}} {{$customer->contactFirstName}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="checkNumber" class="form-label">Numéro de paiement</label>
        <input type="text" name="checkNumber" id="checkNumber" class="form-control">
    </div>

    <div class="mb-3">
        <label for="paymentDate" class="form-label">Date du paiement</label>
        <input type="date" name="paymentDate" id="paymentDate" class="form-control">
    </div>

    <div class="mb-3">
        <label for="amount" class="form-label">Montant</label>
        <input type="number" name="amount" id="amount" class="form-control">
    </div>

    <div class="text-end">
        <input type="submit" value="Créer la commande" class="btn btn-primary">
    </div>
</form>
</body>
</html>