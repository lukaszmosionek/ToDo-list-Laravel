<?php

namespace App\Service;


class FilterService {

    public static function handle($query){


        // Filtruj według priorytetu, jeśli podano
        if (request()->has('priority') && request()->priority != '') {
            $query->where('priority', request()->priority);
        }

        // Filtruj według statusu, jeśli podano
        if (request()->has('status') && request()->status != '') {
            $query->where('status', request()->status);
        }

        // Filtruj według terminu wykonania (od - do)
        if (request()->has('due_date_from') && request()->due_date_from != '') {
            $query->whereDate('due_date', '>=', request()->due_date_from);
        }
        if (request()->has('due_date_to') && request()->due_date_to != '') {
            $query->whereDate('due_date', '<=', request()->due_date_to);
        }

        return $query;
    }

}
