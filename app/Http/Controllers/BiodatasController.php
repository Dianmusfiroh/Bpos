<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BiodataCreateRequest;
use App\Http\Requests\BiodataUpdateRequest;
use App\Repositories\BiodataRepository;
use App\Repositories\JenisUsahaRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

use App\Validators\BiodataValidator;
use App\Entities\User;
use App\Entities\Biodata;

/**
 * Class BiodatasController.
 *
 * @package namespace App\Http\Controllers;
 */
class BiodatasController extends Controller
{
    /**
     * @var BiodataRepository
     */
    protected $UserRepository;
    protected $repository;
    protected $modul;
    protected $JenisUsahaRepository;
    /**
     * @var BiodataValidator
     */
    protected $validator;

    /**
     * BiodatasController constructor.
     *
     * @param BiodataRepository $repository
     * @param BiodataValidator $validator
     */
    public function __construct(BiodataRepository $repository, BiodataValidator $validator,JenisUsahaRepository $JenisUsahaRepository
    , UserRepository $UserRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->modul = 'biodata';
        $this->UserRepo = $UserRepository;
        $this->JenisUsahaRepository= $JenisUsahaRepository;
        // $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $biodatas = $this->repository->all();
        $modul = $this->modul;
        // dd($modul);
        // $user = $this->user;
        $user = $this->UserRepository;
        $jenisUsaha = $this->JenisUsahaRepository->all();
        // $user = $this->user::class;
        // dd($biodatas);
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $biodatas,
            ]);
        }

        return view('biodata.add', compact('biodatas','jenisUsaha','modul','user'));
    }
    // public function create()
    // {
    //     $biodatas = $this->repository->all();
    //     $modul = $this->modul;
    //     $jenisUsaha = $this->JenisUsahaRepository->all();

    //     // $hotel = $this->repository->all();

    //     return view('biodata.add',compact('modul','biodatas','jenisUsaha'));

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BiodataCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BiodataCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            // $input= $request->all();
            // $input['id_biodata']= Auth::user()->id;
            // $user = $this->UserRepository;
            // $user = $this->UserRepository;
            
            // $bio = new Biodata;
            // $bio->id = $request->id;
            $bio = $this->repository->create($request->all());
            
            $user = new User;
            $user->id_biodata = $bio->id;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->nama_lengkap = $request->nama_lengkap;
            $user->no_hp = $request->no_hp;
            $user->level = $request->level;
            $user->save();

            // $input = $request->all();
            // $input->=
            // $biodatum = $this->repository->create($input);


            $response = [
                'message' => 'Biodata created.','user created.',
                'data'    => $bio->toArray(),
                            // $user->toArray(),
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
        $biodatum = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $biodatum,
            ]);
        }

        return view('biodatas.show', compact('biodatum'));
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
        $biodatum = $this->repository->find($id);

        return view('biodatas.edit', compact('biodatum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BiodataUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BiodataUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $biodatum = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Biodata updated.',
                'data'    => $biodatum->toArray(),
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
                'message' => 'Biodata deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Biodata deleted.');
    }
}
