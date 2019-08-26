<?php

namespace App\Http\Controllers;

use App\DataTables\ClubesDataTables;
use App\Http\Requests\CreateClubeRequest;
use App\Http\Requests\UpdateClubeRequest;
use App\Models\Clube;

class ClubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClubesDataTables $dataTable)
    {
        return $dataTable->render('admin.clubes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clubes.form')
            ->with(['action' => route('clubes.store')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClubeRequest $request)
    {
        $validated = $request->validated();

        if ($validated){

            $clube = new Clube();

            $clube->nome = $request->nome;
            $clube->apelido = $request->apelido;
            $clube->mascote = $request->mascote;
            $clube->estadio = $request->estadio;
            $clube->fundacao = $request->fundacao;
            $clube->save();

            if ($request->hasFile('escudo') && $request->file('escudo')->isValid()) {
                $clube->addMedia($request->file('escudo'))
                    ->sanitizingFileName(function ($fileName) {
                        return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                    })
                    ->withResponsiveImages()
                    ->toMediaCollection('escudos', 'escudo');
            }

            return redirect()
                ->route('clubes.index')
                ->withInput(['nome' => $request->nome]);

        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clube  $clube
     * @return \Illuminate\Http\Response
     */
    public function show(Clube $clube)
    {
        abort_if(!$clube, 404);

        $clube->load(['media', 'jogadores']);

        if ($clube){
            return view('admin.clubes.show')
                ->with(['clube' => $clube]);
        }

        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clube  $clube
     * @return \Illuminate\Http\Response
     */
    public function edit(Clube $clube)
    {
        abort_if(!$clube, 404);

        $clube->load(['media', 'jogadores']);

        if ($clube){
            return view('admin.clubes.form')
                ->with([
                    'clube'=> $clube,
                    'action' => route('clubes.update', $clube)
                ]);
        }

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClubeRequest $request
     * @param Clube $clube
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateClubeRequest $request, Clube $clube)
    {
        abort_if(!$clube, 404);

        $validated = $request->validated();

        if ($validated){

            $clube->nome = $request->nome;
            $clube->apelido = $request->apelido;
            $clube->mascote = $request->mascote;
            $clube->estadio = $request->estadio;
            $clube->fundacao = $request->fundacao;
            $clube->save();

            if ($request->hasFile('escudo') && $request->file('escudo')->isValid()) {
                $clube->addMedia($request->file('escudo'))
                    ->sanitizingFileName(function ($fileName) {
                        return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                    })
                    ->withResponsiveImages()
                    ->toMediaCollection('escudos', 'escudo');
            }

            return redirect()
                ->route('clubes.index')
                ->withInput(['nome' => $request->nome]);

        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clube  $clube
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clube $clube)
    {
        //
    }
}
