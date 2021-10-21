<?php


namespace App\Http\Controllers;


class SeriesController extends Controller
{
    public function index()
    {
            $series = [
                'Grey\'s Anatomy',
                'Lost',
                'Agents of Shield'
            ];

           return view('series.index', [
               'series' => $series
           ]);

    }

    public function create()
    {
        return view('series.create');
    }

}
