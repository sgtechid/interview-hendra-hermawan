<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Print Siswa PPDB</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    .page {
        width: 21cm;
        min-height: 33cm;
        padding-left: 2cm;
        padding-top: 2cm;
        padding-right: 2cm;
        padding-bottom: 2cm;
    }
    @page {
        size: A4 portrait;
        margin-left: 2cm;
        margin-top: 2cm;
        margin-right: 2cm;
        margin-bottom: 2cm;
    }
    table{
        /* border:1px solid #333; */
        border-collapse:collapse;
        padding: 8px;
        margin:0 auto;
    
    }
    th{
        padding: 5px;
        font-size: 9pt;
        /* border:1px solid #333; */

    } 
    td{
        padding: 5px;
        font-size: 10pt;
        /* border:1px solid #333; */

    }
    th{
        /* background-color: #f0f0f0; */
        text-align: left;
    }
    
    @media screen {
       
       { display: none;}
    
    }
    @media print {
    
        table { page-break-after:auto }
        tr    { page-break-inside:avoid; page-break-after:auto }
        td    { page-break-inside:avoid; page-break-after:auto }
        thead { display:table-header-group }
        tfoot { display:table-footer-group }
                
    }

    @page {
      margin: 20px 33px 40px 50px;
    }
</style>
</head>
<body>        
    <img src="{{ url('front/images/headerppdb.jpeg') }}" style="float:left;" width="100%" height="120" alt=""/>
    <h2 style="text-align: center;">
        FORMULIR PESERTA DIDIK BARU TP. @php echo  date("Y") @endphp/@php echo date('Y', strtotime('+1 year', strtotime( date("Y") ))); @endphp
    </h2>
    <table style="white-space: nowrap">
        <thead>
            <tr>
                <th>Nama Lengkap Peserta Didik</th>
                <td> &nbsp;: &nbsp; {{$data->nama}}</td>
            </tr>
            <tr>
                <th>Nisn</th>
                <td> &nbsp;: &nbsp; {{$data->nisn}}</td>
            </tr>
            <tr>
                <th>Nik</th>
                <td> &nbsp;: &nbsp; {{$data->nik}}</td>
            </tr>
            <tr>
                <th>Jenis Kelmanin</th>
                <td> &nbsp;: &nbsp; @if("Laki-Laki" == $data['jenis_kelamin'])
                        Laki-Laki 
                    @else
                        Perempuan
                    @endif
                </td>
            </tr>
            <tr>
                <th>Tempat Lahir Dan Tanggal Lahir</th> 
                <td> &nbsp;: &nbsp; {{$data->tempat_lahir}} / {{$data->tanggal_lahir}}</td>
            </tr>
            <tr>
                <th>Tinggi Badan / Berat Badan</th>
                <td> &nbsp;: &nbsp; {{$data->tinggi_badan}} / {{$data->berat_badan}}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td> &nbsp;: &nbsp; 
                    @if("Islam" == $data['agama']) 
                        Islam
                    @elseif("Kristen" == $data['agama']) 
                        Kristen
                    @elseif("Katolik" == $data['agama']) 
                        Katolik
                    @elseif("Hindu" == $data['agama'])
                        Hindu 
                    @elseif("Budha" == $data['agama']) 
                        Budha
                    @elseif("Konghucu" == $data['agama']) 
                        Konghucu
                    @else
                        Agama Tidak Di temukan
                    @endif

                </td>
            </tr>
            <tr>
                <th>Kewarganegaraan</th>
                <td> &nbsp;: &nbsp; {{$data->kewarganegaraan}}</td>
            </tr>
            <tr>
                <th>Jumlah Saudara</th>
                <td> &nbsp;: &nbsp; {{$data->jumlah_saudara}}</td>
            </tr>
            <tr>
                <th>Asal Sekolah Sebelumnya</th>
                <td> &nbsp;: &nbsp; {{$data->asal_sekolah}}</td>
            </tr>
                
            <tr>
                <th>Alamat Tempat Tinggal</th>
                <td> &nbsp;: &nbsp; {{$data->alamat_tinggal}}</td>
            </tr> 
            <tr>
                <th>Rt / Rw </th>
                <td> &nbsp;: &nbsp; {{$data->rt}} /{{$data->rw}}</td>
            </tr>
            <tr>
                <th>Desa/Kelurahan</th>
                <td> &nbsp;: &nbsp; {{$data->desa}}</td>
            </tr>
            <tr>
                <th>Kecmatan</th>
                <td> &nbsp;: &nbsp; {{$data->kecmatan}}</td>
            </tr>
            <tr>
                <th>Kabupaten/Kota</th>
                <td> &nbsp;: &nbsp; {{$data->kota}}</td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td> &nbsp;: &nbsp; {{$data->provinsi}}</td>
            </tr>
            <tr>
                <th>No Hp / No Wa</th>
                <td> &nbsp;: &nbsp; {{$data->nohp}}</td>
            </tr>
            <tr>
                <th>Jenis Tinggal</th>
                <td> &nbsp;: &nbsp; 
                    @if("Bersama Orang Tua" == $data['jenis_tinggal']) 
                        Bersama Orang Tua
                    @elseif("Bersama Wali" == $data['jenis_tinggal'])
                        Bersama Wali
                    @elseif("Asrama" == $data['jenis_tinggal']) 
                        Asrama
                    @else
                        Tidak Ada Data
                    @endif
                </td>
            </tr>
            <tr>
                <th>Jarak Tempat Tinggal Ke Sekolah</th>
                <td> &nbsp;: &nbsp; 
                    @if("Kurang Dari 1 Km" == $data['jarak_tempat'])
                        Kurang Dari 1 Km
                    @elseif("Lebih Dari 1 Km" == $data['jarak_tempat'])
                        Lebih Dari 1 Km
                    @else
                        Tidak Ada Data
                    @endif
                </td>
            </tr>
            <tr>
                <th>Alat Transportasi Kesekolah</th>
                <td> &nbsp;: &nbsp; 
                    @if("Jalan Kaki" == $data['alat_transportasi'])
                        Jalan Kaki
                    @elseif("Sepeda Motor" == $data['alat_transportasi'])
                        Sepeda Motor
                    @elseif("Kendaraan Umum" == $data['alat_transportasi'])
                        Kendaraan Umum
                    @else
                        Tidak Ada Data
                    @endif
                </td>
            </tr>
            <tr>
                <th>Riwayat Beasiswa</th>
                <td> &nbsp;: &nbsp; {{$data->riwayat_beasiswa}}</td>
            </tr>
            <tr>
                <th>Catatan Prestasi</th>
                <td> &nbsp;: &nbsp; {{$data->catatan_prestasi}}</td>
            </tr>
            <!-- NAMA AYAH -->
            <tr>
                <th>Nama Ayah Kandung / Tahun Lahir</th>
                <td> &nbsp;: &nbsp; {{$data->nama_ayah_kandung}} / {{$data->tahun_lahir_ayah}}</td>
            </tr>
            <tr>
                <th>Pendidikan Terakhir</th>
                <td> &nbsp;: &nbsp; 
                    @if("S3" == $data['pendidikan_terakhir_ayah']) 
                        S3
                    @elseif("S2" == $data['pendidikan_terakhir_ayah'])
                        S2
                    @elseif("S1/D4" == $data['pendidikan_terakhir_ayah'])   
                        S1/D4
                    @elseif("D3" == $data['pendidikan_terakhir_ayah'])
                        D3
                    @elseif("Smk" == $data['pendidikan_terakhir_ayah'])
                        SMK
                    @elseif("Smp" == $data['pendidikan_terakhir_ayah'])
                        SMP
                    @elseif("Sd" == $data['pendidikan_terakhir_ayah'])
                        SD
                    @elseif("Tidak Sekolah" == $data['pendidikan_terakhir_ayah'])
                        Tidak Sekolah
                    @else
                        Tidak Ada Data
                    @endif
                </td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td> &nbsp;: &nbsp; {{$data->pekerjaan}}</td>
            </tr>
            <tr>
                <th>Penghasilan Bulanan</th>
                <td> &nbsp;: &nbsp; Rp. {{$data->penghasilan_bulanan_ayah}}</td>
            </tr>
            <tr>
                <th>No Hp/ No Wa</th>
                <td> &nbsp;: &nbsp; {{$data->no_hp_ayah}}</td>
            </tr>

            <!-- NAMA IBU KANDUNG -->
            <tr>
                <th>Nama Ibu Kandung / Tahun Lahir</th>
                <td> &nbsp;: &nbsp; {{$data->nama_ibu_kandung}} / {{$data->tahun_lahir_ibu}}</td>
            </tr>
            <tr>
                <th>Pendidikan Terakhir</th>
                <td> &nbsp;: &nbsp; 
                    @if("S3" == $data['pendidikan_terakhir_ibu']) 
                        S3
                    @elseif("S2" == $data['pendidikan_terakhir_ibu'])
                        S2
                    @elseif("S1/D4" == $data['pendidikan_terakhir_ibu'])   
                        S1/D4
                    @elseif("D3" == $data['pendidikan_terakhir_ibu'])
                        D3
                    @elseif("Smk" == $data['pendidikan_terakhir_ibu'])
                        SMK
                    @elseif("Smp" == $data['pendidikan_terakhir_ibu'])
                        SMP
                    @elseif("Sd" == $data['pendidikan_terakhir_ibu'])
                        SD
                    @elseif("Tidak Sekolah" == $data['pendidikan_terakhir_ibu'])
                        Tidak Sekolah
                    @else
                        Tidak Ada Data
                    @endif
                </td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td> &nbsp;: &nbsp; {{$data->pekerjaan_ibu}}</td>
            </tr>
            <tr>
                <th>Penghasilan Bulanan</th>
                <td> &nbsp;: &nbsp; Rp. {{$data->penghasilan_ibu}}</td>
            </tr>
            <tr>
                <th>No Hp/ No Wa</th>
                <td> &nbsp;: &nbsp; {{$data->no_tlp_ibu}}</td>
            </tr>

            <!-- Nama Wali -->
            <tr>
                <th>Nama Wali / Tahun Lahir</th>
                <td> &nbsp;: &nbsp; {{$data->nama_wali}} / {{$data->tahun_lahir_wali}}</td>
            </tr>
            <tr>
                <th>Pendidikan Terakhir</th>
                <td> &nbsp;: &nbsp; 
                    @if("S3" == $data['pendidikan_terakhir_wali']) 
                        S3
                    @elseif("S2" == $data['pendidikan_terakhir_wali'])
                        S2
                    @elseif("S1/D4" == $data['pendidikan_terakhir_wali'])   
                        S1/D4
                    @elseif("D3" == $data['pendidikan_terakhir_wali'])
                        D3
                    @elseif("Smk" == $data['pendidikan_terakhir_wali'])
                        SMK
                    @elseif("Smp" == $data['pendidikan_terakhir_wali'])
                        SMP
                    @elseif("Sd" == $data['pendidikan_terakhir_wali'])
                        SD
                    @elseif("Tidak Sekolah" == $data['pendidikan_terakhir_wali'])
                        Tidak Sekolah
                    @else
                        Tidak Ada Data
                    @endif
                </td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td> &nbsp;: &nbsp; {{$data->pekerjaan_wali}}</td>
            </tr>
            <tr>
                <th>Penghasilan Bulanan</th>
                <td> &nbsp;: &nbsp; Rp. {{$data->penghasilan_wali}}</td>
            </tr>
            <tr>
                <th>No Hp/ No Wa</th>
                <td> &nbsp;: &nbsp; {{$data->no_tlp_wali}}</td>
            </tr>
            <tr>
                <th>Alamat Orang Tua/Wali</th>
                <td> &nbsp;: &nbsp; {{$data->alamat_orangtua_wali}}</td>
            </tr> 
            <tr>
                <th>Rt / Rw</th>
                <td> &nbsp;: &nbsp; {{$data->rt_ortu}} /{{$data->rw_ortu}}</td>
            </tr>
            <tr>
                <th>Desa/Kelurahan</th>
                <td> &nbsp;: &nbsp; {{$data->desa_ortu}}</td>
            </tr>
            <tr>
                <th>Kecmatan</th>
                <td> &nbsp;: &nbsp; {{$data->kecamatan_ortu}}</td>
            </tr>
            <tr>
                <th>Kabupaten/Kota</th>
                <td> &nbsp;: &nbsp; {{$data->kota_ortu}}</td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td> &nbsp;: &nbsp; {{$data->provinsi_ortu}}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><br></td>
                <td>Bandung,@php echo date("d-F-Y") @endphp</td>
            </tr>      
            <tr>
                <td>Orang Tua/Wali</td>
                <td><br></td>
                <td>Peserta Didik</td>
            </tr>
            <tr>
                <td> 
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                        (........................................ )
                </td>
                <td> &nbsp;</td>
                <td> 
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    (........................................ )
                </td>
                <td> &nbsp;</td>
            </tr>
        </thead>
    </table>    
</body>
</html>