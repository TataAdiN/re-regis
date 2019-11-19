@layout('template/dashboard/dashboard')

@section('content')
<div class="col-md-7">
    <div class="card">
        <div class="card-header">
            <h4>Daftar Berkas</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama Berkas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($berkas as $b){
                        ?> 
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$b->nama_berkas}}</td>
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
                <h4>Form Tambah Berkas</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Berkas</label>
                    <input type="text" class="form-control" name="nama_berkas" required="">
                    <div class="invalid-feedback">
                        Nama berkas belum diisi
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