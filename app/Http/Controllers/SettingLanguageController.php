<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SettingLanguageController extends Controller
{
    public function translate($lang)
    {
        $full_data = include(base_path('lang/' . $lang . '/message.php'));
        $lang_data = [];
        ksort($full_data);
        foreach ($full_data as $key => $data) {
            array_push($lang_data, ['key' => $key, 'value' => $data]);
        }
        // return $lang_data;
        return view('admin.lang.indexvue', compact('lang', 'lang_data'));
    }

    public function translate_submit(Request $request, $lang)
    {
        $full_data = include(base_path('lang/' . $lang . '/message.php'));
        $full_data[$request['key']] = $request['value'];
        $str = "<?php return " . var_export($full_data, true) . ";";
        file_put_contents(base_path('lang/' . $lang . '/message.php'), $str);
        return response()->json(['err' => false, 'msg' => 'تم التعديل بنجاح']);
    }
    public function translate_add(Request $request)
    {
        $langs = ['ar', 'en'];
        foreach ($langs as $l) 
        {
            $full_data = include(base_path('lang/' . $l . '/message.php'));
            $full_data[$request['key']] = $request['key'];
            $str = "<?php return " . var_export($full_data, true) . ";";
            file_put_contents(base_path('lang/' . $l . '/message.php'), $str);
        }
        return response()->json(['err' => false, 'msg' => 'تم الاضافة بنجاح']);
    }

    public function delete(Request $request)
    {
        //dd($request);
        $langs = ['ar', 'en'];
        foreach ($langs as $l) 
        {
            $full_data = include(base_path('lang/' . $l . '/message.php'));
            //$full_data = File::get('lang/'.$l.'/message.php');
            $newContent = str_replace($full_data[$request['key']], '', $full_data);
            $str = "<?php return " . var_export($full_data, true) . ";";
            file_put_contents(base_path('lang/' . $l . '/message.php'), $str);
        }
        return response()->json(['err' => false, 'msg' => 'تم  ']);
    }
}
