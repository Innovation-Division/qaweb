<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use File;
use ZipArchive;
class corpgovernance extends Controller
{
    public function downloadGovernance2015(Request $request){ 

            $hash = sha1(now());
            $path = public_path('tempfiles') ."/". $hash;
            $namefile = "2015";
            if(!File::exists($path)) {
                mkdir($path, 0777,true);
            }

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2015/Corporate%20Governance%20Scorecard%202015%20BONUS.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2015 BONUS".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2015/Corporate%20Governance%20Scorecard%202015%20PART%20A.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2015 PART A".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2015/Corporate%20Governance%20Scorecard%202015%20PART%20B.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2015 PART B".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2015/Corporate%20Governance%20Scorecard%202015%20PART%20C.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2015 PART C".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2015/Corporate%20Governance%20Scorecard%202015%20PART%20D.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2015 PART D".".pdf", file_get_contents($url)); 
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2015/Corporate%20Governance%20Scorecard%202015%20PART%20E.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2015 PART E".".pdf", file_get_contents($url)); 
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2015/Corporate%20Governance%20Scorecard%202015%20PENALTY.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2015 PENALTY".".pdf", file_get_contents($url));  
                    // file_put_contents($path, file_get_contents($url));  
                }      
                $zip_file ="2015.zip";
                $zip = new \ZipArchive();
                $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

