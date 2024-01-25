<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use Notifiable;
    // public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'ppdb';
    protected $fillable = [
        'nisn','nik','nama', 'jenis_kelamin','tempat_lahir','tanggal_lahir','tinggi_badan','berat_badan',
        'agama','kewarganegaraan','jumlah_saudara', 'asal_sekolah','alamat_tinggal','rt','rw',
        'desa','kecamatan','kota', 'provinsi','no_hp','jenis_tinggal','jarak_tempat',
        'alat_transportasi','riwayat_beasiswa','catatan_prestasi', 'nama_ayah_kandung','tahun_lahir_ayah','pendidikan_terakhir_ayah','pekerjaan','penghasilan_bulanan_ayah','no_hp_ayah',
        'nama_ibu_kandung','pendidikan_terakhir_ibu','tahun_lahir_ibu', 'pekerjaan_ibu','penghasilan_ibu','no_tlp_ibu',
        'nama_wali','tahun_lahir_wali','pendidikan_terakhir_wali', 'pekerjaan_wali','penghasilan_wali','no_tlp_wali',
        'alamat_orangtua_wali','rt_ortu','rw_ortu', 'desa_ortu','kecamatan_ortu','kota_ortu','provinsi_ortu','program'];

    
}
