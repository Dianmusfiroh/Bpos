<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SellerCreateRequest;
use App\Http\Requests\SellerUpdateRequest;
use App\Repositories\SellerRepository;
use App\Repositories\AccountRepository;
use Illuminate\Support\Facades\DB;
use App\Validators\SellerValidator;

/**
 * Class SellersController.
 *
 * @package namespace App\Http\Controllers;
 */
class SellersController extends Controller
{
    /**
     * @var SellerRepository
     */
    protected $repository;
    private $modul;
    /**
     * @var SellerValidator
     */
    protected $validator;

    /**
     * SellersController constructor.
     *
     * @param SellerRepository $repository
     * @param SellerValidator $validator
     */
    public function __construct(SellerRepository $repository, SellerValidator $validator, AccountRepository $accountRepository  )
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->modul = 'seller';
        $this->accountRepository = $accountRepository;
        $this->acc = 'accaount';
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $sellers = $this->repository->all();
        $modul = $this->modul;
        $account = $this->accountRepository;
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $sellers,
            ]);
        }

         $acc = DB::select(DB::raw("SELECT *FROM t_setting s, t_user u WHERE s.id_user = u.id_user"));

        // dd($account);
        return view('seller.index', compact('sellers','modul','account','acc'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  SellerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SellerCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $seller = $this->repository->create($request->all());

            $response = [
                'message' => 'Seller created.',
                'data'    => $seller->toArray(),
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
    public function show($id_user)
    {
        $acc = DB::select(DB::raw("SELECT * FROM t_setting s, t_user u WHERE s.id_user = u.id_user and s.id_user = $id_user"));

        // $seller = $this->acc->find($id_user);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $acc,
            ]);
        }
// dd($acc);
        return view('seller.show', compact('acc'));
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
        $seller = $this->repository->find($id);

        return view('sellers.edit', compact('seller','acc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SellerUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SellerUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $seller = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Seller updated.',
                'data'    => $seller->toArray(),
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
                'message' => 'Seller deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Seller deleted.');
    }
}
