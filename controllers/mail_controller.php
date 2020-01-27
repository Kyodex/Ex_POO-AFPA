<?php

$message = 'Bienvenue sur notre CRUD test Je vous souhaites la bienvenue.'
        . 'en Passant bienvenue Cordialement '
        . 'Le hibou de mars';

    $sHeaders = 'MIME-Version: 1.0' . '\r\n';
    $sHeaders .= 'Content-Type: text/html; charset=utf-8' . '\r\n';
    $sHeaders .= 'From: Dave Loper <dave.loper@afpa.fr>' . '\r\n';
    $sHeaders .= 'Reply-to: Service commercial <commerciaux@jarditou.com>' . '\r\n';
    $sHeaders .= 'X-Mailer: PHP/' . phpversion() . '\r\n';

?>