@layout('template/dashboard/dashboard')

@section('content')
<div class="col-md-7">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($student as $s){
                        ?> 
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$s->student_no_daftar}}</td>
                                <td>{{$s->student_nama}}</td>
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
<div class="col-md-5">
    <div class="card">
        <form class="needs-validation" method="POST" novalidate="">
            <div class="card-header">
                <h4>Form Tambah Pengguna</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nomor Pendaftaran</label>
                    <input type="number" class="form-control" name="no_daftar" required="">
                    <div class="invalid-feedback">
                        Nomor pendaftaran belum diisi
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required="">
                    <div class="invalid-feedback">
                        Password belum diisi
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Tambah</button>
            </div>
        </form>
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