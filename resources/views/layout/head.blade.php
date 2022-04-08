<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">
    <head>
        <meta charset="utf-8" />
        <title>{{config('app.name')}}</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/ICON BPOS.png') }}" />
        <!-- Template CSS -->
        <link href="assets/css/main.css?v=1.0" rel="stylesheet" type="text/css" />
        @livewireStyles()
    </head>
