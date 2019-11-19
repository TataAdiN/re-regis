@layout('template/main/student')

@section('content')
<div class="row">
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4>Unggah Berkas Pertama Kali</h4>
        </div>
        <div class="card-body">
            <?php 
            $i=1;
                foreach($berkas as $b){

            ?>
                <form method="POST" name="formUpload" enctype="multipart/form-data">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Foto Berkas</label><br/>
                            <img style="object-fit: cover;" src="{{base_url('img/holder.jpg')}}" width="150px" height="150px" id="foto{{$i}}">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Berkas :  {{$b->nama_berkas}}</label>
                            <input type="hidden" class="form-control" name="berkas_id" value="{{$b->berkas_id}}">
                            <input type="hidden" class="form-control" name="aksi" value="1">
                            <input type="file" accept=".jpg" class="form-control" name="file" id="foto_profil" data-id="" onchange="gambar(this.value, {{$i}})">
                            <?php
                                $disable = "";
                                foreach($berkasStudent as $c){
                                    if($b->berkas_id == $c->berkas_id){
                                        $disable = "disabled";
                                    }
                                }
                            ?>
                            <input style="float : right" type="submit" value="Unggah" class="btn btn-info btn-rounded m-b-10 m-l-5" {{$disable}}/>
                        </div>
                    </div>
                </form>
            <?php   
                    $i++;
                }
            ?>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4>Berkas yang sudah diunggah</h4>
        </div>
        <div class="card-body">
            <?php 
            $i=1;
                foreach($berkasStudent as $b){
            ?>
            <form method="POST" name="formUpload" enctype="multipart/form-data">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label>Foto Berkas</label><br/>
                        <img style="object-fit: cover;" src="{{base_url('image/'.$b->url_berkas)}}" width="150px" height="150px" id="fotoo{{$i}}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label>Berkas :  {{$b->nama_berkas}}</label>
                        <input type="hidden" class="form-control" name="student_berkas_id" value="{{$b->student_berkas_id}}">
                        <input type="hidden" class="form-control" name="berkas_id" value="{{$b->berkas_id}}">
                        <input type="hidden" class="form-control" name="aksi" value="2">
                        <input type="file" accept=".jpg" class="form-control" name="file" id="foto_profil" data-id="" onchange="gambar2(this.value, {{$i}})">
                        <input style="float : right" type="submit" value="Perbaharui" class="btn btn-info btn-rounded m-b-10 m-l-5" />
                    </div>
                </div>
            </form>
            <?php
                    $i++;
                }
            ?>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts-js')
<script>
	function gambar(val, id){
		$("#foto"+id).attr('src',URL.createObjectURL(event.target.files[0]));
	}
    function gambar2(val, id){
		$("#fotoo"+id).attr('src',URL.createObjectURL(event.target.files[0]));
	}
</script>
@endsection