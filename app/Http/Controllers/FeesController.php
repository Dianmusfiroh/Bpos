<?php

namespace App\Http\Controllers;

use App\Entities\AdminBank;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Entities\Fee;
use App\Entities\Produk;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\FeeCreateRequest;
use App\Http\Requests\AdminBankCreateRequest;
use App\Http\Requests\FeeUpdateRequest;
use App\Repositories\DataBankRepository;
use App\Repositories\AdminBankRepository;
use App\Repositories\FeeRepository;
use App\Validators\FeeValidator;
use Illuminate\Support\Facades\DB;
use DebugBar\DebugBar;
use phpDocumentor\Reflection\Location;
// use PDF;
use Barryvdh\DomPDF\Facade as PDF;

/**
 * Class FeesController.
 *
 * @package namespace App\Http\Controllers;
 */
class FeesController extends Controller
{
    /**
     * @var FeeRepository
     */
    protected $repository;
    public $model;
    public $modelA;
    protected $adminBankRepo;


    /**
     * @var FeeValidator
     */
    protected $validator;

    /**
     * FeesController constructor.
     *
     * @param FeeRepository $repository
     * @param FeeValidator $validator
     */
    public function __construct(FeeRepository $repository,
    FeeValidator $validator,
    DataBankRepository $dataBankRepo,
     AdminBankRepository $adminBankRepo)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->dataBankRepo = $dataBankRepo;
        $this->adminBankRepo = $adminBankRepo;
        $this->model = 'fee';
        $this->modelA = 'adminBank';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $fees = $this->repository->all();
        // dd($fees);
        //
        $adminBank = DB::select(DB::raw('SELECT *  FROM t_admin_bank'));

        // dump($adminBank);
        // $detail = DB::select(DB::raw('SELECT s.id_status_bayar_fee,b.nama_toko,b.no_hp,u.nama_lengkap,f.fee, s.id_biodata, max(bulan) AS bulan,
        // s.tahun,s.status,CONCAT(FORMAT(MAX(jumlah_bayar) , 2)) AS jumlah, u.level FROM t_status_bayar_fee s ,t_fee f, t_user u , t_biodata b
        // WHERE u.id_biodata = s.id_biodata AND s.id_biodata = b.id_biodata GROUP by s.id_biodata'));
        $modelA = $this->modelA;
        $model = $this->model;

