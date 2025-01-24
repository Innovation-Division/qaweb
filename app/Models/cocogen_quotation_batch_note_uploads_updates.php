<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_quotation_batch_note_uploads_updates extends Model
{
     protected $table = 'cocogen_quotation_batch_note_uploads_updates';
 

     protected $fillable = [
         'batchId',
         'saveDraft',
         'uploadNotes',
         'updateNotes',
         'dratfUpdate'
        
     ];
     protected $dates = [
          'created_at',
          'updated_at',
          'upload_created_at',
          'upload_updated_at',
          'draft_created_at',
          'draft_update_at',
          'draft_upload_created_at',
          'draft_upload_updated_at',
      ];
  
    
}
