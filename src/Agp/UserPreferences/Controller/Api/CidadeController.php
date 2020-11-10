<?php
/**
 *
 * Data e hora: 2020-09-23 09:39:57
 * Controller/Api gerada automaticamente
 *
 */


namespace Agp\UserPreferences\Controller\Api;


use Controller\Controller;
use Facades\Model\Repository\CidadeRepository;
use Facades\Model\Service\CidadeService;
use Illuminate\Http\Request;
use Model\Entity\Cidade;
use Model\Resource\CidadeResource;


class CidadeController extends Controller
{
    public function index()
    {
        return CidadeResource::collection(CidadeRepository::getList());
    }
    public function store(Request $request, Cidade $cidade)
    {
        $this->validate($request, $cidade->getRules());
        $cidade->sync($request->all());
        CidadeService::store($cidade);
        return new CidadeResource($cidade);
    }

    public function update(Request $request, Cidade $cidade)
    {
        $this->validate($request, $cidade->getRules());
        $cidade->sync($request->all());
        CidadeService::update($cidade);
        return new CidadeResource($cidade);
    }

    public function destroy(Cidade $cidade)
    {
        CidadeService::destroy($cidade);
        return response()->json();
    }
}
