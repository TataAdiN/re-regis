@layout('template/dashboard/dashboard')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
        <?php 
            $i=1;
                foreach($berkas as $b){
            ?>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label>Foto Berkas</label><br/>
                        <img style="object-fit: cover;" src="{{base_url('image/'.$b->url_berkas)}}" width="250px" height="250px" id="fotoo{{$i}}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label>Berkas :  {{$b->nama_berkas}}</label><br/>
                        <a class="btn btn-info btn-rounded m-b-10 m-l-5" href="{{base_url('admin/monitor/unduh/'.$b->url_berkas)}}">Unduh Data</a>
                    </div>
                </div>
            <?php
                    $i++;
                }
            ?>
        </div>
    </div>
</div>
@endsection