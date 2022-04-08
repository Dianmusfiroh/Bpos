<?php

namespace App\Http\Controllers;

use App\Entities\StatusFee;
use App\Entities\Booth;
use App\Entities\Produk;
use App\Entities\Transaksi;
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
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

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
    private $model;
    protected $statusFeeRepository;
    protected $updatesQueryString = ['search'];
    // public $search;
    public $searchTerm;
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
        $this->model = 'booth';
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
        $model = $this->model;
        $searchTerm = '%'.$this->searchTerm.'%';
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $booths,
            ]);
        }

        // $data = DB::select(DB::raw('SELECT b.id_biodata , b.nama_toko nama, ju.jenis_usaha jenis_usaha,
        // b.alamat, b.email,b.no_hp, b.image,b.status_toko, b.nama_toko toko FROM `t_biodata`b, t_jenis_usaha ju
        // WHERE ju.id_jenis_usaha = b.id_jenis_usaha ORDER BY b.id_biodata'))->get()->paginate(5);

        $data = DB::table('t_biodata')
                ->where('nama_toko', 'like',$searchTerm )
                ->join('t_jenis_usaha','t_biodata.id_jenis_usaha','=','t_jenis_usaha.id_jenis_usaha')
                ->select('t_biodata.id_biodata','t_biodata.status_toko','t_biodata.nama_toko','t_jenis_usaha.jenis_usaha','t_biodata.alamat','t_biodata.email',
                't_biodata.no_hp','t_biodata.image','t_biodata.status_toko')->get();



        $statusFee = DB::select(DB::raw('SELECT s.id_status_bayar_fee id, b.nama_toko toko, s.bulan , s.tahun, s.status, s.jumlah_bayar,b.id_biodata
        FROM `t_status_bayar_fee` s, t_biodata b WHERE b.id_biodata = s.id_biodata  '));
        return view('booth.index', compact('statusFee','booths','model','data'));
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

        $produk = Produk::where('id_biodata', $id_biodata)->select('id_produk')->get();
        $pelanggan = Transaksi::where('id_biodata',$id_biodata)->select('id_transaksi')->get();
        $transaksi = DB::select(DB::raw("SELECT COUNT(id_biodata) jumlah,SUM(total_bayar) total FROM t_transaksi  WHERE id_biodata = $id_biodata GROUP BY id_biodata"));
        // dump($transaksi);
        $detail = DB::select(DB::raw("SELECT b.*,ju.jenis_usaha,u.nama_lengkap,MAX(s.bulan) AS bulan,MAX(s.tahun) AS tahun,s.jumlah_bayar,s.status FROM `t_biodata` b, t_jenis_usaha ju, t_user u,t_status_bayar_fee s WHERE b.id_biodata = u.id_biodata AND b.id_jenis_usaha = ju.id_jenis_usaha AND u.level = 'owner' AND b.id_biodata = s.id_biodata  AND b.id_biodata = $id_biodata order BY s.bulan DESC, s.tahun DESC"));

        // $detail = DB::select(DB::raw('SELECT * FROM `t_transaksi`  WHERE id_biodata = $id_biodata'));
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $detail,
            ]);
        }

        return view('booth.show', compact('detail','produk','transaksi','pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id_biodata)
    {
        $data = DB::select(DB::raw("SELECT s.id_status_bayar_fee id, b.nama_toko toko, s.bulan , s.tahun, s.status, s.jumlah_bayar,b.id_biodata
        FROM `t_status_bayar_fee` s, t_biodata b WHERE b.id_biodata = s.id_biodata AND s.id_biodata ='$id_biodata'"));

        // dd($data);
        return view('booth.detail', compact('data'));

        // $booth = $this->repository->find($id);

        // return view('booths.edit', compact('booth'));
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
    public function destroy($id_biodata)
    {
        $detail = DB::select(DB::raw("DELETE  FROM t_biodata where id_biodata = $id_biodata"));
        $produk = DB::select(DB::raw("DELETE  FROM t_produk where id_biodata = $id_biodata"));

        return redirect('booth/');
        // $deleted = $this->repository->delete($id);

        // if (request()->wantsJson()) {

        //     return response()->json([
        //         'message' => 'Booth deleted.',
        //         'deleted' => $deleted,
        //     ]);
        // }

        // return redirect()->back()->with('message', 'Booth deleted.');
    }
}
