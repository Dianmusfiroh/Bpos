<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\JenisUsahaCreateRequest;
use App\Http\Requests\JenisUsahaUpdateRequest;
use App\Repositories\JenisUsahaRepository;
use App\Validators\JenisUsahaValidator;

/**
 * Class JenisUsahasController.
 *
 * @package namespace App\Http\Controllers;
 */
class JenisUsahasController extends Controller
{
    /**
     * @var JenisUsahaRepository
     */
    protected $repository;

    /**
     * @var JenisUsahaValidator
     */
    protected $validator;

    /**
     * JenisUsahasController constructor.
     *
     * @param JenisUsahaRepository $repository
     * @param JenisUsahaValidator $validator
     */
    public function __construct(JenisUsahaRepository $repository, JenisUsahaValidator $validator)
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
        $jenisUsahas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $jenisUsahas,
            ]);
        }

        return view('jenisUsahas.index', compact('jenisUsahas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  JenisUsahaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(JenisUsahaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $jenisUsaha = $this->repository->create($request->all());

            $response = [
                'message' => 'JenisUsaha created.',
                'data'    => $jenisUsaha->toArray(),
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
        $jenisUsaha = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $jenisUsaha,
            ]);
        }

        return view('jenisUsahas.show', compact('jenisUsaha'));
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
        $jenisUsaha = $this->repository->find($id);

        return view('jenisUsahas.edit', compact('jenisUsaha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  JenisUsahaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(JenisUsahaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $jenisUsaha = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'JenisUsaha updated.',
                'data'    => $jenisUsaha->toArray(),
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
                'message' => 'JenisUsaha deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'JenisUsaha deleted.');
    }
}
