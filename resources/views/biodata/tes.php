<div class="row">
    <div class="col-9">
        <div class="content-header">
            <h2 class="content-title">Form Registrasi</h2>
            <div>
                {{-- <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button> --}}
            </div>
            {{-- @section('form-save') --}}
             <form action="{{ route($modul.'.store')}}" method="POST" enctype="multipart/form-data"j
            {{-- @endsection --}}
            @csrf
        </div>
    </div>
    <div class="col-lg-16">
        <div class="card mb-4">
            {{-- <div class="card-header"> --}}
                <div class="all-steps" id="all-steps"> </span> <span class="step"></span> <span class="step"></span> </div>

            {{-- </div> --}}
            <div class="tab">
            <div class="card-body">
                <form>
                    <div class="mb-4">
                        <label for="nama_toko" class="form-label">Nama Toko</label>
                        <input type="text" placeholder="Type here" oninput="this.className" name="nama_toko" class="form-control" id="nama_toko" />
                    </div>
                    {{-- <div class="form-group row">
                        <label for="formation_category_id" class="label col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select name="formation_category_id" id="formation_category_id" class="custom-select mt-2" required>
                                <option selected>Pilih Kategori</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="mb-4">
                        <label class="form-label" for="id_jenis_usaha">jenis Usaha</label>
                        <select class="form-select" name="id_jenis_usaha" oninput="this.className" id="id_jenis_usaha" required>
                            {{-- <option selected> Pilih Kategori </option> --}}
                            @foreach ($jenisUsaha as $item)
                                <option value="{{ $item->id_jenis_usaha}}" oninput="this.className">{{$item->jenis_usaha}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Alamat</label>
                        <textarea placeholder="Type here" name="alamat" oninput="this.className" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" placeholder="Type here" oninput="this.className" name="email" class="form-control" id="email" />
                    </div>
                    <div class="mb-4">
                        <label for="no_hp" class="form-label">No Hp</label>
                        <input type="number" placeholder="Type here" oninput="this.className" class="form-control" id="no_hp" name="no_hp" />
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="status_toko">Status Toko</label>
                        <select class="form-select" name="status_toko" id="status_toko" oninput="this.className" required>
                            {{-- <option selected> Pilih Kategori </option> --}}
                            {{-- @foreach ($jenisUsaha as $item) --}}
                                <option value="0">Tidak Aktif</option>
                                <option value="1">Aktif</option>
                            {{-- @endforeach --}}
                        </select>
                    </div>
                    {{-- <div class="input-upload">
                    <img src="assets/imgs/theme/upload.svg" alt="" />
                    <input class="form-control" name="image" type="file" />
                </div> --}}
                <br></div></div>
                <div class="tab">
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="number" placeholder="Type here" class="form-control" id="username" name="username" />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" placeholder="Type here" class="form-control" id="password" name="password" />
                    </div>
                </div>
                    {{-- <button class="btn btn-md  rounded font-sm hover-up" class="left" type="submit">Next</button> --}}
                    {{-- <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                        <h3>Thanks for your Donation!</h3> <span>Your donation has been entered! We will contact you shortly!</span>
                    </div> --}}
                    <div style="overflow:auto;" id="nextprevious">
                        <div style="float:right;" class="btn btn-md  rounded font-sm hover-up"> <button  id="prevBtn" onclick="nextPrev(-1)">Previous</button> <button  id="nextBtn" onclick="nextPrev(1)">Next</button> </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
