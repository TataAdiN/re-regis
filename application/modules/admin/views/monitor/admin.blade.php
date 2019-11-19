@layout('template/dashboard/dashboard')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Daftar Pengguna</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nomor Pendaftaran</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tgl Lahir</th>
                            <th>Agama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($student as $s){
                        ?> 
                            <tr>
                                <td>{{$i}}</td>
                                <td><a href="{{base_url('admin/monitor/berkas/'.$s->student_id)}}">{{$s->student_no_daftar}}</a></td>
                                <td>{{$s->student_nama}}</td>
                                <td>{{$s->jenis_kelamin}}</td>
                                <td>{{$s->student_tmpt_lhr}}</td>
                                <td>{{$s->student_tgl_lhr}}</td>
                                <td>{{$s->agama}}</td>
                                <td></td>
                            </tr>
                        <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts-js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script> 
@endsection