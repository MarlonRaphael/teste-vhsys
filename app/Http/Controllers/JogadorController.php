<?php

namespace App\Http\Controllers;

use App\DataTables\JogadoresDataTable;
use App\Http\Requests\CreateJogadorRequest;
use App\Http\Requests\UpdateJogadorRequest;
use App\Models\Clube;
use App\Models\Jogador;
use Illuminate\Http\Request;

class JogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JogadoresDataTable $dataTable)
    {
        return $dataTable->render('admin.jogadores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jogadores.form')
            ->with([
                'action' => route('jogadores.store'),
                'clubes' => Clube::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateJogadorRequest $request)
    {
        $validated = $request->validated();

        if ($validated){

            $clube = Clube::findOrFail($request->clube_id);

            $jogador = new Jogador();

            $jogador->nome = $request->nome;
            $jogador->apelido = $request->apelido;
            $jogador->altura = $request->altura;
            $jogador->peso = $request->peso;
            $jogador->pe = $request->pe;
            $jogador->posicao = $request->posicao;
            $jogador->camisa = $request->camisa;
            $jogador->dt_nascimento = $request->dt_nascimento;
            $jogador->nacionalidade = $request->nacionalidade;
            $jogador->clube()->associate($clube);
            $jogador->save();

            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $jogador->addMedia($request->file('avatar'))
                    ->sanitizingFileName(function ($fileName) {
                        return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                    })
                    ->withResponsiveImages()
                    ->toMediaCollection('avatares', 'avatar');
            }

            return redirect()
                ->route('jogadores.index')
                ->withInput(['nome' => $request->nome]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function show(Jogador $jogador)
    {
        abort_if(!$jogador, 404);

        $jogador->load(['media', 'clube']);

        return view('admin.jogadores.show')
            ->with(['jogador' => $jogador]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Jogador $jogador
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Jogador $jogador)
    {
        abort_if(!$jogador, 404);

        $action = route('jogadores.update', $jogador);

        $jogador->load(['clube', 'media']);

        return view('admin.jogadores.form')
            ->with([
                'jogador' => $jogador,
                'clubes' => Clube::all(),
                'action' => $action
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateJogadorRequest $request
     * @param Jogador $jogador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateJogadorRequest $request, Jogador $jogador)
    {
        abort_if(!$jogador, 404);

        $validated = $request->validated();

        if ($validated){

            $clube = Clube::find($request->clube_id);

            $jogador->update([
                'nome' => $request->nome,
                'apelido' => $request->apelido,
                'altura' => $request->altura,
                'peso' => $request->peso,
                'pe' => $request->pe,
                'posicao' => $request->posicao,
                'dt_nascimento' => $request->dt_nascimento,
                'nacionalidade' => $request->nacionalidade,
            ]);

            $jogador->clube()->associate($clube);

            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $jogador->addMedia($request->file('avatar'))
                    ->sanitizingFileName(function ($fileName) {
                        return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                    })
                    ->withResponsiveImages()
                    ->toMediaCollection('avatares', 'avatar');
            }

            return redirect()
                ->route('jogadores.index')
                ->withInput(['nome' => $request->nome]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jogador $jogador)
    {
        abort_if(!$jogador, 404);

        try{
            $jogador->delete();
        } catch (\Exception $e){
            echo $e->getMessage();
        }

        return back();

    }
}
