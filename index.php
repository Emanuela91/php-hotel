<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <?php
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    // filtro per il parcheggio
    $filterParking = $_GET["parking"] ?? false;
    // filtro voto 
    $filterVote = $_GET["vote"] ?? 0;
    ?>
</head>

<body>
    <!-- input per il filtro parcheggio -->
    <form>
        <label for="parking">Parking</label>
        <input type="checkbox" name="parking" <?php
        if ($filterParking) {

            echo "checked";
        }
        ?>>
        <br>
        <!-- input per il filtro voto -->
        <label for="vote">Vote</label>
        <input type="number" name="vote" <?php
        if ($filterVote != 0) {

            echo "value='" . $filterVote . "'";
        }
        ?>>
        <br>
        <input type="submit" value="FILTER">
    </form>

    <table class="table text-center">
        <!-- parte header tabella -->
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Parking</th>
                <th scope="col">Vote</th>
                <th scope="col">Distance to Center</th>
            </tr>
        </thead>
        <!-- ciclo per le voci dell'array -->
        <?php
        foreach ($hotels as $hotel) {

            $name = $hotel['name'];
            $description = $hotel['description'];
            $parking = $hotel['parking'];
            $vote = $hotel['vote'];
            $distance_to_center = $hotel['distance_to_center'];

            // filtro per il parcheggio e filtro voto
            if ($vote >= $filterVote && (!$filterParking || ($filterParking && $parking))) {
                echo "<tr>"
                    . "<td>" . $name . "</td>"
                    . "<td>" . $description . "</td>"
                    // se ?? presente parcheggio o no per il filtro 
                    . "<td>" . ($parking ? "YES" : "NO") . "</td>"
                    . "<td>" . $vote . "</td>"
                    . "<td>" . $distance_to_center . " Km</td>"
                    . "</tr>";
            }
        }
        ?>

    </table>

</body>

</html>