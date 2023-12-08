<?php

namespace App\Http\Controllers;

use App\Models\Dicom;
use App\Models\dicomFile;
use App\Models\DicomInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\directoryExists;

class dicomController extends Controller
{
    public function dicomFile(Request $request)
    {
        $request->validate([
            'files.*' => 'required|mimes:jpg,dcm,dicom,zip,jpeg,png,csv,txt,xlx,xls,pdf|max:2048',
            'Modality' => 'string|max:255',
            'Series' => 'string|max:255',
            'date' => 'string|max:255',
            'Sequence' => 'string|max:255',
            'bandwidth' => 'string|max:255',
            'Field_T' => 'string|max:255',
            'Encoding' => 'string|max:255',
            'Manufacture' => 'string|max:255',
            'Model' => 'string|max:255',
            'Number' => 'string|max:255',
            'UID' => 'string|max:255',
            'Encoding' => 'string|max:255',
            'Station' => 'string|max:255',
        ]);
        
        if(Auth::user()){
            if ($request->hasFile('files')) {
    
                $uniqTime = $request->date.'_'.time(); 
                $pathUniq = "uploads/$uniqTime/";
                if(!File::isDirectory($pathUniq))
                    File::makeDirectory(public_path($pathUniq), 0777, true);
                   
                try {
                    
                    $size = 0 ;
                    $count = 0;
                    foreach ($_FILES['files']["tmp_name"] as $key => $file) { 
                        $count+=1;  
                        $file_name = $_FILES['files']['name'];
                        $size += $_FILES['files']['size'][$key];
                        $fileName = $pathUniq.$file_name[$key];  
                        move_uploaded_file($file,$fileName);
                    }
    
                    $newDicom = new Dicom();
                    $newDicom->path = $pathUniq;
                    $newDicom->user_id = Auth::user()->id;
                    $newDicom->baseName = $_FILES['files']['name'][0];
                    $newDicom->size = $size;
                    $newDicom->totalCount = $count;
                    $newDicom->Save();
    
                    $newDicomInfo = new DicomInfo();
                    $newDicomInfo->dicom_id = $newDicom->id;
                    $newDicomInfo->Encoding = $request->Encoding;
                    $newDicomInfo->Strength = $request->Field_T;
                    $newDicomInfo->Manufacture = $request->Manufacture;
                    $newDicomInfo->Modality = $request->Modality;
                    $newDicomInfo->date = $request->date;
                    $newDicomInfo->Model = $request->Model;
                    $newDicomInfo->slicesCount = $request->Number;
                    $newDicomInfo->Sequence = $request->Sequence;
                    $newDicomInfo->Series = $request->Series;
                    $newDicomInfo->UID = $request->UID;
                    $newDicomInfo->bandwidth = $request->bandwidth;
                    $newDicomInfo->Station = $request->Station;
                    $newDicomInfo->Save();
    
    
                    return response()->json(['data' => [
                        'id' => $newDicom->id,
                        'path' => $newDicom->path,
                        'Encoding' => $newDicomInfo->Encoding,
                        'Modality' => $newDicomInfo->Modality,
                        'Series' => $newDicomInfo->Series,
                        'date' => $newDicomInfo->date,
                        'Sequence' => $newDicomInfo->Strength,
                        'bandwidth' =>  $newDicomInfo->bandwidth,
                        'Field_T' => $newDicomInfo->Strength,
                        'Manufacture' =>  $newDicomInfo->Manufacture,
                        'Model' => $newDicomInfo->Model,
                        'Number' => $newDicomInfo->slicesCount,
                        'UID' => $newDicomInfo->UID,
                        'Encoding' => $newDicomInfo->Encoding,
                        'Station' => $newDicomInfo->Station,
                    ]]);
                } catch (\Throwable $th) {
                    return response()->json(['error' => 'در ارسال داده سمت سرور خطایی رخ داده لطفا مجدد فایل را لود کنید ']);
                }
    
    
            }
        }
    }


    public function showDicom(Request $request)
    {
        if(Auth::user()){
            $dicom = Dicom::where('user_id', Auth::user()->id)->paginate(15);

            return response()->json(['data' => $dicom]);
        }
        else{
            return response()->json(['error' => 'Unauthorized'], 40);
        }
    }


    public function singleDicom($id)
    {
        if(Auth::user()){
            $dicom = Dicom::Find($id);

            return response()->json(['data' => $dicom]);
        }
        else{
            return response()->json(['error' => 'Unauthorized'], 40);
        }
    }
}
