@layout('template/main/student')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Unggah Berkas</h4>
    </div>
    <div class="card-body">
        <form method="POST" name="formUpload" enctype="multipart/form-data">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Foto Berkas</label><br/>
                    <img style="object-fit: cover;" src="" width="150px" height="150px" id="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Berkas : </label>
                    <input type="file" class="form-control" name="file" id="foto_profil" data-id="" onchange="gambar(this.value)">
                    <input style="float : right" type="submit" value="Unggah" class="btn btn-info btn-rounded m-b-10 m-l-5" />
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts-js')
<script>
	function gambar(val, id){
		$("#foto"+id).attr('src',URL.createObjectURL(event.target.files[0]));
	}
</script>
@endsection