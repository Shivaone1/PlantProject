<?php

namespace App\Http\Controllers;

use App\Models\PMCheckList;
use App\Models\PMCheckPoint;
use App\Models\PMCheckSparePart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\support\Facades\file;

class productObjectController extends Controller
{
    public function projectObjectdata(Request $request)
    {
        // $data = $request->all();exit();
        //         $checkpoints=[];
        //         foreach ($request->checkpoints as $key => $value) {
        //             $data = $checkpoints[$key][$value];           
        //             // Additional processing or storage logic can be added here
        //         }
        // return response()->json(['status' => true, 'message' => 'Data stored successfully', 'data' => $data], 200);
        // exit();
        $validation = Validator::make($request->all(), [
            'plant_id' => 'required', //|exists:Plants,id
            'section_id' => 'required',
            'subsection_id' => 'required',
            'equipment_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'description' => 'required',
            'equipment' => 'required',
            'version' => 'required',
            // 'checksheettype' => 'required',
            // 'checkpoints.*.title' => 'required',
            // 'checkpoints.*.std_value' => 'required',
            // 'checkpoints.*.check_method' => 'required',
            // 'checkpoints.*.actual_value' => 'required',
            // 'checkpoints.*.remark' => 'required',
            // 'spareParts.*.spare_part' => 'required',
            // 'spareParts.*.description' => 'required',
            // 'spareParts.*.qty' => 'required',
            // 'spareParts.*.reason' => 'required',
            // 'spareParts.*.remark' => 'required',
            // 'spareParts.*.media' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validation->fails()) {
            $error = $validation->errors()->first();
            return response()->json(['status' => false, 'message' => $error], 400);
        }

        try {
            $obj = new PMCheckList;
            $obj->plant_id = $request->plant_id;
            $obj->section_id = $request->section_id;
            $obj->subsection_id = $request->subsection_id;
            $obj->equipment_id = $request->equipment_id;
            $obj->category_id = $request->category_id;
            $obj->subcategory_id = $request->subcategory_id;
            $obj->description = $request->description;
            $obj->version = $request->version;
            $obj->equipment = $request->equipment;
            $obj->checksheettype = $request->checksheettype;
            // $obj->save();//
            // print_r("{$request->checkpoints}") or die();

            // exit();
            foreach ($request->checkpoints ?? [] as $checkpoint) {
            print_r("{$checkpoint}") or die();
            exit();
                
                try {
                    $subObj = new PMCheckPoint;
                    $subObj->p_m_check_list_id = $obj->id;
                    $subObj->title = $checkpoint['title'] ?? "";
                    $subObj->std_value = $checkpoint['std_value'] ?? "";
                    $subObj->check_method = $checkpoint['check_method'] ?? "";
                    $subObj->actual_value = $checkpoint['actual_value'] ?? "";
                    $subObj->remark = $checkpoint['remark'] ?? "";
                    $subObj->media = $checkpoint['media'] ?? "";
                    $subObj->toArray();
                    return response()->json($subObj, 200);exit();
                    // $image = $checkpoint->file('media');
                    // $name = time() . '.' . $image->getClientOriginalExtension();
                    // $image->move('images/', $name);
                    // PMCheckPoint::create(['media' => $name]);
                    $subObj->save();
                } catch (\Exception $e) {
                    // Handle the exception (e.g., log it)
                    return response()->json(['status' => false, 'message' => 'Error saving checkpoints', 'error' => $e->getMessage()], 500);
                }
            }

            // You might want to use a loop similar to the one above for spareParts.

            // $responseData = [
            //     'status' => true,
            //     'message' => 'Checkpoints saved successfully',
            //     'checkpointData' => $subObj->toArray(), // Convert object to array
            // ];

            // return response()->json($responseData, 200);


            // return response()->json(['status' => true, 'message' => 'Checkpoints saved successfully'.$subObj], 200);
            exit();

            foreach ($request->spareParts ?? [] as $sparePart) {
                $spareObj = new PMCheckSparePart;
                $spareObj->p_m_check_list_id = $obj->id;
                $spareObj->spare_part = $sparePart['spare_part'] ?? "";
                $spareObj->description = $sparePart['description'] ?? "";
                $spareObj->qty = $sparePart['qty'] ?? null;
                $spareObj->reason = $sparePart['reason'] ?? null;
                $spareObj->remark = $sparePart['remark'] ?? null;
                $spareObj->media = $sparePart['media'] ?? null;

                // if (isset($sparePart['media']) && !empty($sparePart['media'])) {
                //     // Assuming 'media' contains the file data
                //     $path = 'public/uploads/';
                //     $filename = uniqid('image_') . '.png';
                //     $fullPath = $path . $filename;
                //     $imageData = $sparePart['media'];

                //     // Check if the file data is in base64 format
                //     if (strpos($imageData, 'data:image') === 0) {
                //         // Decode the base64 data and save the image to the specified directory
                //         file_put_contents($fullPath, base64_decode(explode(',', $imageData)[1]));

                //         $spareObj->media = $filename;
                //     } else {
                //         echo 'Invalid image data format';
                //     }
                // }                

                // $spareObj->save();
            }

            return response()->json(['status' => true, 'message' => 'Data stored successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // private function uploadMedia($file)
    // {
    //     $ext = $file->getClientOriginalExtension();
    //     $newFileName = uniqid() . "." . $ext;
    //     $uploadPath = public_path('uploads/product/');

    //     if (!File::isDirectory($uploadPath)) {
    //         File::makeDirectory($uploadPath, 0777, true, true);
    //     }

    //     $file->move($uploadPath, $newFileName);

    //     return 'uploads/product/' . $newFileName;
    // }

}
