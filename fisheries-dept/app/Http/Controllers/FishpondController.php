<?php

namespace App\Http\Controllers;
use App\Fishpond;
use App\Location;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FishpondController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'district' => '',
            'image' => '',
            'fname'=>'',
            'address'=>'',
            'location_of_pond'=>'',
            'tehsil'=>'',
            'area'=>'',
            'epic_no'=>'',
            'name_of_scheme'=>'',
            'lat'=>'',
            'lng'=>'',

        ]);
        //for single images
        if ($files = $request->file('image')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
         }

         if ($files = $request->file('pondImage_one')) {
            $destinationPath1 = 'public/image1/'; // upload path
            $pi1 = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath1, $pi1);
         }
         if ($files = $request->file('pondImage_two')) {
            $destinationPath2 = 'public/image2/'; // upload path
            $pi2 = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath2, $pi2);
         }

         if ($files = $request->file('pondImage_three')) {
            $destinationPath3 = 'public/image3/'; // upload path
            $pi3 = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath3, $pi3);
         }

         if ($files = $request->file('pondImage_four')) {
            $destinationPath4 = 'public/image4/'; // upload path
            $pi4 = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath4, $pi4);
         }
         

         
        //DB UPLOAD FOR SINGLE PICTURE i.e Profile picture 
        $fishpond = new Fishpond();
        
        $fishpond->district = $request->district;
        $fishpond->name= $request->name;
        $fishpond->fname = $request->fname;
        $fishpond->address = $request->address;
        $fishpond->location_of_pond = $request->location_of_pond;
        $fishpond->tehsil = $request->tehsil;
        $fishpond->area = $request->area;
        $fishpond->epic_no = $request->epic_no;
        $fishpond->name_of_scheme = $request->name_of_scheme;
        $fishpond->image = $profileImage;

        $fishpond->pondImage_one=$pi1;
        $fishpond->pondImage_two=$pi2;
        $fishpond->pondImage_three=$pi3;
        $fishpond->pondImage_four=$pi4;

        $fishpond->lat = $request->lat;
        $fishpond->lng = $request->lng;
        $fishpond->user_id=$request->user_id;
        $fishpond->save();
        

        if (auth()->user()){
            
            return response()->json([
                'success' => true,
                'data' => $fishpond->toArray()
            ]);
        }
            
        else
            return response()->json([
                'success' => false,
                'message' => 'Fishpond could not be added'
            ], 500);
       
    }


    public function editUserData(Request $request, $id)
    {

        $fishpond = auth()->user()->fishponds()->find($id);
        $this->validate($request, [
            'district' => '',
            'image' => '',
            'fname'=>'',
            'address'=>'',
            'location_of_pond'=>'',
            'tehsil'=>'',
            'area'=>'',
            'epic_no'=>'',
            'name_of_scheme'=>'',
            'lat'=>'',
            'lng'=>'',

        ]);
        //for single images
        if ($files = $request->file('image')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
           // $insert['image'] = "$profileImage";
         }

         if ($files = $request->file('pondImage_one')) {
            $destinationPath1 = 'public/image1/'; // upload path
            $pi1 = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath1, $pi1);
         }
         if ($files = $request->file('pondImage_two')) {
            $destinationPath2 = 'public/image2/'; // upload path
            $pi2 = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath2, $pi2);
         }

         if ($files = $request->file('pondImage_three')) {
            $destinationPath3 = 'public/image3/'; // upload path
            $pi3 = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath3, $pi3);
         }

         if ($files = $request->file('pondImage_four')) {
            $destinationPath4 = 'public/image4/'; // upload path
            $pi4 = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath4, $pi4);
         }

        // UPLOAD
        //$fishpond = new Fishpond();
        $fishpond->district = $request->district;
        $fishpond->fname = $request->fname;
        $fishpond->name=$request->name;
        $fishpond->address = $request->address;
        $fishpond->location_of_pond = $request->location_of_pond;
        $fishpond->tehsil = $request->tehsil;
        $fishpond->area = $request->area;
        $fishpond->epic_no = $request->epic_no;
        $fishpond->name_of_scheme = $request->name_of_scheme;
        $fishpond->image = $profileImage;

        $fishpond->pondImage_one=$pi1;
        $fishpond->pondImage_two=$pi2;
        $fishpond->pondImage_three=$pi3;
        $fishpond->pondImage_four=$pi4;

        
        $fishpond->lat = $request->lat;
        $fishpond->lng = $request->lng;
        $fishpond->save();


        if (auth()->user()->fishponds()->save($fishpond))
            return response()->json([
                'success' => true,
                'data' => $fishpond->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Fishpind could not be added'
            ], 500);
    }


    public function pondList()
    {
        $pondList=Fishpond::all();
        return response()->json([
            'data' => $pondList,
            'message' => 'success'
        ], 500);
    }



    public function search(Request $request)
    {

        $inputDistrict=$request->district;
        $inputTehsil=$request->tehsil;
        $inputScheme=$request->name_of_scheme;
        
        $scheme_Arr=explode(",", $inputScheme);
        foreach($scheme_Arr as $scheme){
            error_log($scheme);
        }
        $searchresult=Fishpond::orderBy('district','ASC')->where(function($q)
            use($inputDistrict,$inputTehsil,$inputScheme,$scheme_Arr){
                if($inputDistrict==null)
                {
                    error_log("inside first if");
                }
                    //$q->select;
                else
                {
                    error_log("inside  1 else if");

                    $q->where('district','LIKE','%'.$inputDistrict.'%');
                }

                if($inputTehsil==null)
                {
                    error_log("inside first if");
                }
                //$q->selectsllTehsil;
                else
                {
                    $q->where('tehsil','LIKE','%'.$inputTehsil.'%');
                    error_log("inside 2 else if tehsil: ". $inputTehsil);
                }

                if($inputScheme==null)
                {
                    error_log("inside first if");
                    
                }
                //$q->selectallSchemes;
                else
                {
                    //error_log($str_scheme);
                    foreach($scheme_Arr as $scheme)
                    {
                        error_log($scheme);
                        $q->where('name_of_scheme','LIKE','%'.$scheme.'%');

                    }
                 //  $q->where('name_of_scheme','LIKE','%'."NLUP".'%');
                 //  $q->where('name_of_scheme','LIKE','%'."Green".'%');

                }


            })->get();
        
            return response()->json([
                'data' => $searchresult,
                'message' => 'success'
            ], 500);
    }



    public function searchPonds(Request $request)
    {
        // $lat=$request->lat;
        // $lng=$request->lng;

        // $ponds=Fishpond::whereBetween('lat',[$lat-0.9,$lat+0.9])
        //     ->whereBetween('lng',[$lng-0.9,$lng+0.9])->get();
        $ponds=Fishpond::get();
        return $ponds;
    }

    public function searchCity(Request $request)
    {
        $locationVal=$request->locationVal;
        $matchedTehsils=Fishpond::where('tehsil','like',"%$locationVal%")->pluck('tehsil','tehsil');
        //return response()->json(['items'=>$matchedTehsils]);
        return view('ajxresult',compact('matchedTehsils'));
    }

    public function getAll()
    {
        $ponds=DB::table('fishponds')->get();
        // dd($girls);
        return response()->json($ponds);
    }

    public function searchTehsil(Request $request)
    {
        $distval=$request->distval;
        $matchedTehsils=Location::where('district',$distval)->pluck('tehsil','tehsil');

        return view('ajaxresult',['matchedTehsils'=>$matchedTehsils]);
    }

    public function searchPondsAizawl(){
        $ponds=Fishpond::where('district','aizawl')->get();
        return $ponds;  
    }

    public function findPond($id)
    {
        $pondDetail=Fishpond::findOrFail($id);
        return $pondDetail;
    }

    public function findImages($id)
    {
        $data=Fishpond::find($id);
        $images = explode(',',$data->pondImages);
        return $images;
    }

    public function findPropic($id)
    {
        $data=Fishpond::find($id);
        $image=$data->image;
        return $image;
    }

    
}