        $detailLengkap = DB::select(DB::raw('SELECT b.id_biodata , b.nama_toko nama, ju.jenis_usaha jenis_usaha,
        b.alamat, b.email,b.no_hp, b.image,b.status_toko, b.nama_toko toko FROM `t_biodata`b, t_jenis_usaha ju
        WHERE ju.id_jenis_usaha = b.id_jenis_usaha ORDER BY b.id_biodata'));
        $data = DB::select(DB::raw('SELECT t.id_biodata,u.nama_lengkap, b.nama_toko, t.fee FROM `t_transaksi` t, t_user u , t_biodata b WHERE t.id_user = u.id_user AND t.id_biodata = b.id_biodata'));
        $no = 1;
        // dump($detailLengkap);
        // $strBulan =
        $detail = DB::table('t_status_bayar_fee')
                    ->crossJoin('t_fee')
                    ->join('t_biodata','t_biodata.id_biodata','=','t_status_bayar_fee.id_biodata')
                    ->JOIN('t_user','t_status_bayar_fee.id_biodata','=','t_user.id_biodata')
                    ->select('t_status_bayar_fee.id_status_bayar_fee','t_biodata.nama_toko','t_biodata.no_hp','t_user.nama_lengkap',
                    't_status_bayar_fee.id_biodata','t_fee.fee', 't_status_bayar_fee.bulan',
                    't_status_bayar_fee.tahun','t_status_bayar_fee.status', DB::raw('CONCAT(FORMAT(MAX(jumlah_bayar) , 2)) AS jumlah_bayar') )
                    ->groupBy('t_status_bayar_fee.id_biodata')
                    ->get();
                    // ->where('t_user.id_biodata','=','t_status_bayar_fee.id_biodata') AND  ('t_status_bayar.id_biodata','=','t_biodata.id_biodata')
                    ;
        // foreach ($detail as $key => $item) {
        //     if ($item->bulan == '01') {
        //         $strBulan = "Januari";
        //     } elseif ($item->bulan == '2'){
        //         $strBulan = "Februari";
        //     }elseif ($item->bulan == '3'){
        //         $strBulan = "Maret";
        //     }elseif ($item->bulan == '4'){
        //         $strBulan = "April";
        //     }elseif ($item->bulan == '5'){
        //         $strBulan = "Mei";
        //     }elseif ($item->bulan == '6'){
        //         $strBulan = "Juni";
        //     }elseif ($item->bulan == '7'){
        //         $strBulan = "Juli";
        //     }elseif ($item->bulan == '8'){
        //         $strBulan = "Agustus";
        //     }elseif ($item->bulan == '9'){
        //         $strBulan = "September";
        //     }elseif ($item->bulan == '10'){
        //         $strBulan = "Oktober";
        //     }elseif ($item->bulan == '11'){
        //         $strBulan = "November";
        //     }elseif ($item->bulan == '12'){
        //         $strBulan = "Desember";
        //     }
            // foreach ($adminBank AS $bank) {
            //     // $message = "Halo%20{$item->nama_lengkap}Owner%20Dari%20Booth%{$item->nama_toko}%20Berikut%20Tagihan%20pembayaran%20BPOS%20Anda%20Untuk%20Bulan%20{$strBulan}-{$item->tahun}%20Sebesar%20Rp.%20{$item->jumlah_bayar}%0A%0ASilahkan%20Lakukan%20Pembayaran%20Ke%20Rekening%20Berikut:%0A{$bank->nama_bank}";
            //     $message = "Halo%20%20Berikut:%0A{$bank->nama_bank}";

            // }

        // }

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $fees,
            ]);
        }

        return view('fee.index', compact('fees','modelA','adminBank','no','model','data','detail','detailLengkap'));
    }
    public function downloadPdf($id_biodata)
    {
        $detail = DB::select(DB::raw("SELECT s.id_status_bayar_fee,b.nama_toko,b.no_hp,b.alamat,u.nama_lengkap,f.fee, s.id_biodata, max(bulan) AS bulan,s.tahun,s.status,max(jumlah_bayar) AS jumlah, u.level FROM t_status_bayar_fee s ,t_fee f, t_user u , t_biodata b WHERE u.id_biodata = s.id_biodata AND s.id_biodata = b.id_biodata AND s.id_biodata = '$id_biodata' GROUP by s.id_biodata"));

        $pdf = PDF::loadView('fee.show',compact('detail'))->setPaper('L', 'portrait');
        return $pdf->stream('fee.show');
    }
    public function create(){
        $dataBank = $this->dataBankRepo->all();

        $model = $this->model;

        return view('fee.bank', compact('model','dataBank'));
    }
    // public function addBank(Request $request){
	// DB::table('t_admin_bank')->insert([
	// 	'nama_pemilik' => $request->nama_pemilik,
	// 	'no_rekening' => $request->no_rekening,
	// 	'nama_bank' => $request->nama_bank
	// ]);
	// return redirect('/fee');
    // }
    // public function create(){
    //     $fees = $this->repository->all();
    //     $model = $this->model;

    //     return view('fee.add', compact('fees','model'));
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  FeeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */

    public function store(AdminBankCreateRequest $request)
    {
        try{
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

        $adminBank = $this->adminBankRepo->create($request->all());

            // $fee = $this->repository->create($request->all());
            // $input = $requewertyust->all();

            // Log::info($input);

            // return response()->json(['success'=>'Got Simple Ajax Request.']);
            $response = [
                'message' => 'Fee created.',
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id_biodata)
    {
        // $fee = $this->repository->find($id);
        $detail = DB::select(DB::raw("SELECT s.id_status_bayar_fee,b.nama_toko,b.no_hp,b.alamat,u.nama_lengkap,f.fee, s.id_biodata, max(bulan) AS bulan,s.tahun,s.status,max(jumlah_bayar) AS jumlah, u.level FROM t_status_bayar_fee s ,t_fee f, t_user u , t_biodata b WHERE u.id_biodata = s.id_biodata AND s.id_biodata = b.id_biodata AND s.id_biodata = '$id_biodata' GROUP by s.id_biodata"));

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $detail,
            ]);
        }

        return view('fee.show', compact('detail'));
    }

    public function send($id_biodata)
    {
        $detail = DB::select(DB::raw("SELECT s.id_status_bayar_fee,b.nama_toko,b.alamat,u.nama_lengkap,f.fee, s.id_biodata, max(bulan) AS bulan,s.tahun,s.status,max(jumlah_bayar) AS jumlah, u.level FROM t_status_bayar_fee s ,t_fee f, t_user u , t_biodata b WHERE u.id_biodata = s.id_biodata AND s.id_biodata = b.id_biodata AND s.id_biodata = '$id_biodata' GROUP by s.id_biodata"));
        // return Location:http://api.wha;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id_fee)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $fees = $this->repository->all();
        $edit = Fee::findOrFail($id_fee);
        // $fee = $this->repository->findById($id_fee);
        $model = $this->model;
        // dd($model);

        return view('fee.add', compact('edit','model','fees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FeeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(FeeUpdateRequest $request, $id_fee)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $fee = $this->repository->update($request->all(), $id_fee);

            $response = [
                'message' => 'Fee updated.',
                'data'    => $fee->toArray(),
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


    /**p
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_admin_bank)
    {
        $detail = DB::select(DB::raw("DELETE  FROM t_admin_bank where id_admin_bank = $id_admin_bank"));

        return redirect('fee/');
        // $deleted = $this->adminBankRepo->delete($id_admin_bank);
        // dump($deleted);
        // if (request()->wantsJson()) {

        //     return response()->json([
        //         'message' => 'Wisata deleted.',
        //         'deleted' => $deleted,
        //     ]);
        // }

        // return redirect()->back()->with('message', 'Wisata deleted.');
    }
}
