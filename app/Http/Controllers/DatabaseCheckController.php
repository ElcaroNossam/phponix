<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

use Exception;

class DatabaseCheckController extends Controller
{
    public function checkDatabaseConnection()
    {
        try {
            DB::select('SELECT 1');
            return 'Успешное подключение к базе данных!';
        } catch (Exception $e) {
            return 'Ошибка подключения к базе данных: ' . $e->getMessage();
        }
    }
}