                $pathzip = $path;
                $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($pathzip));
                foreach ($files as $name => $file)
                {
                    // We're skipping all subfolders
                    if (!$file->isDir()) {
                        $filePath     = $file->getRealPath();
                        // extracting filename with substr/strlen
                        $relativePath =  substr($filePath, strlen($pathzip) + 1);

                        $zip->addFile($filePath, $relativePath);
                    }
                }
                $zip->close();
                \File::deleteDirectory($path);
                return response()->download($zip_file)->deleteFileAfterSend(true);
    }

    public function downloadGovernance2016(Request $request){ 

            $hash = sha1(now());
            $path = public_path('tempfiles') ."/". $hash;
            $namefile = "2016";
            if(!File::exists($path)) {
                mkdir($path, 0777,true);
            }

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2016/UCPB%20GEN%20ACGS%202016%20-%20Bonus.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "UCPB GEN ACGS 2016 - Bonus".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2016/UCPB%20GEN%20ACGS%202016%20-%20Part%20A.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "UCPB GEN ACGS 2016 - Part A".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2016/UCPB%20GEN%20ACGS%202016%20-%20Part%20B.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "UCPB GEN ACGS 2016 - Part B".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2016/UCPB%20GEN%20ACGS%202016%20-%20Part%20C.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "UCPB GEN ACGS 2016 - Part C".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2016/UCPB%20GEN%20ACGS%202016%20-%20Part%20D.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "UCPB GEN ACGS 2016 - Part D".".pdf", file_get_contents($url)); 
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2016/UCPB%20GEN%20ACGS%202016%20-%20Part%20E.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "UCPB GEN ACGS 2016 - Part E".".pdf", file_get_contents($url)); 
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2016/UCPB%20GEN%20ACGS%202016%20-%20Penalty.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "UCPB GEN ACGS 2016 - Penalty".".pdf", file_get_contents($url));  
                    // file_put_contents($path, file_get_contents($url));  
                }      
                $zip_file ="2016.zip";
                $zip = new \ZipArchive();
                $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

                $pathzip = $path;
                $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($pathzip));
                foreach ($files as $name => $file)
                {
                    // We're skipping all subfolders
                    if (!$file->isDir()) {
                        $filePath     = $file->getRealPath();
                        // extracting filename with substr/strlen
                        $relativePath =  substr($filePath, strlen($pathzip) + 1);

                        $zip->addFile($filePath, $relativePath);
                    }
                }
                $zip->close();
                \File::deleteDirectory($path);
                return response()->download($zip_file)->deleteFileAfterSend(true);
    }

    public function downloadGovernance2017(Request $request){ 

            $hash = sha1(now());
            $path = public_path('tempfiles') ."/". $hash;
            $namefile = "2017";
            if(!File::exists($path)) {
                mkdir($path, 0777,true);
            }

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2017/Corporate%20Governance%20Scorecard%202017%20BONUS.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2017 BONUS".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2017/Corporate%20Governance%20Scorecard%202017%20PART%20A.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2017 PART A".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2017/Corporate%20Governance%20Scorecard%202017%20PART%20B.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2017 PART B".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2017/Corporate%20Governance%20Scorecard%202017%20PART%20C.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2017 PART C".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2017/Corporate%20Governance%20Scorecard%202017%20PART%20D.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2017 PART D".".pdf", file_get_contents($url)); 
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2017/Corporate%20Governance%20Scorecard%202017%20PART%20E.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2017 PART E".".pdf", file_get_contents($url)); 
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2017/Corporate%20Governance%20Scorecard%202017%20PENALTY.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance Scorecard 2017 PENALTY".".pdf", file_get_contents($url));  
                    // file_put_contents($path, file_get_contents($url));  
                }      
                $zip_file ="2017.zip";
                $zip = new \ZipArchive();
                $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

                $pathzip = $path;
                $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($pathzip));
                foreach ($files as $name => $file)
                {
                    // We're skipping all subfolders
                    if (!$file->isDir()) {
                        $filePath     = $file->getRealPath();
                        // extracting filename with substr/strlen
                        $relativePath =  substr($filePath, strlen($pathzip) + 1);

                        $zip->addFile($filePath, $relativePath);
                    }
                }
                $zip->close();
                \File::deleteDirectory($path);
                return response()->download($zip_file)->deleteFileAfterSend(true);
    }

    public function downloadGovernance2018(Request $request){ 

            $hash = sha1(now());
            $path = public_path('tempfiles') ."/". $hash;
            $namefile = "2018";
            if(!File::exists($path)) {
                mkdir($path, 0777,true);
            }

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2018/Corporate%20Governance%202018%20BONUS.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2018 BONUS".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2018/Corporate%20Governance%202018%20PART%20A.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2018 PART A".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2018/Corporate%20Governance%202018%20PART%20B.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2018 PART B".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2018/Corporate%20Governance%202018%20PART%20C.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2018 PART C".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2018/Corporate%20Governance%202018%20PART%20D.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2018 PART D".".pdf", file_get_contents($url)); 
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2018/Corporate%20Governance%202018%20PART%20E.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2018 PART E".".pdf", file_get_contents($url)); 
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2018/Corporate%20Governance%202018%20PENALTY.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2018 PENALTY".".pdf", file_get_contents($url));  
                    // file_put_contents($path, file_get_contents($url));  
                }      
                $zip_file ="2018.zip";
                $zip = new \ZipArchive();
                $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

                $pathzip = $path;
                $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($pathzip));
                foreach ($files as $name => $file)
                {
                    // We're skipping all subfolders
                    if (!$file->isDir()) {
                        $filePath     = $file->getRealPath();
                        // extracting filename with substr/strlen
                        $relativePath =  substr($filePath, strlen($pathzip) + 1);

                        $zip->addFile($filePath, $relativePath);
                    }
                }
                $zip->close();
                \File::deleteDirectory($path);
                return response()->download($zip_file)->deleteFileAfterSend(true);
    }

    public function downloadGovernance2019(Request $request){ 

            $hash = sha1(now());
            $path = public_path('tempfiles') ."/". $hash;
            $namefile = "2019";
            if(!File::exists($path)) {
                mkdir($path, 0777,true);
            }

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2019/Corporate%20Governance%202019%20BONUS.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2019 BONUS".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2019/Corporate%20Governance%202019%20PART%20A.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2019 PART A".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2019/Corporate%20Governance%202019%20PART%20B.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2019 PART B".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2019/Corporate%20Governance%202019%20PART%20C.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2019 PART C".".pdf", file_get_contents($url));  
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2019/Corporate%20Governance%202019%20PART%20D.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2019 PART D".".pdf", file_get_contents($url)); 
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2019/Corporate%20Governance%202019%20PART%20E.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2019 PART E".".pdf", file_get_contents($url)); 
                }      

                $url = "https://www.cocogen.com/pdfdocuments/ucpbpdf/2019/Corporate%20Governance%202019%20PENALTY.pdf";   
                $fileName =basename($url);
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);     
                $content = $this->file_get_contents_curl($url);
                $result_if_file_exist = $this->get_html_title($content);
                if(empty($result_if_file_exist)){
                    file_put_contents($path .'/'. "Corporate Governance 2019 PENALTY".".pdf", file_get_contents($url));  
                    // file_put_contents($path, file_get_contents($url));  
                }      
                $zip_file ="2019.zip";
                $zip = new \ZipArchive();
                $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

                $pathzip = $path;
                $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($pathzip));
                foreach ($files as $name => $file)
                {
                    // We're skipping all subfolders
                    if (!$file->isDir()) {
                        $filePath     = $file->getRealPath();
                        // extracting filename with substr/strlen
                        $relativePath =  substr($filePath, strlen($pathzip) + 1);

                        $zip->addFile($filePath, $relativePath);
                    }
                }
                $zip->close();
                \File::deleteDirectory($path);
                return response()->download($zip_file)->deleteFileAfterSend(true);
    }

    function file_get_contents_curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);

        curl_close($ch);
        return $data;
    }

    function get_html_title($html){
        preg_match("/\<title.*\>(.*)\<\/title\>/isU", $html, $matches);
        if(empty($matches[1])){
            $matches = "";
        }else{
            $matches = $matches[1];
        }
        return $matches;
    }
}
