<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'file_path',
        'file_name',
        'file_size',
        'external_url',
        'type',
        'subject',
        'grade_level',
        'is_published',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_learning_material');
    }

    // Accessors para usar en las vistas
    public function getFileTypeAttribute()
    {
        if ($this->external_url) {
            return 'link';
        }
        
        if ($this->file_path) {
            $extension = pathinfo($this->file_path, PATHINFO_EXTENSION);
            return $this->mapFileType($extension);
        }
        
        return $this->type;
    }

    public function getFileIconAttribute()
    {
        switch ($this->file_type) {
            case 'pdf':
                return '📄';
            case 'document':
                return '📝';
            case 'spreadsheet':
                return '📊';
            case 'presentation':
                return '📽️';
            case 'video':
                return '🎬';
            case 'link':
                return '🔗';
            case 'image':
                return '🖼️';
            default:
                return '📎';
        }
    }

    public function getDownloadUrlAttribute()
    {
        if ($this->file_path) {
            return asset('storage/' . $this->file_path);
        }
        return $this->external_url;
    }

    private function mapFileType($extension)
    {
        $documentTypes = ['pdf', 'doc', 'docx', 'txt'];
        $spreadsheetTypes = ['xls', 'xlsx', 'csv'];
        $presentationTypes = ['ppt', 'pptx'];
        $videoTypes = ['mp4', 'avi', 'mov', 'wmv'];
        $imageTypes = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];

        if (in_array($extension, $documentTypes)) return 'document';
        if (in_array($extension, $spreadsheetTypes)) return 'spreadsheet';
        if (in_array($extension, $presentationTypes)) return 'presentation';
        if (in_array($extension, $videoTypes)) return 'video';
        if (in_array($extension, $imageTypes)) return 'image';

        return 'document';
    }
}