<?php
function dataIP ($IP){
    $cesta = "http://ip-api.com/json/$IP";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$cesta);
    curl_setopt($ch, CURLOPT_FAILONERROR,1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

function datumSK(string $date): string
{
    $men = [
        'January', 'February', 'March', 'April', 'May',
        'June', 'July', 'August', 'September', 'October',
        'November', 'December'
    ];

    $msk = [
        'Januar', 'Februar', 'Marec', 'April', 'Maj',
        'Jun', 'Jul', 'August', 'September', 'Oktober',
        'November', 'December'
    ];

    $date = str_replace($men, $msk, $date);

    $den = [
        'Monday', 'Tuesday', 'Wednesday', 'Thursday',
        'Friday', 'Saturday', 'Sunday'
    ];

    $dsk = [
        'Pondelok', 'Utorok', 'Streda', 'Štvrtok',
        'Piatok', 'Sobota', 'Nedeľa'
    ];

    return str_replace($den, $dsk, $date);
}
