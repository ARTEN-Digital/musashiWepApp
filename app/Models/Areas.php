<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Areas extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    protected $searchableFields = ['*'];

    public function users(){
        return $this->hasMany(User::class);
    }


    public function processes()
    {
        return $this->belongsToMany(Process::class, 'area_processes', 'id_area', 'id_process');
    }

    public function processesfilters($idline, $idcategory, $idmodel)
    {
        return $this->belongsToMany(Process::class, 'area_processes', 'id_area', 'id_process')->leftJoin('process_lines', 'processes.id', 'process_lines.id_process')->leftJoin('process_categories', 'processes.id', 'process_categories.id_process')->leftJoin('process_models', 'processes.id', 'process_models.id_process')->when($idline != '', function ($query) use ($idline){
            return $query->where('process_lines.id_line', $idline);
        })->when($idcategory != '', function ($query) use ($idcategory){
            return $query->where('process_categories.id_category', $idcategory);
        })->when($idmodel != '', function ($query) use ($idmodel){
            return $query->where('process_models.id_model', $idmodel);
        })->distinct()->get();
        
    }
}
