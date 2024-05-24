<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload(){
        return view('file-upload');
    }

    public function fileuploadRename()
    {
        return view('file-upload-rename');
    }

    public function prosesFileUploadRename(Request $request){
        //dump($request->berkas);
        //dump($request->file('file));
        //return "Pemrosesan file upload di sini";
        //if($request->hasFile('berkas'))
        //{
            //echo "path(): ".$request->berkas->path();
            //echo "<br>";
            //echo "extension(): ".$request->berkas->extension();
            //echo "<br>";
            //echo "getClientOriginalExtension() ".
              //$request->berkas->getClientOriginalExtension();
            //echo "<br>";
            //echo "getMimeType(): ".$request->berkas->getMimeType();
            //echo "<br>";
            //echo "getClientOriginalName(): ".
              //$request->berkas->getClientOriginalName();
            //echo "<br>";
            //echo " getSize(): ".$request->berkas->getSize();

        //}
        //else
        //{
            //echo "Tidak ada berkas yang diupload";
        //}

        $request->validate([
            'berkas'=>'required|file|image|max:500', 
        ]);
        $extfile=$request->berkas->getClientOriginalName();
        $nama_file=$request->input('namaFile');
        $nameFile='web-'.time().".".$nama_file.".".$extfile;
        //$path = $request->berkas->storeAs('public', $nameFile);

        $path = $request->berkas->move('gambar', $nameFile);
        $path =str_replace("\\","//", $path);
        echo"Variabel path berisi:$path <br>";

        $pathBaru=asset('gambar/'.$nameFile);
        echo "proses upload berhasil, di link:<a href='$pathBaru'>$nama_file.$extfile</a>";
        echo "Proses upload berhasil, data disimpan pada: $path";
        echo "<br>";
        echo "<img src = '$pathBaru' alt = 'gambar' style = 'max-width: 300px; max-height: 300px;'> ";

        //echo $request->berkas->getClientOriginalName()."lolos validasi";
    }
}
