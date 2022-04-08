@extends('layout.sidebar')
@include('layout.header')

<!doctype html>
                        <html>

                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <link href="{{ asset('assets/css/form.css?v=1.0')}}" rel="stylesheet" type="text/css" />

                                </head>
        <main class="main-wrap">

                <body class='snippet-body'>
                    <div class="container mt-5">
<div class="row d-flex justify-content-center align-items-center">
<div class="col-md-12">
<form id="regForm" action="{{ route($modul.'.store')}}" method="POST" class="form-input" enctype="multipart/form-data">
    @csrf
    {{--  @dump($modul)  --}}
    <h1 id="register">REGISTRATION</h1>
    <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span>  </div>
    <div class="tab">
        <div class="mb-4">
            <label for="nama_toko" class="form-label">Nama Toko</label>
            <input type="text" placeholder="Type here" oninput="this.className" name="nama_toko" class="form-control" id="nama_toko" />
        </div>
        <div class="mb-4">
            <label class="form-label" for="id_jenis_usaha">jenis Usaha</label>
            <select class="form-select" name="id_jenis_usaha" oninput="this.className" id="id_jenis_usaha" required>
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
    </div>

    <div class="tab">
        <div class="mb-4">
            <label for="username" class="form-label">Username</label>
            <br>
            <span>
            {{--  <i class="icon material-icons md-supervised_user_circle"></i>  --}}
        </span>
            <input type="text" placeholder="Type here" oninput="this.className = ''"  class="form-control" id="username" name="username" />
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" placeholder="Type here" oninput="this.className = ''"  class="form-control" id="password" name="password" />
        </div>
        <div class="mb-4">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" placeholder="Type here" oninput="this.className = ''"  class="form-control" id="nama_lengkap" name="nama_lengkap" />
        </div>
        <div class="mb-4">
            <label for="no_hp" class="form-label">No Hp</label>
            <input type="number" placeholder="Type here" oninput="this.className = ''"  class="form-control" id="no_hp" name="no_hp" />
        </div>
        <div class="mb-4">
            {{-- <label for="level" class="form-label">level</label> --}}
            <input type="text" placeholder="Type here" oninput="this.className = ''" value ="owner" hidden  class="form-control" id="level" name="level" />
        </div>

    </div>
    <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
        <h3>Thanks for your Registration!</h3>
    </div>
    <div style="overflow:auto;" id="nextprevious">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button"  id="nextBtn" onclick="nextPrev(1)">Next</button> </div>
    </div>
</form>
</div>
</div>
</div>
</main>
                    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>
                    <script type='text/javascript' src=''></script>
                    <script src="https://code.jquery.com/jquery-3.5.1.js"
                    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
                    <script type='text/javascript' src=''></script>
<script type='text/Javascript'>//your javascript goes here
var currentTab = 0;
document.addEventListener("DOMContentLoaded", function(event) {


showTab(currentTab);

});

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
document.getElementById("regForm").submit();
//return false;
//alert("sdf");
document.getElementById("nextprevious").style.display = "none";
document.getElementById("all-steps").style.display = "none";
document.getElementById("register").style.display = "none";
document.getElementById("text-message").style.display = "block";




}
showTab(currentTab);
}

function validateForm() {
var x, y, i, valid = true;
x = document.getElementsByClassName("tab");
y = x[currentTab].getElementsByTagName("input");
for (i = 0; i < y.length; i++) { if (y[i].value=="" ) { y[i].className +=" invalid" ; valid=false; } } if (valid) { document.getElementsByClassName("step")[currentTab].className +=" finish" ; } return valid; } function fixStepIndicator(n) { var i, x=document.getElementsByClassName("step"); for (i=0; i < x.length; i++) { x[i].className=x[i].className.replace(" active", "" ); } x[n].className +=" active" ; }</script>


<script>

</script>
</body>
</html>
