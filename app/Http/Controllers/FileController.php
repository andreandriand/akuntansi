<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Response;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Http\Requests\DownloadFileRequest;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();

        return view('berkas.index', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berkas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {

        $file = $request->validate(
            [
                'file_laporan' => 'mimes:pdf,xlsx,xls,doc,docx',
            ]
        );

        $file['file_laporan'] = $request->file('file_laporan')->storeAs('laporan', $request->file('file_laporan')->getClientOriginalName(), 'local');

        File::create([
            'name' => $request->file('file_laporan')->getClientOriginalName(),
            'path' => $file['file_laporan'],
        ]);

        return (redirect()->route('file.create'))->with('success', 'File Berhasil Diupload');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileRequest  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        File::destroy($file->id);
        $path = $file->path;
        $newPath = str_replace('/', '\\', $path);
        unlink(storage_path('app\\' . $newPath));
        return redirect()->route('file.index')->with('success', 'File Berhasil Dihapus');
    }


    /**
     * Download the specified resource.
     *
     * @param  \App\Http\Requests\DownloadFileRequest  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */

    public function download(DownloadFileRequest $request, File $file)
    {
        $path = str_replace('/', '\\', $request->path);
        return response()->download(storage_path('app\\' . $path), $request->name);
    }

    public function downloadTemplate()
    {
        return response()->download(storage_path('file\template\Format.xlsx', 'Format.xlsx'));
    }
}
