<?php

namespace Acr\Eoimg\Controllers;


use Acr\File\Facades\AcrFile;
use Acr\File\Model\Acr_files_childs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use Zipper;

class ImgControllers extends Controller
{

    function upload(Request $request)
    {
        $dosya_model = new Acr_files_childs();
        $dosyalar    = $dosya_model->where('created_at', '<=', date('Y-m-d H:i:s', strtotime("-1 hour")))->get();
        foreach ($dosyalar as $dosya) {
            $file = $dosya->file_name . '.' . $dosya->file_type;
            @unlink(base_path() . '/public_html/acr_files/' . $dosya->acr_file_id . '/' . $file);
            @unlink(base_path() . '/public_html/acr_files/' . $dosya->acr_file_id . '/thumbnail/' . $file);
            @unlink(base_path() . '/public_html/acr_files/' . $dosya->acr_file_id . '/medium/' . $file);
            @unlink(base_path() . '/public_html/acr_files/' . $dosya->acr_file_id . '/e_okul/' . $dosya->file_name . '.jpg');
            @unlink(base_path() . '/public_html/acr_files/' . $dosya->acr_file_id . '/temp/' . $dosya->file_name . '.jpg');
        }
        $acr_file_id = empty($acr_file_id) ? AcrFile::create(NULL) : $acr_file_id;
        $dosya_model->where('created_at', '<=', date('Y-m-d H:i:s', strtotime("-1 hour")))->delete();
        $yan_kesim = $request->yan_kesim;

        return View('Eoimg::index', compact('acr_file_id', 'yan_kesim'));

    }

    function arsivle_indir(Request $request)
    {
        $acr_file_id = $request->acr_file_id;
        $dosya_model = new Acr_files_childs();
        $dosyalar    = $dosya_model->where('acr_file_id', $acr_file_id)->get();

        foreach ($dosyalar as $dosya) {
            $dosyaDizi[] = "acr_files/" . $dosya->acr_file_id . "/e_okul/" . $dosya->file_name . ".jpg";
        }
        Zipper::make('e_okul/' . 'e-okul_' . $acr_file_id . '.zip')->add($dosyaDizi)->close();
        return response()->download(base_path() . '/public_html/e_okul/' . 'e-okul_' . $acr_file_id . '.zip')->deleteFileAfterSend(true);
    }
}