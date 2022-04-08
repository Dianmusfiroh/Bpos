<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\DataBankCreateRequest;
use App\Http\Requests\DataBankUpdateRequest;
use App\Repositories\DataBankRepository;
use App\Validators\DataBankValidator;

/**
 * Class DataBanksController.
 *
 * @package namespace App\Http\Controllers;
 */
class DataBanksController extends Controller
{
    /**
     * @var DataBankRepository
     */
    protected $repository;

    /**
     * @var DataBankValidator
     */
    protected $validator;

    /**
     * DataBanksController constructor.
     *
     * @param DataBankRepository $repository
     * @param DataBankValidator $validator
     */
    public function __construct(DataBankRepository $repository, DataBankValidator $validator)
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
        $dataBanks = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $dataBanks,
            ]);
        }

        return view('dataBanks.index', compact('dataBanks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DataBankCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DataBankCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $dataBank = $this->repository->create($request->all());

            $response = [
                'message' => 'DataBank created.',
                'data'    => $dataBank->toArray(),
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
        $dataBank = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $dataBank,
            ]);
        }

        return view('dataBanks.show', compact('dataBank'));
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
        $dataBank = $this->repository->find($id);

        return view('dataBanks.edit', compact('dataBank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DataBankUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DataBankUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $dataBank = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'DataBank updated.',
                'data'    => $dataBank->toArray(),
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
                'message' => 'DataBank deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'DataBank deleted.');
    }
}
