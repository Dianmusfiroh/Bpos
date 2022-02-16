<?php

namespace App\Http\Controllers;

use App\Entities\StatusFee;
use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BoothCreateRequest;
use App\Http\Requests\BoothUpdateRequest;
use App\Repositories\BoothRepository;
use App\Repositories\StatusFeeRepository;
use App\Validators\BoothValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class BoothsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BoothsController extends Controller
{
    /**
     * @var BoothRepository
     */
    protected $repository;
    private $modul;
    protected $statusFeeRepository;
    /**
     * @var BoothValidator
     */
    protected $validator;

    /**
     * BoothsController constructor.
     *
     * @param BoothRepository $repository
     * @param BoothValidator $validator
     */
    public function __construct(BoothRepository $repository, BoothValidator $validator, StatusFeeRepository $statusFeeRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->statusFeeRepository = $statusFeeRepository;
        $this->modul = 'booth';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $booths = $this->repository->all();
        $modul = $this->modul;

        // $statusFee = $this->statusFeeRepository->all();
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $booths,
            ]);
        }
        $statusFee = DB::select(DB::raw('SELECT s.id_status_bayar_fee , b.nama_toko , s.bulan , s.tahun, s.status, s.jumlah_bayar FROM `t_status_bayar_fee` s, t_biodata b WHERE b.id_biodata = s.id_biodata '));
        $data = DB::select(DB::raw('SELECT b.id_biodata id, b.nama_toko nama, ju.jenis_usaha jenis_usaha, b.alamat, b.email,b.no_hp, b.image,b.status_toko FROM `t_biodata`b, t_jenis_usaha ju WHERE ju.id_jenis_usaha = b. id_jenis_usaha'));
        // dd($booths);
        return view('booth.index', compact('statusFee','booths','modul','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BoothCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BoothCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $booth = $this->repository->create($request->all());

            $response = [
                'message' => 'Booth created.',
                'data'    => $booth->toArray(),
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
    public function show($id_biodata)
    {

//        $booth = $this->repository->find($id_biodata);
        $detail = DB::select(DB::raw("SELECT * FROM t_transaksi WHERE id_biodata = $id_biodata"));
        // dd($detail);

        // $detail = DB::select(DB::raw('SELECT * FROM `t_transaksi`  WHERE id_biodata = $id_biodata'));
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $detail,
            ]);
        }

        return view('booth.show', compact('detail'));
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
        $booth = $this->repository->find($id);

        return view('booths.edit', compact('booth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BoothUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BoothUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $booth = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Booth updated.',
                'data'    => $booth->toArray(),
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
                'message' => 'Booth deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Booth deleted.');
    }
}
