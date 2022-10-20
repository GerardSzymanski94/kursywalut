<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Kursy wymiany walut</span>
        @if(session('success'))
            <span style="color: green">Udało się</span>
        @elseif(session('error'))
            <span style="color: red">Coś poszło nie tak</span>
        @endif
        <a href="{{ route('currency.updateExchangeRates') }}" class="btn-sm btn-primary">Aktualizuj kursy wymiany
            walut</a>
    </nav>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Kod</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Kurs</th>
        </tr>
        </thead>
        <tbody>
        @foreach($currencies as $currency)
            <tr>
                <th scope="row">{{ $currency->currency_code }}</th>
                <td>{{ $currency->name }}</td>
                <td>{{ $currency->exchange_rate }}</td>
            </tr>

        @endforeach

        </tbody>
    </table>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
