<?php 

    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

    define( TIMEBEFORE_NOW,         'agora' );
    define( TIMEBEFORE_MINUTE,      'há {num} minuto atrás' );
    define( TIMEBEFORE_MINUTES,     'há {num} minutos atrás' );
    define( TIMEBEFORE_HOUR,        'há {num} hora atrás' );
    define( TIMEBEFORE_HOURS,       'há {num} horas atrás' );
    define( TIMEBEFORE_YESTERDAY,   'ontem' );
    define( TIMEBEFORE_FORMAT,      '%e %b' );
    define( TIMEBEFORE_FORMAT_YEAR, 'em %d de %B de %Y' );

    function time_ago( $time )
    {
        $out    = ''; // what we will print out
        $now    = time(); // current time
        $diff   = $now - $time; // difference between the current and the provided dates

        if( $diff < 60 ) // it happened now
            return TIMEBEFORE_NOW;

        elseif( $diff < 3600 ) // it happened X minutes ago
            return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

        elseif( $diff < 3600 * 24 ) // it happened X hours ago
            return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? TIMEBEFORE_HOUR : TIMEBEFORE_HOURS );

        elseif( $diff < 3600 * 24 * 2 ) // it happened yesterday
            return TIMEBEFORE_YESTERDAY;

        else // falling back on a usual date format as it happened later than yesterday
            return strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time );
    }   