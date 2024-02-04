<?php 
use App\Models\Commnet;
use Illuminate\Support\Facades\Storage;


// if (!function_exists('exampleHelper')) {
//     function exampleHelper($param)
//     {
//         // Your helper function logic here
//         return 'Helper function called with parameter: ' . $param;
//     }
// }
function uploadImg($file, $path)
{
    $fileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
    $file->move($path, $fileName);
    return $fileName;
}

function deleteImg($path)
{
    if (Storage::exists($path)) {
        Storage::delete($path);
    }
    return 'Ok';
}

function notification($data)
{
    // $comment = new Comment(); /// Comment Is Model
    // $comment->user_id = $data['user_id'];
    // $comment->type = $data['type'];
    // $comment->type_id = $data['type_id'];
    // $comment->message = $data['message'];
    // $comment->data = json_encode($data);
    // $comment->save();
    // return "success";
}