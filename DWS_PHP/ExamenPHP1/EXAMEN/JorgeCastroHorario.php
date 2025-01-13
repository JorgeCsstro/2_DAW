<?php

$horario = [
    '14:10' => ['DWEC', 'DWEC', '--', 'DWES', 'EIE'],
    '15:05' => ['DWEC', 'DWEC', 'DWEC', 'DWES', 'DWES'],
    '16:00' => ['DWES', 'DIW', 'DWEC', 'EIE', 'DWES'],
    '16:55' => ['P', 'A', 'T', 'I', 'O'],
    '17:15' => ['DWES', 'DIW', 'DWEC', 'DIW', 'DIW'],
    '18:10' => ['EIE', 'DWES', 'DAW', 'DAW', 'DIW'],
    '19:05' => ['DAW', 'DWES', 'DAW', 'DAW', '--'],
    '20:00' => ['DAW', '--', 'TUT', 'DAW', '--'],
];

$dias = ['Hora', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];

printf("|%s", str_repeat('-', 71));
printf("|\n");
printf("| %-9s | %-9s | %-9s | %-9s | %-9s | %-9s |\n", 
    $dias[0], $dias[1], $dias[2], $dias[3], $dias[4], $dias[5]);
printf("|%s", str_repeat('-', 71));
printf("|\n");

foreach ($horario as $hora => $clases) {
    printf("| %-9s | %-9s | %-9s | %-9s | %-9s | %-9s |\n", 
        $hora, $clases[0], $clases[1], $clases[2], $clases[3], $clases[4]);
}

printf("|%s", str_repeat('-', 71));
printf("|\n");

?>
