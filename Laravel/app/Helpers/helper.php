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

function responseStatus($data = '', $success = false, $message = "", $status = 201, $metadata = [])
{
    $response['success'] = $success;
    $response['status'] = $status;
    $response['message'] = $message;
    $response['data'] = $data;
    // $response['metadata'] = $metadata;
    return response()->json($response, $response['status']);
}
// function responseData($data = '', $success = false, $message = "", $status = 201, $headers = [])
// {
//     $response['success'] = $success;
//     $response['status'] = $status;
//     $response['message'] = $message;
//     $response['data'] = $data;
//     return response()->json($response, $response['status'])->withHeaders($headers);
// }