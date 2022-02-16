
$(document).ready(function(){
    $(".simpan").click(function(){
        var data = $('.form-input').serialize();
        $.ajax({
            type: "POST",
            url:{{ url('biodata/store', []) }},

            data: data,
            success: function(){
                window.location.href = "{{url('biodata')}}";
            }
        })
    });
    });


    <body  class='snippet-body'>
    <div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-12">
            <form id="regForm">
                <h1 id="register">Registrasi</h1>
                <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span></div>

                <div class="tab">
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
                    {{--  <div class="mb-4">  --}}
                        {{--  <label class="form-label" for="status_toko">Status Toko</label>  --}}
                        <input type="hidden" name="status_toko" id="status_toko" oninput="this.className" hidden="true">
                        {{--  <select class="form-select" name="status_toko" id="status_toko" oninput="this.className" required>  --}}
                            {{-- <option selected> Pilih Kategori </option> --}}
                            {{-- @foreach ($jenisUsaha as $item) --}}
                                {{--  <option value="0">noaktif</option>
                                <option value="1">Aktif</option>  --}}
                            {{-- @endforeach --}}
                        {{--  </selct>  --}}
                    {{--  </div>  --}}
                    {{-- <p><input placeholder="First Name" oninput="this.className = ''" name="first"></p>
                    <p><input placeholder="Last Name" oninput="this.className = ''" name="last"></p>
                    <p><input placeholder="Email" oninput="this.className = ''" name="email"></p>
                    <p><input placeholder="Phone" oninput="this.className = ''" name="phone"></p>
                    <p><input placeholder="Street Address" oninput="this.className = ''" name="address"></p>
                    <p><input placeholder="City" oninput="this.className = ''" name="city"></p>
                    <p><input placeholder="State" oninput="this.className = ''" name="state"></p>
                    <p><input placeholder="Country" oninput="this.className = ''" name="country"></p> --}}
                </div>
                <div class="tab">
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <br>
                        <span>
                        <i class="icon material-icons md-supervised_user_circle"></i>
                    </span>
                        <input type="text" placeholder="Type here" oninput="this.className = ''"  class="form-control" id="username" name="username" />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" placeholder="Type here" oninput="this.className = ''"  class="form-control" id="password" name="password" />
                    </div>
                    {{-- <p><input placeholder="CVV" oninput="this.className = ''" name="phone"></p> --}}
                </div>
                <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                    <div id="tampilan"></div>
                    <h3>Thanks for your Registration!</h3>
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;"> <button class="simpan" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> </div>
                </div>
            </form>
        </div>
    </div>
</div>

//SCRIPT BARU

<body  class='snippet-body'>
    <div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-12">
            <form id="regForm">
                <h1 id="register">Registrasi</h1>
                <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span></div>

                <div class="tab">
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
                    {{--  <div class="mb-4">  --}}
                        {{--  <label class="form-label" for="status_toko">Status Toko</label>  --}}
                        <input type="hidden" name="status_toko" id="status_toko" oninput="this.className" hidden="true">
                        {{--  <select class="form-select" name="status_toko" id="status_toko" oninput="this.className" required>  --}}
                            {{-- <option selected> Pilih Kategori </option> --}}
                            {{-- @foreach ($jenisUsaha as $item) --}}
                                {{--  <option value="0">noaktif</option>
                                <option value="1">Aktif</option>  --}}
                            {{-- @endforeach --}}
                        {{--  </selct>  --}}
                    {{--  </div>  --}}
                    {{-- <p><input placeholder="First Name" oninput="this.className = ''" name="first"></p>
                    <p><input placeholder="Last Name" oninput="this.className = ''" name="last"></p>
                    <p><input placeholder="Email" oninput="this.className = ''" name="email"></p>
                    <p><input placeholder="Phone" oninput="this.className = ''" name="phone"></p>
                    <p><input placeholder="Street Address" oninput="this.className = ''" name="address"></p>
                    <p><input placeholder="City" oninput="this.className = ''" name="city"></p>
                    <p><input placeholder="State" oninput="this.className = ''" name="state"></p>
                    <p><input placeholder="Country" oninput="this.className = ''" name="country"></p> --}}
                </div>
                <div class="tab">
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <br>
                        <span>
                        <i class="icon material-icons md-supervised_user_circle"></i>
                    </span>
                        <input type="text" placeholder="Type here" oninput="this.className = ''"  class="form-control" id="username" name="username" />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" placeholder="Type here" oninput="this.className = ''"  class="form-control" id="password" name="password" />
                    </div>
                    {{-- <p><input placeholder="CVV" oninput="this.className = ''" name="phone"></p> --}}
                </div>
                <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                    <div id="tampilan"></div>
                    <h3>Thanks for your Registration!</h3>
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;"> <button class="simpan" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> </div>
                </div>
            </form>
        </div>
    </div>
</div>
</main>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/Javascript'>//your javascript goes here
var currentTab = 0;
document.addEventListener("DOMContentLoaded", function(event) {


showTab(currentTab);

});
var alamat = document.getElementById("alamat");
var tamp = document.getElementById("tampilan");

function showTab(n) {
var x = document.getElementsByClassName("tab");

x[n].style.display = "block";
if (n == 0) {
document.getElementById("prevBtn").style.display = "none";
} else {
document.getElementById("prevBtn").style.display = "inline";
}
if (n == (x.length - 1)) {
document.getElementById("nextBtn").innerHTML = "Submit";
} else {
document.getElementById("nextBtn").innerHTML = "Next";
}
fixStepIndicator(n)
}

function nextPrev(n) {
var x = document.getElementsByClassName("tab");

if (n == 1 && !validateForm()) return false;
x[currentTab].style.display = "none";
currentTab = currentTab + n;
if (currentTab >= x.length) {
// document.getElementById("regForm").submit();
// return false;
//alert("sdf");

document.getElementById("nextprevious").style.display = "none";
document.getElementById("all-steps").style.display = "none";
document.getElementById("register").style.display = "none";
document.getElementById("text-message").style.display = "block";




}
showTab(currentTab);
}

function kirim() {
tamp.innerText = alamat.value;
console
}

function validateForm() {
var x, y, i, valid = true;
x = document.getElementsByClassName("tab");
y = x[currentTab].getElementsByTagName("input");
for (i = 0; i < y.length; i++) { if (y[i].value=="" ) { y[i].className +=" invalid" ; valid=false; } } if (valid) { document.getElementsByClassName("step")[currentTab].className +=" finish" ; } return valid; } function fixStepIndicator(n) { var i, x=document.getElementsByClassName("step"); for (i=0; i < x.length; i++) { x[i].className=x[i].className.replace(" active", "" ); } x[n].className +=" active" ; }</script>

$(document).ready(function(){
    $(".simpan").click(function(){
        var data = $('.form-input').serialize();
        $.ajax({
            type: "POST",
            url:{{ url('biodata/store', []) }},

            data: data,
            success: function(){
                window.location.href = "{{url('biodata')}}";
            }
        })
    });
    });


                                </body>
                            </html>
