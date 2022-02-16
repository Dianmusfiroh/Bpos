<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProdukCreateRequest;
use App\Http\Requests\ProdukUpdateRequest;
use App\Repositories\ProdukRepository;
use App\Validators\ProdukValidator;

/**
 * Class ProduksController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProduksController extends Controller
{
    /**
     * @var ProdukRepository
     */
    protected $repository;

    /**
     * @var ProdukValidator
     */
    protected $validator;

    /**
     * ProduksController constructor.
     *
     * @param ProdukRepository $repository
     * @param ProdukValidator $validator
     */
    public function __construct(ProdukRepository $repository, ProdukValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $produks = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $produks,
            ]);
        }

        return view('produk.index', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProdukCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProdukCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $produk = $this->repository->create($request->all());

            $response = [
                'message' => 'Produk created.',
                'data'    => $produk->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $produk,
            ]);
        }

        return view('produks.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = $this->repository->find($id);

        return view('produks.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProdukUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProdukUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $produk = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Produk updated.',
                'data'    => $produk->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Produk deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Produk deleted.');
    }
}
