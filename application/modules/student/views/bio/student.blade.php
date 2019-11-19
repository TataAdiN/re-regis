@layout('template/main/student')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Form Biodata</h4>
    </div>
    <div class="card-body">
        <form method="POST" class="needs-validation" novalidate="">
            <div class="form-group">
                <label>Nomor Pendaftaran</label>
                <input type="number" class="form-control" value="{{ $biodata->student_no_daftar }}" disabled>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" value="{{ $biodata->student_nama }}" name="student_nama" required="">
                <div class="invalid-feedback">
                    Nama lengkap belum diisi
                </div>
            </div>
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" value="{{ $biodata->student_tmpt_lhr }}"  name="student_tmpt_lhr" required="">
                <div class="invalid-feedback">
                    Tempat Lahir belum diisi
                </div>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" value="{{ $biodata->student_tgl_lhr }}" name="student_tgl_lhr" required="">
                <div class="invalid-feedback">
                    Tanggal lahir belum diisi
                </div>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" required="">
                    <option value="">--- pilih jenis kelamin ---</option>
                    <option value="Laki - Laki" {{ $biodata->jenis_kelamin == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                    <option value="Perempuan" {{ $biodata->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    Jenis kelamin belum dipilih
                </div>
            </div>
            <div class="form-group">
                <label>Agama</label>
                <select class="form-control"  name="agama" required="">
                    <option value="">--- pilih Agama ---</option>
                    <option value="Islam" {{ $biodata->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen Protestan" {{ $biodata->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                    <option value="Katolik" {{ $biodata->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ $biodata->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ $biodata->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Kong Hu Cu" {{ $biodata->agama == 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu</option>
                </select>
                <div class="invalid-feedback">
                    Agama belum dipilih
                </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" value="{{ $biodata->student_alamat }}" name="student_alamat" required="">
                <div class="invalid-feedback">
                    Alamat belum diisi
                </div>
            </div>
            <div class="form-group">
                <label>Asal Sekolah</label>
                <input type="text" class="form-control" value="{{ $biodata->asal_sekolah }}"  name="asal_sekolah" required="">
                <div class="invalid-feedback">
                    Asal sekolah belum diisi
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection