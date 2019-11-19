@layout('template/main/student')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Upload Scan Berkas</h4>
    </div>
    <div class="card-body">
        <?php
        $i = 1;
        foreach ($berkas as $b) {
            echo "<h5>" . $i . ". " . $b->nama_berkas . "</h5>";
            $i++;
        }
        ?>
        <br />
        Semua dalam bentuk scan dengan ekstensi .jpg
    </div>
    <div class="card-footer bg-whitesmoke">
        Batas Upload, 20 Agustus 2020
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Pengumpulan Berkas Fisik</h4>
    </div>
    <div class="card-body">
        <p>Berkas fisik dikumpulkan beserta surat pernyataan di Kemahasiswaan, gedung ABC Pembangunan</p>
    </div>
    <div class="card-footer bg-whitesmoke">
        Batas Pengumpulan Berkas Fisik, 5 September 2020
    </div>
</div>
@endsection