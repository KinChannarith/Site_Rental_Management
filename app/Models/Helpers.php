<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helpers extends Model
{
    public function dateFormat($date,$format)
    {
        $date = new \Carbon\Carbon($date);
        // return $date->format('d/m/Y');
        return $date->format($format);
        // Now modify and return the date
    }
    
}
?>