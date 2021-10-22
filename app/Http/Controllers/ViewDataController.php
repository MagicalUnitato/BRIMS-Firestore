<?php

namespace App\Http\Controllers;
use Google\Cloud\Core\Timestamp;
use DateTime;
use Illuminate\Http\Request;
use App\Models\ChartData;
class ViewDataController extends Controller
{
    public function getAverageSpeeds(){
        $speedtestData = app('firebase.firestore')->database()->collection('calculations')->documents();
        $label = [];
        $upload = [];
        $download = [];
        foreach($speedtestData as $stu){
            if($stu->exists()){
                $label[] = $stu->data()['isp'];
                $upload[] = $stu->data()['upload'];
                $download[] = $stu->data()['download'];
            }
        }
        $data = new ChartData;
        $data -> labels = $label;
        $data -> upload = $upload;
        $data -> download = $download;
        return $data;
    }
    public function calculateAverage($serviceProvider){
        $uploadAve = app('firebase.firestore')->database()->collection('calculations')->newDocument();
        $speedtestData = app('firebase.firestore')->database()->collection('newTestAgain');
        $query = $speedtestData->where('isp','==',$serviceProvider);
        $documents = $query->documents();
        $averageUp = 0;
        $averageDown = 0;
        $count = 0;
        foreach($documents as $stu) {  
            if($stu->exists()){  
                $count = $count + 1;
                $averageUp = $averageUp + $stu->data()['upload'];
                $averageDown = $averageDown + $stu->data()['download'];
            }
        }
        error_log($count);
        $averageUp = $averageUp / $count;
        $averageDown = $averageDown / $count;
        $uploadAve->set([
            'isp' => $serviceProvider,
            'upload' => $averageUp,
            'download' => $averageDown,
        ]);
    }
    public function getMonthlySpeedProvider($serviceProvider,$startDate,$endDate){
        $start = new Timestamp(new DateTime($startDate));
        $end  = new Timestamp(new DateTime($endDate));
        $upload = [];
        $download = [];
        $label = [];
        $speedtestData = app('firebase.firestore')->database()->collection('newTestAgain');  
        $query = $speedtestData->where('isp','==',$serviceProvider)->where('created_at','>',$start)->where('created_at','<',$end);
        $documents = $query->documents();
        foreach($documents as $stu) {  
            if($stu->exists()){ 
                $tempLabel = $stu->data()['created_at']->formatAsString();
                $label[] = date("Y-m-d", strtotime($tempLabel));
                $upload[] = $stu->data()['upload'];
                $download[] = $stu->data()['download'];
            }  
        }  
        $data = new ChartData;
        $data -> isp = $serviceProvider;
        $data -> labels = $label;
        $data -> upload = $upload;
        $data -> download = $download;
        return $data;
    }
    public function getHeatMapData(){
        $speedtestData = app('firebase.firestore')->database()->collection('newTestAgain')->documents();
        $dataset = [];
        foreach($speedtestData as $stu){
            if($stu->exists()){
                $data = new ChartData;
                $data -> lat = $stu->data()['latitude'];
                $data -> lng = $stu->data()['longitude'];
                $data -> download = $stu->data()['download'];
                $dataset[] = $data;
            }
        }
        return $dataset;
    }
}
