<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TransaksiCreateRequest;
use App\Http\Requests\TransaksiUpdateRequest;
use App\Repositories\TransaksiRepository;
use App\Validators\TransaksiValidator;

/**
 * Class TransaksisController.
 *
 * @package namespace App\Http\Controllers;
 */
class TransaksisController extends Controller
{
    /**
     * @var TransaksiRepository
     */
    protected $repository;

    /**
     * @var TransaksiValidator
     */
    protected $validator;

    /**
     * TransaksisController constructor.
     *
     * @param TransaksiRepository $repository
     * @param TransaksiValidator $validator
     */
    public function __construct(TransaksiRepository $repository, TransaksiValidator $validator)
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
        $transaksis = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $transaksis,
            ]);
        }

        return view('transaksis.index', compact('transaksis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TransaksiCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TransaksiCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $transaksi = $this->repository->create($request->all());

            $response = [
                'message' => 'Transaksi created.',
                'data'    => $transaksi->toArray(),
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
        $transaksi = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $transaksi,
            ]);
        }

        return view('transaksis.show', compact('transaksi'));
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
        $transaksi = $this->repository->find($id);

        return view('transaksis.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TransaksiUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TransaksiUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $transaksi = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Transaksi updated.',
                'data'    => $transaksi->toArray(),
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
                'message' => 'Transaksi deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Transaksi deleted.');
    }
}
