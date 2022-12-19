<html>
    <body>
        <h1>Richiesta ricevuta</h1>
        <h4>Richiesta per il ruole {{ $info['role'] }}</h4>
        <p>Ricevuta da {{ $info['email'] }}</p>
        <h4>Messaggio: </h4>
        <p>{{ $info['presentation'] }}</p>
    </body>
</html>
