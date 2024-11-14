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
<h2>Commande</h2>
<table border="2">
<thead>
    <tr>
        <th>orderNumber</th>
        <th>orderDate</th>
        <th>requiredDate</th>
        <th>shippedDate</th>
        <th>status</th>
        <th>comments</th>
        <th>customerNumber</th>
    </tr>
    
    <tr>
        <td>{{ $order->orderNumber }}</td>
        <td>{{ $order->orderDate }}</td>
        <td>{{ $order->requiredDate }}</td>
        <td>{{ $order->shippedDate }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ $order->comments }}</td>
        <td>{{ $order->customerNumber }}</td>
    </tr>
</table>

<h2>Client</h2>
<table border="2">
<thead>
    <tr>
        <th>customerNumber</th>
        <th>customerName</th>
        <th>contactLastName</th>
        <th>phone</th>
        <th>addressLine1</th>
        <th>city</th>
        <th>country</th>
    </tr>
<thead>
    <tr>
        <td>{{ $order->customer->customerNumber }}</td>
        <td>{{ $order->customer->customerName }}</td>
        <td>{{ $order->customer->contactLastName }}</td>
        <td>{{ $order->customer->phone }}</td>
        <td>{{ $order->customer->addressLine1 }}</td>
        <td>{{ $order->customer->city }}</td>
        <td>{{ $order->customer->country }}</td>
    </tr>
</table>

<h3>Détail</h3>
<table border="2">
<thead>
    <tr>
        <th>orderNumber</th>
        <th>productCode</th>
        <th>quantityOrdered</th>
        <th>priceEach</th>
        <th>orderLineNumber</th>
    </tr>
    <thead>
    @foreach($order->orderdetails as $detail)
        <tr>
            <td>{{ $order->orderNumber }}</td>
            <td>{{ $detail-> productCode}}</td>
            <td>{{ $detail-> quantityOrdered}}</td>
            <td>{{ $detail-> priceEach}}</td>
            <td>{{ $detail-> orderLineNumber}}</td>
        </tr>
 @endforeach
</table>
</body>
</html>
