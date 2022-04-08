<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AdminBankCreateRequest;
use App\Http\Requests\AdminBankUpdateRequest;
use App\Repositories\AdminBankRepository;
use App\Validators\AdminBankValidator;

/**
 * Class AdminBanksController.
 *
 * @package namespace App\Http\Controllers;
 */
class AdminBanksController extends Controller
{
    /**
     * @var AdminBankRepository
     */
    protected $repository;

    /**
     * @var AdminBankValidator
     */
    protected $validator;

    /**
     * AdminBanksController constructor.
     *
     * @param AdminBankRepository $repository
     * @param AdminBankValidator $validator
     */
    public function __construct(AdminBankRepository $repository, AdminBankValidator $validator)
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
        $adminBanks = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $adminBanks,
            ]);
        }

        return view('fee.bank', compact('adminBanks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdminBankCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AdminBankCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $adminBank = $this->repository->create($request->all());

            $response = [
                'message' => 'AdminBank created.',
                'data'    => $adminBank->toArray(),
            ];

            return view('fee');
            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        }
         catch (ValidatorException $e) {
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
        $adminBank = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $adminBank,
            ]);
        }

        return view('adminBanks.show', compact('adminBank'));
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
        $adminBank = $this->repository->find($id);

        return view('adminBanks.edit', compact('adminBank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdminBankUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AdminBankUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $adminBank = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'AdminBank updated.',
                'data'    => $adminBank->toArray(),
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
                'message' => 'AdminBank deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'AdminBank deleted.');
    }
}
