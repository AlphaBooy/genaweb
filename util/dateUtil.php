<?php

function dateFromDBtoDisplay($date) {
    return date('d/m/Y',strtotime($date));
}