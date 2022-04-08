
{{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  --}}

        <form action="{{ route($model.'.store')}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('post')

        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Pemilik:</label>
            <input type="text" name="nama_pemilik" class="form-control" id="recipient-name">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">No Rekening:</label>
            <input type="number" class="form-control"  name="no_rekening" id="recipient-name">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Rekening:</label>
            <input type="text" name="nama_bank" class="form-control" id="recipient-name">
        </div>
        <div class="mb-3">
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
    </form>
    <script>
        var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var recipient = button.getAttribute('data-bs-whatever')
    var modalTitle = exampleModal.querySelector('.modal-title')
    var modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalTitle.textContent = 'Ubah fee ' + recipient + '% Ke '
    modalBodyInput.value = recipient
})
    </script>
