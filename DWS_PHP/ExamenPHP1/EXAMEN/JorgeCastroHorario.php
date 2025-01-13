<?php

/**
 * @author Jorge Castro <jorgecastrot2005@gmail.com>
 */

$enca = ['Hora', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];

$horario = [
    '14:10' => ['DWEC', 'DWEC', '--', 'DWES', 'EIE'],
    '15:05' => ['DWEC', 'DWEC', 'DWEC', 'DWES', 'DWES'],
    '16:00' => ['DWES', 'DIW', 'DWEC', 'EIE', 'DWES'],
    '16:55' => ['P', 'A', 'T', 'I', 'O'],
    '17:15' => ['DWES', 'DIW', 'DWEC', 'DIW', 'DIW'],
    '18:10' => ['EIE', 'DWES', 'DAW', 'DIW', 'DIW'],
    '19:05' => ['DAW', 'DWES', 'DAW', 'DAW', '--'],
    '20:00' => ['DAW', '--', 'TUT', 'DAW', '--'],
];

printf("|%s", str_repeat('-', 89));
printf("|\n");
printf("| %-12s | %-12s | %-12s | %-13s | %-12s | %-12s |\n", $enca[0], $enca[1], $enca[2], $enca[3], $enca[4], $enca[5]);
printf("|%s", str_repeat('-', 89));
printf("|\n");

foreach ($horario as $hora => $clases) {
    printf("| %-12s | %-12s | %-12s | %-12s | %-12s | %-12s |\n", $hora, $clases[0], $clases[1], $clases[2], $clases[3], $clases[4]);
}

printf("|%s", str_repeat('-', 89));
printf("|\n");

?>
