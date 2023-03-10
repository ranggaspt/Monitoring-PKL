<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Package;
use App\Models\Test;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Nette\Utils\DateTime;

class AdminTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->query('id') != "") {
            $id = Crypt::decrypt($request->query('id'));
            Session::put('package_id', $id);
        }
        $packageId = Session::get('package_id');
        $test = Test::select('question_id')->where('package_id', $packageId)->get();
            $questions = Question::whereNotIn('id',$test
            // function($q){
            //     $q->select()
            //     $q->select('question_id')->from('tests');
            // }
            )->get();
            $test = Question::join('tests','questions.id','=','tests.question_id')
            ->where('tests.package_id',$packageId)->get();
            $this->data['questions'] = $questions;
            $this->data['list_test'] = $test;
            return view('admin.test.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function inserttest(Request $request){
        if(!empty($request->input('contents'))){
            $will_insert = [];
            foreach($request->input('contents') as $key => $value){
                array_push($will_insert, ['question_id' => $value,'package_id'=>Session::get('package_id')]);
            }
            Test::insert($will_insert);
        }else{
            $test = '';
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::findOrFail(Crypt::decrypt($id));
        if ($test ->delete()) {
            alert()->success('Success', 'Data Berhasil Dihapus');
        }
        return redirect('admin/test');
    }

    // public function destroy($id)
    // {
    //     $package = Test::findOrFail($id);
    //     if ($package->update(['status' => 'cancel'])) {
    //         alert()->success('Success','Data Berhasil Disimpan');
    //     } else {
    //         alert()->error('Error','Data Gagal Disimpan');
    //     }
    //     return redirect('instance/member');
    // }
}
