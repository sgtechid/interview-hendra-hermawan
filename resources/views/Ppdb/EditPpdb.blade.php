@extends('layouts_admin.app_admin')
@section('styles')
<!-- DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <style>
        sup {
            vertical-align: super;
            font-size: 15px;
        }
        .select2-hidden-accessible {
            border: 0 !important;
            clip: rect(0 0 0 0) !important;
            height: 1px !important;
            margin: -1px !important;
            overflow: hidden !important;
            padding: 0 !important;
            position: absolute !important;
            width: 1px !important
        }

      

        .select2-container--default .select2-selection--single,
        .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0;
            padding: 6px 12px;
            height: 34px
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 28px;
            user-select: none;
            -webkit-user-select: none
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-right: 10px
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 0;
            padding-right: 0;
            height: auto;
            margin-top: -3px
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 28px
        }

        .select2-container--default .select2-selection--single,
        .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0 !important;
            padding: 6px 12px;
            height: 40px !important
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 6px !important;
            right: 1px;
            width: 20px
        }
</style>
@endsection
@section('content_admin') 
    <div class="main-content-inner">
        <!-- sales report area start -->
        <div class="sales-report-area mt-5 mb-5">
            <div class="col-12">
                <figure class="circle-bg">
                    <img src="{{url('front/images/headerppdb.png') }}"  alt="Image" class="img-fluid">
                </figure>
                <div class="card">
                    <div class="card-body">
                        <h3>Tanda <sup style="color: red">*</sup> Wajib Diisi</h3>
                        <br>
                        <form action="{{ url('/update_ppdb') }}" method="POST">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}">
                                            <label for="nama" class="col-lg-6 control-label">Nama Lengkap Peserta Didik<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap" maxlength="50" required="" value="{{$data->nama}}">
                                            @if($errors->has('nama'))
                                                <span class="help-block">{{$errors->first('nama')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('nisn') ? ' has-error' : ''}}">
                                            <label for="nisn" class="col-lg-3 control-label">Nisn<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="nisn" readonly name="nisn" placeholder="Masukan Nisn" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="12" required="" value="{{$data->nisn}}">
                                            @if($errors->has('nisn'))
                                                <span class="help-block">{{$errors->first('nisn')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('nik') ? ' has-error' : ''}}">
                                            <label for="nik" class="col-lg-3 control-label">Nik<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan nik" readonly onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="16" required="" value="{{$data->nik}}">
                                            @if($errors->has('nik'))
                                                <span class="help-block">{{$errors->first('nik')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
                                            <label for="jenis_kelamin" class="col-lg-3 control-label">Jenis Kelamin<sup style="color: red">*</sup></label>
                                            <select class="form-control form-control-lg" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-Laki" @if("Laki-Laki" == $data['jenis_kelamin']) selected='selected' @endif>Laki-Laki</option>
                                                <option value="Perempuan" @if("Perempuan" == $data['jenis_kelamin']) selected='selected' @endif>Perempuan</option>
                                            </select>
                                            @if($errors->has('jenis_kelamin'))
                                                <span class="alert-message">{{$errors->first('jenis_kelamin')}}</span>
                                            @endif
                                        </div>
                                    </div>   
                                </div>  
                            </div>
                        
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('tempat_lahir')  ? ' has-error' : ''}}">
                                            <label for="tempat_lahir" class="col-lg-3 control-label">Tempat Lahir<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan Tempat Lahir"  required="" value="{{$data->tempat_lahir}}">
                                            @if($errors->has('tempat_lahir'))
                                                <span class="help-block">{{$errors->first('tempat_lahir')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                        <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('tanggal_lahir')  ? ' has-error' : ''}}">
                                        <label for="tempat_lahir" class="col-lg-3 control-label">Tanggal Lahir<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir"  required="" value="{{$data->tanggal_lahir}}">
                                            @if($errors->has('tanggal_lahir'))
                                                <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                        <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('tinggi_badan')  ? ' has-error' : ''}}">
                                            <label for="tinggi_badan" class="col-lg-3 control-label">Tinggi Badan<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" maxlength="10" placeholder="Masukan Tinggi Badan"  required="" value="{{$data->tinggi_badan}}">
                                            @if($errors->has('tinggi_badan'))
                                                <span class="help-block">{{$errors->first('tinggi_badan')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('berat_badan')  ? ' has-error' : ''}}">
                                            <label for="berat_badan" class="col-lg-3 control-label">Berat Badan<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="berat_badan" name="berat_badan" maxlength="10" placeholder="Masukan Berat Badan"  required="" value="{{$data->berat_badan}}">
                                            @if($errors->has('berat_badan'))
                                                <span class="help-block">{{$errors->first('berat_badan')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('agama') ? ' has-error' : ''}}">
                                            <label for="agama" class="col-lg-3 control-label">Agama<sup style="color: red">*</sup></label>
                                            <select class="form-control form-control-lg" id="agama" name="agama" required>
                                                <option value="">Pilih Agama</option>
                                                <option value="Islam" @if("Islam" == $data['agama']) selected='selected' @endif>Islam</option>
                                                <option value="Kristen" @if("Kristen" == $data['agama']) selected='selected' @endif>Kristen</option>
                                                <option value="Katolik" @if("Katolik" == $data['agama']) selected='selected' @endif>Katolik</option>
                                                <option value="Hindu" @if("Hindu" == $data['agama']) selected='selected' @endif>Hindu</option>
                                                <option value="Budha"@if("Budha" == $data['agama']) selected='selected' @endif>Budha</option>
                                                <option value="Konghucu" @if("Konghucu" == $data['agama']) selected='selected' @endif>Konghucu</option>
                                            </select>
                                            @if($errors->has('agama'))
                                                <span class="alert-message">{{$errors->first('agama')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('kewarganegaraan')  ? ' has-error' : ''}}">
                                            <label for="kewarganegaraan" class="col-lg-5 control-label">Kewarganegaraan<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="Masukan kewarganegaraan"  required="" value="{{$data->kewarganegaraan}}">
                                            @if($errors->has('kewarganegaraan'))
                                                <span class="help-block">{{$errors->first('kewarganegaraan')}}</span>
                                            @endif
                                        </div>
                                    </div>  
                                </div>  
                            </div>

                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                        <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('jumlah_saudara')  ? ' has-error' : ''}}">
                                            <label for="jumlah_saudara" class="col-lg-5 control-label">Jumlah Saudara<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="jumlah_saudara" name="jumlah_saudara" placeholder="Masukan Jumlah Saudara"  required="" value="{{$data->jumlah_saudara}}">
                                            @if($errors->has('jumlah_saudara'))
                                                <span class="help-block">{{$errors->first('jumlah_saudara')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('asal_sekolah')  ? ' has-error' : ''}}">
                                            <label for="asal_sekolah" class="col-lg-6 control-label">Asal Sekolah Sebelumnya<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Masukan Asal Sekolah Sebelumnya"  required="" value="{{$data->asal_sekolah}}">
                                            @if($errors->has('asal_sekolah'))
                                                <span class="help-block">{{$errors->first('asal_sekolah')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('alamat_tinggal')  ? ' has-error' : ''}}">
                                            <label for="alamat_tinggal" class="col-lg-6 control-label">Alamat Tempat Tinggal<sup style="color: red">*</sup></label>
                                            <textarea class="form-control" id="alamat_tinggal" rows="4" cols="50" name="alamat_tinggal" placeholder="Masukan Alamat tempat Tinggal"  required="">
                                                {{$data->alamat_tinggal}}
                                            </textarea>
                                            @if($errors->has('alamat_tinggal'))
                                                <span class="help-block">{{$errors->first('alamat_tinggal')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-6 my-1">
                                                <label for="rt" class="col-lg-6 control-label">Rt<sup style="color: red">*</sup></label>
                                                <div class="form-group{{$errors->has('rt')  ? ' has-error' : ''}}">
                                                    <input type="text" class="form-control" id="rt" name="rt" placeholder="Contoh 002"  onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="10" required="" value="{{$data->rt}}">
                                                    @if($errors->has('rt'))
                                                        <span class="help-block">{{$errors->first('rt')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6 my-1">
                                                <label for="rw" class="col-lg-6 control-label">rw<sup style="color: red">*</sup></label>
                                                <div class="form-group{{$errors->has('rw')  ? ' has-error' : ''}}">
                                                    <input type="text" class="form-control" id="rw" name="rw" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="3" placeholder="Contoh 001" required="" value="{{$data->rw}}">
                                                    @if($errors->has('rw'))
                                                        <span class="help-block">{{$errors->first('rw')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('desa')  ? ' has-error' : ''}}">
                                            <label for="desa" class="col-lg-5 control-label">Desa/Kelurahan<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="desa" name="desa" placeholder="Masukan Desa/Kelurahan"  required="" value="{{$data->desa}}">
                                            @if($errors->has('desa'))
                                                <span class="help-block">{{$errors->first('desa')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('kecamatan')  ? ' has-error' : ''}}">
                                            <label for="kecamatan" class="col-lg-6 control-label">Kecamatan<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Masukan Kecamatan"  required="" value="{{$data->kecamatan}}">
                                            @if($errors->has('kecamatan'))
                                                <span class="help-block">{{$errors->first('kecamatan')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('kota')  ? ' has-error' : ''}}">
                                            <label for="kota" class="col-lg-5 control-label">Kabupaten/Kota<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="kota" name="kota" placeholder="Masukan Kabupaten/Kota"  required="" value="{{$data->kota}}">
                                            @if($errors->has('kota'))
                                                <span class="help-block">{{$errors->first('kota')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('provinsi')  ? ' has-error' : ''}}">
                                            <label for="provinsi" class="col-lg-6 control-label">Provinsi<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Masukan provinsi"  required="" value="{{$data->provinsi}}">
                                            @if($errors->has('provinsi'))
                                                <span class="help-block">{{$errors->first('provinsi')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('no_hp')  ? ' has-error' : ''}}">
                                            <label for="no_hp" class="col-lg-5 control-label">No Hp / No Wa<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="12" placeholder="Contoh 083812321234"  required="" value="{{$data->no_hp}}">
                                            @if($errors->has('no_hp'))
                                                <span class="help-block">{{$errors->first('no_hp')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('jenis_tinggal') ? ' has-error' : ''}}">
                                            <label for="jenis_tinggal" class="col-lg-3 control-label">Jenis Tinggal<sup style="color: red">*</sup></label>
                                            <select class="form-control form-control-lg" id="jenis_tinggal" name="jenis_tinggal" required>
                                            <option value="">Pilih Jenis Tinggal</option>
                                                <option value="Bersama Orang Tua" @if("Bersama Orang Tua" == $data['jenis_tinggal']) selected='selected' @endif>Bersama Orang Tua</option>
                                                <option value="Bersama Wali" @if("Bersama Wali" == $data['jenis_tinggal']) selected='selected' @endif>Bersama Wali</option>
                                                <option value="Asrama" @if("Asrama" == $data['jenis_tinggal']) selected='selected' @endif>Asrama</option>
                                            </select>
                                            @if($errors->has('jenis_tinggal'))
                                                <span class="alert-message">{{$errors->first('jenis_tinggal')}}</span>
                                            @endif
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('jarak_tempat') ? ' has-error' : ''}}">
                                            <label for="jarak_tempat" class="col-lg-6 control-label">Jarak Tempat Tinggal Ke Sekolah<sup style="color: red">*</sup></label>
                                            <select class="form-control form-control-lg" id="jarak_tempat" name="jarak_tempat" required>
                                            <option value="">Pilih Jarak Tempat Tinggal Ke Sekolah</option>
                                                <option value="Kurang Dari 1 Km" @if("Kurang Dari 1 Km" == $data['jarak_tempat']) selected='selected' @endif>Kurang Dari 1 Km</option>
                                                <option value="Lebih Dari 1 Km" @if("Lebih Dari 1 Km" == $data['jarak_tempat']) selected='selected' @endif>Lebih Dari 1 Km</option>
                                            </select>
                                            @if($errors->has('jarak_tempat'))
                                                <span class="alert-message">{{$errors->first('jarak_tempat')}}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('alat_transportasi') ? ' has-error' : ''}}">
                                            <label for="alat_transportasi" class="col-lg-6 control-label">Alat Transportasi Kesekolah<sup style="color: red">*</sup></label>
                                            <select class="form-control form-control-lg" id="alat_transportasi" name="alat_transportasi" required>
                                            <option value="">Pilih Alat Transportasi Kesekolah</option>
                                                <option value="Jalan Kaki" @if("Jalan Kaki" == $data['alat_transportasi']) selected='selected' @endif>Jalan Kaki</option>
                                                <option value="Sepeda Motor" @if("Sepeda Motor" == $data['alat_transportasi']) selected='selected' @endif>Sepeda Motor</option>
                                                <option value="Kendaraan Umum" @if("Kendaraan Umum" == $data['alat_transportasi']) selected='selected' @endif>Kendaraan Umum</option>
                                            </select>
                                            @if($errors->has('alat_transportasi'))
                                                <span class="alert-message">{{$errors->first('alat_transportasi')}}</span>
                                            @endif
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('riwayat_beasiswa')  ? ' has-error' : ''}}">
                                            <label for="riwayat_beasiswa" class="col-lg-6 control-label">Riwayat Beasiswa</label>
                                            <textarea class="form-control" id="riwayat_beasiswa" rows="4" cols="50" name="riwayat_beasiswa" placeholder="Masukan Riwayat Beasiswa"  required="">
                                            {{$data->riwayat_beasiswa}}
                                            </textarea>
                                            @if($errors->has('riwayat_beasiswa'))
                                                <span class="help-block">{{$errors->first('riwayat_beasiswa')}}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('catatan_prestasi')  ? ' has-error' : ''}}">
                                            <label for="catatan_prestasi" class="col-lg-6 control-label">Catatan Prestasi</label>
                                            <textarea class="form-control" id="catatan_prestasi" rows="4" cols="50" name="catatan_prestasi" placeholder="Masukan Catatan Prestasi"  required="" >
                                            {{$data->catatan_prestasi}}
                                            </textarea>
                                            @if($errors->has('catatan_prestasi'))
                                                <span class="help-block">{{$errors->first('catatan_prestasi')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3><b>Ayah Kandung</b></h3>
                            <br>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('nama_ayah_kandung')  ? ' has-error' : ''}}">
                                            <label for="nama_ayah_kandung" class="col-lg-6 control-label">Nama Ayah Kandung</label>
                                            <input type="text" class="form-control" id="nama_ayah_kandung" name="nama_ayah_kandung" placeholder="Masukan Nama Ayah Kandung"  value="{{$data->nama_ayah_kandung}}">
                                            @if($errors->has('nama_ayah_kandung'))
                                                <span class="help-block">{{$errors->first('nama_ayah_kandung')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('tahun_lahir_ayah')  ? ' has-error' : ''}}">
                                            <label for="tahun_lahir_ayah" class="col-lg-5 control-label">Tahun Lahir</label>
                                            <input type="text" class="form-control" id="tahun_lahir_ayah" name="tahun_lahir_ayah" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="3" placeholder="Contoh 1980"  value="{{$data->tahun_lahir_ayah}}">
                                            @if($errors->has('tahun_lahir_ayah'))
                                                <span class="help-block">{{$errors->first('tahun_lahir_ayah')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('pendidikan_terakhir_ayah') ? ' has-error' : ''}}">
                                            <label for="pendidikan_terakhir_ayah" class="col-lg-6 control-label">Pendidikan Terakhir</label>
                                            <select class="form-control form-control-lg" id="pendidikan_terakhir_ayah" name="pendidikan_terakhir_ayah" required>
                                            <option value="">Pilih Pendidikan Terakhir</option>
                                                <option value="S3" @if("S3" == $data['pendidikan_terakhir_ayah']) selected='selected' @endif>S3</option>
                                                <option value="S2" @if("S2" == $data['pendidikan_terakhir_ayah']) selected='selected' @endif>S2</option>
                                                <option value="S1/D4" @if("S1/D4" == $data['pendidikan_terakhir_ayah']) selected='selected' @endif>S1/D4</option>
                                                <option value="D3" @if("D3" == $data['pendidikan_terakhir_ayah']) selected='selected' @endif>D3</option>
                                                <option value="Smk" @if("Smk" == $data['pendidikan_terakhir_ayah']) selected='selected' @endif>Smk</option>
                                                <option value="Smp" @if("Smp" == $data['pendidikan_terakhir_ayah']) selected='selected' @endif>Smp</option>
                                                <option value="Sd" @if("Sd" == $data['pendidikan_terakhir_ayah']) selected='selected' @endif>Sd</option>
                                                <option value="Tidak Sekolah" @if("Tidak Sekolah" == $data['pendidikan_terakhir_ayah']) selected='selected' @endif>Tidak Sekolah</option>
                                            </select>
                                            @if($errors->has('pendidikan_terakhir_ayah'))
                                                <span class="alert-message">{{$errors->first('pendidikan_terakhir_ayah')}}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('pekerjaan')  ? ' has-error' : ''}}">
                                            <label for="pekerjaan" class="col-lg-5 control-label">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukan Pekerjaan"  value="{{$data->pekerjaan}}">
                                            @if($errors->has('pekerjaan'))
                                                <span class="help-block">{{$errors->first('pekerjaan')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('penghasilan_bulanan_ayah')  ? ' has-error' : ''}}">
                                            <label for="penghasilan_bulanan_ayah" class="col-lg-6 control-label">Penghasilan Bulanan</label>
                                            <input type="text" class="form-control" id="penghasilan_bulanan_ayah" name="penghasilan_bulanan_ayah"  placeholder="Masukan Penghasilan Bulanan"  value="{{$data->penghasilan_bulanan_ayah}}">
                                            @if($errors->has('penghasilan_bulanan_ayah'))
                                                <span class="help-block">{{$errors->first('penghasilan_bulanan_ayah')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('no_hp_ayah')  ? ' has-error' : ''}}">
                                            <label for="no_hp_ayah" class="col-lg-5 control-label">No Hp/ No Wa</label>
                                            <input type="text" class="form-control" id="no_hp_ayah" name="no_hp_ayah" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="12" placeholder="Contoh 082727271980"  value="{{$data->no_hp_ayah}}">
                                            @if($errors->has('no_hp_ayah'))
                                                <span class="help-block">{{$errors->first('no_hp_ayah')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3><b>Ibu Kandung</b></h3>
                            <br>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('nama_ibu_kandung')  ? ' has-error' : ''}}">
                                            <label for="nama_ibu_kandung" class="col-lg-6 control-label">Nama Ibu Kandung</label>
                                            <input type="text" class="form-control" id="nama_ibu_kandung" name="nama_ibu_kandung" placeholder="Masukan Nama Ibu Kandung"  value="{{$data->nama_ibu_kandung}}">
                                            @if($errors->has('nama_ibu_kandung'))
                                                <span class="help-block">{{$errors->first('nama_ibu_kandung')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('tahun_lahir_ibu')  ? ' has-error' : ''}}">
                                            <label for="tahun_lahir_ibu" class="col-lg-5 control-label">Tahun Lahir</label>
                                            <input type="text" class="form-control" id="tahun_lahir_ibu" name="tahun_lahir_ibu" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="3" placeholder="Contoh 1980"  value="{{$data->tahun_lahir_ibu}}">
                                            @if($errors->has('tahun_lahir_ibu'))
                                                <span class="help-block">{{$errors->first('tahun_lahir_ibu')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('pendidikan_terakhir_ibu') ? ' has-error' : ''}}">
                                            <label for="pendidikan_terakhir_ibu" class="col-lg-6 control-label">Pendidikan Terakhir</label>
                                            <select class="form-control form-control-lg" id="pendidikan_terakhir_ibu" name="pendidikan_terakhir_ibu" required>
                                            <option value="">Pilih Pendidikan Terakhir</option>
                                                <option value="S3" @if("S3" == $data['pendidikan_terakhir_ibu']) selected='selected' @endif>S3</option>
                                                <option value="S2" @if("S2" == $data['pendidikan_terakhir_ibu']) selected='selected' @endif>S2</option>
                                                <option value="S1/D4" @if("S1/D4" == $data['pendidikan_terakhir_ibu']) selected='selected' @endif>S1/D4</option>
                                                <option value="D3" @if("D3" == $data['pendidikan_terakhir_ibu']) selected='selected' @endif>D3</option>
                                                <option value="Smk" @if("Smk" == $data['pendidikan_terakhir_ibu']) selected='selected' @endif>Smk</option>
                                                <option value="Smp" @if("Smp" == $data['pendidikan_terakhir_ibu']) selected='selected' @endif>Smp</option>
                                                <option value="Sd" @if("Sd" == $data['pendidikan_terakhir_ibu']) selected='selected' @endif>Sd</option>
                                                <option value="Tidak Sekolah" @if("Tidak Sekolah" == $data['pendidikan_terakhir_ibu']) selected='selected' @endif>Tidak Sekolah</option>
                                            </select>
                                            @if($errors->has('pendidikan_terakhir_ibu'))
                                                <span class="alert-message">{{$errors->first('pendidikan_terakhir_ibu')}}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('pekerjaan_ibu')  ? ' has-error' : ''}}">
                                            <label for="pekerjaan_ibu" class="col-lg-5 control-label">Pekerjaan </label>
                                            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Masukan Pekerjaan"  value="{{$data->pekerjaan_ibu}}">
                                            @if($errors->has('pekerjaan_ibu'))
                                                <span class="help-block">{{$errors->first('pekerjaan_ibu')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('penghasilan_ibu')  ? ' has-error' : ''}}">
                                            <label for="penghasilan_ibu" class="col-lg-6 control-label">Penghasilan Bulanan</label>
                                            <input type="text" class="form-control" id="penghasilan_ibu" name="penghasilan_ibu"  placeholder="Masukan Penghasilan Bulanan"  value="{{$data->penghasilan_ibu}}" >
                                            @if($errors->has('penghasilan_ibu'))
                                                <span class="help-block">{{$errors->first('penghasilan_ibu')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('no_tlp_ibu')  ? ' has-error' : ''}}">
                                            <label for="no_tlp_ibu" class="col-lg-5 control-label">No Hp/ No Wa</label>
                                            <input type="text" class="form-control" id="no_tlp_ibu" name="no_tlp_ibu" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="12" placeholder="Contoh 082727271980"  value="{{$data->no_tlp_ibu}}">
                                            @if($errors->has('no_tlp_ibu'))
                                                <span class="help-block">{{$errors->first('no_tlp_ibu')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3><b>Wali</b></h3>
                            <br>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('nama_wali')  ? ' has-error' : ''}}">
                                            <label for="nama_wali" class="col-lg-6 control-label">Nama Wali</label>
                                            <input type="text" class="form-control" id="nama_wali" name="nama_wali" placeholder="Masukan Nama Wali"  value="{{$data->nama_wali}}">
                                            @if($errors->has('nama_wali'))
                                                <span class="help-block">{{$errors->first('nama_wali')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('tahun_lahir_wali')  ? ' has-error' : ''}}">
                                            <label for="tahun_lahir_wali" class="col-lg-5 control-label">Tahun Lahir</label>
                                            <input type="text" class="form-control" id="tahun_lahir_wali" name="tahun_lahir_wali" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="3" placeholder="Contoh 1980"  value="{{$data->tahun_lahir_wali}}">
                                            @if($errors->has('tahun_lahir_wali'))
                                                <span class="help-block">{{$errors->first('tahun_lahir_wali')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('pendidikan_terakhir_wali') ? ' has-error' : ''}}">
                                            <label for="pendidikan_terakhir_wali" class="col-lg-6 control-label">Pendidikan Terakhir</label>
                                            <select class="form-control form-control-lg" id="pendidikan_terakhir_wali" name="pendidikan_terakhir_wali" required>
                                            <option value="">Pilih Pendidikan Terakhir</option>
                                                <option value="S3" @if("S3" == $data['pendidikan_terakhir_wali']) selected='selected' @endif>S3</option>
                                                <option value="S2" @if("S2" == $data['pendidikan_terakhir_wali']) selected='selected' @endif>S2</option>
                                                <option value="S1/D4" @if("S1/D4" == $data['pendidikan_terakhir_wali']) selected='selected' @endif>S1/D4</option>
                                                <option value="D3" @if("D3" == $data['pendidikan_terakhir_wali']) selected='selected' @endif>D3</option>
                                                <option value="Smk" @if("Smk" == $data['pendidikan_terakhir_wali']) selected='selected' @endif>Smk</option>
                                                <option value="Smp" @if("Smp" == $data['pendidikan_terakhir_wali']) selected='selected' @endif>Smp</option>
                                                <option value="Sd" @if("Sd" == $data['pendidikan_terakhir_wali']) selected='selected' @endif>Sd</option>
                                                <option value="Tidak Sekolah" @if("Tidak Sekolah" == $data['pendidikan_terakhir_wali']) selected='selected' @endif>Tidak Sekolah</option>
                                            </select>
                                            @if($errors->has('pendidikan_terakhir_wali'))
                                                <span class="alert-message">{{$errors->first('pendidikan_terakhir_wali')}}</span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('pekerjaan_wali')  ? ' has-error' : ''}}">
                                            <label for="pekerjaan_wali" class="col-lg-5 control-label">pekerjaan_wali</label>
                                            <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" placeholder="Masukan pekerjaan_wali"  value="{{$data->pekerjaan_wali}}">
                                            @if($errors->has('pekerjaan_wali'))
                                                <span class="help-block">{{$errors->first('pekerjaan_wali')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('penghasilan_wali')  ? ' has-error' : ''}}">
                                            <label for="penghasilan_wali" class="col-lg-6 control-label">Penghasilan Bulanan</label>
                                            <input type="text" class="form-control" id="penghasilan_wali" name="penghasilan_wali" placeholder="Masukan Penghasilan Bulanan"  value="{{$data->penghasilan_wali}}">
                                            @if($errors->has('penghasilan_wali'))
                                                <span class="help-block">{{$errors->first('penghasilan_wali')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('no_tlp_wali')  ? ' has-error' : ''}}">
                                            <label for="no_tlp_wali" class="col-lg-5 control-label">No Hp/ No Wa</label>
                                            <input type="text" class="form-control" id="no_tlp_wali" name="no_tlp_wali" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="12" placeholder="Contoh 082727271980"  value="{{$data->no_tlp_wali}}">
                                            @if($errors->has('no_tlp_wali'))
                                                <span class="help-block">{{$errors->first('no_tlp_wali')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('alamat_orangtua_wali')  ? ' has-error' : ''}}">
                                            <label for="alamat_orangtua_wali" class="col-lg-6 control-label">Alamat Orang Tua/Wali<sup style="color: red">*</sup></label>
                                            <textarea class="form-control" id="alamat_orangtua_wali" rows="4" cols="50" name="alamat_orangtua_wali" placeholder="Masukan Alamat Orang Tua/Wali"  required="">
                                            {{$data->alamat_orangtua_wali}}
                                            </textarea>
                                            @if($errors->has('alamat_orangtua_wali'))
                                                <span class="help-block">{{$errors->first('alamat_orangtua_wali')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-6 my-1">
                                                <label for="rt_ortu" class="col-lg-6 control-label">Rt<sup style="color: red">*</sup></label>
                                                <div class="form-group{{$errors->has('rt_ortu')  ? ' has-error' : ''}}">
                                                    <input type="text" class="form-control" id="rt_ortu" name="rt_ortu" placeholder="Contoh 002"  onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="3" required="" value="{{$data->rt_ortu}}">
                                                    @if($errors->has('rt_ortu'))
                                                        <span class="help-block">{{$errors->first('rt_ortu')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6 my-1">
                                                <label for="rw_ortu" class="col-lg-6 control-label">Rw<sup style="color: red">*</sup></label>
                                                <div class="form-group{{$errors->has('rw_ortu')  ? ' has-error' : ''}}">
                                                    <input type="text" class="form-control" id="rw_ortu" name="rw_ortu" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" maxlength="3" placeholder="Contoh 001" required="" value="{{$data->rw_ortu}}">
                                                    @if($errors->has('rw_ortu'))
                                                        <span class="help-block">{{$errors->first('rw_ortu')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('desa_ortu')  ? ' has-error' : ''}}">
                                            <label for="desa_ortu" class="col-lg-5 control-label">Desa/Kelurahan<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="desa_ortu" name="desa_ortu" placeholder="Masukan Desa/Kelurahan"  required="" value="{{$data->desa_ortu}}">
                                            @if($errors->has('desa_ortu'))
                                                <span class="help-block">{{$errors->first('desa_ortu')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('kecamatan_ortu')  ? ' has-error' : ''}}">
                                            <label for="kecamatan_ortu" class="col-lg-6 control-label">Kecamatan<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="kecamatan_ortu" name="kecamatan_ortu" placeholder="Masukan Kecamatan"  required="" value="{{$data->kecamatan_ortu}}">
                                            @if($errors->has('kecamatan_ortu'))
                                                <span class="help-block">{{$errors->first('kecamatan_ortu')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('kota_ortu')  ? ' has-error' : ''}}">
                                            <label for="kota_ortu" class="col-lg-5 control-label">Kabupaten/Kota<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="kota_ortu" name="kota_ortu" placeholder="Masukan Kabupaten/Kota"  required="" value="{{$data->kota_ortu}}">
                                            @if($errors->has('kota_ortu'))
                                                <span class="help-block">{{$errors->first('kota_ortu')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{$errors->has('provinsi_ortu')  ? ' has-error' : ''}}">
                                            <label for="provinsi_ortu" class="col-lg-6 control-label">Provinsi<sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" id="provinsi_ortu" name="provinsi_ortu" placeholder="Masukan provinsi"  required="" value="{{$data->provinsi_ortu}}">
                                            @if($errors->has('provinsi_ortu'))
                                                <span class="help-block">{{$errors->first('provinsi_ortu')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">&times;Close</button>
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create"><i class="fas fa-database"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script> 
<link id="bs-css" href="https://netdna.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
@if( $massage = session('success'))
    <script type="text/javascript">
    Swal.fire({
        type: 'success',
        title:  "{{ $massage }}",
        text: 'success',
        timer: 4000,
    })
    </script>   
@endif
@if ( $massage = session('gagal'))
    <script type="text/javascript">
    Swal.fire({
        type: 'error',
        title:  "{{ $massage }}",
        text: 'Gagal',
        timer: 4000,
    })
@endif 
<script type="text/javascript">
    $(document).ready(function() {
        var alamat_tinggal = document.getElementById("alamat_tinggal").value;
        alamat_tinggal = alamat_tinggal.trim();
        document.getElementById("alamat_tinggal").value = alamat_tinggal

        var riwayat_beasiswa = document.getElementById("riwayat_beasiswa").value;
        riwayat_beasiswa = riwayat_beasiswa.trim();
        document.getElementById("riwayat_beasiswa").value = riwayat_beasiswa

        var catatan_prestasi = document.getElementById("catatan_prestasi").value;
        catatan_prestasi = catatan_prestasi.trim();
        document.getElementById("catatan_prestasi").value = catatan_prestasi

        var alamat_orangtua_wali = document.getElementById("alamat_orangtua_wali").value;
        alamat_orangtua_wali = alamat_orangtua_wali.trim();
        document.getElementById("alamat_orangtua_wali").value = alamat_orangtua_wali
        $("#tanggal_lahir").datepicker({
            weekStart: 0,
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true, 
            orientation: "auto",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
            });
        $('#jenis_kelamin').select2({
            width: '100%',
            allowClear: true
        });
        $('#agama').select2({
            width: '100%',
            allowClear: true
        });
        $('#jenis_tinggal').select2({
            width: '100%',
            allowClear: true
        }); 
        $('#jarak_tempat').select2({
            width: '100%',
            allowClear: true
        });
        $('#alat_transportasi').select2({
            width: '100%',
            allowClear: true
        });
        $('#pendidikan_terakhir_ayah').select2({
            width: '100%',
            allowClear: true
        });
        $('#pendidikan_terakhir_ibu').select2({
            width: '100%',
            allowClear: true
        });
        $('#pendidikan_terakhir_wali').select2({
            width: '100%',
            allowClear: true
        });
    });
    var penghasilan_bulanan_ayah = document.getElementById('penghasilan_bulanan_ayah');
        penghasilan_bulanan_ayah.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            if(penghasilan_bulanan_ayah.value.length <31){
                penghasilan_bulanan_ayah.value = formatRupiah(this.value);
            }else{
                Swal.fire({
                    type: 'warning',
                    title:  "Maksimal 26 Digit",
                    timer: 4000,
                })
                penghasilan_bulanan_ayah.value = penghasilan_bulanan_ayah.value.slice(0, 21);
                penghasilan_bulanan_ayah.value = formatRupiah(this.value);
            }
        });
        var penghasilan_ibu = document.getElementById('penghasilan_ibu');
        penghasilan_ibu.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            if(penghasilan_ibu.value.length <31){
                penghasilan_ibu.value = formatRupiah(this.value);
            }else{
                Swal.fire({
                    type: 'warning',
                    title:  "Maksimal 26 Digit",
                    timer: 4000,
                })
                penghasilan_ibu.value = penghasilan_ibu.value.slice(0, 21);
                penghasilan_ibu.value = formatRupiah(this.value);
            }
        });
        var penghasilan_wali = document.getElementById('penghasilan_wali');
        penghasilan_wali.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            if(penghasilan_wali.value.length <31){
                penghasilan_wali.value = formatRupiah(this.value);
            }else{
                Swal.fire({
                    type: 'warning',
                    title:  "Maksimal 26 Digit",
                    timer: 4000,
                })
                penghasilan_wali.value = penghasilan_wali.value.slice(0, 21);
                penghasilan_wali.value = formatRupiah(this.value);
            }
        });
     /* Fungsi formatRupiah */
     function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString()
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>
@endsection