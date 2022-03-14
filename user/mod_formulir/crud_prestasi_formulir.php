<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();

$id = $_SESSION['id_siswa'];

$cek = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
id_daftar         = '$id' and
no_kk              is  null and
nik_ayah                 is  null and
nama_ayah                     is  null and 
tempat_ayah                     is  null and 
tgl_lahir_ayah                   is  null and
pendidikan_ayah              is  null and
pekerjaan_ayah                  is  null and
penghasilan_ayah              is  null and
nik_ibu                 is  null and
nama_ibu                     is  null and 
tempat_ibu                     is  null and 
tgl_lahir_ibu                   is  null and
pendidikan_ibu              is  null and
pekerjaan_ibu                 is  null and
penghasilan_ibu              is  null and
file_kk                    is  null
"));

if ($pg == 'simpandatadiri') {
    $siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id]);
    $status = $siswa['status'];
    $ektensi = ['jpg', 'png', 'jpeg', 'JPG', 'JPEG'];
    if ($siswa['foto'] <> "foto_siswa/default.png") {
        if ($status >= 1) {
            if ($_FILES['ijazah_akta']['name'] <> '') {
                $logo = $_FILES['ijazah_akta']['name'];
                $temp = $_FILES['ijazah_akta']['tmp_name'];
                $ext = explode('.', $logo);
                $ext = end($ext);
                if (in_array($ext, $ektensi)) {
                    $dest = 'ijazah_akta/ia_' . $_POST['nisn'] .time(). '.' . $ext;
                    if ($siswa['file_ijazah'] <> null) {
                        unlink($siswa['file_ijazah']);
                    }
                    $upload = move_uploaded_file($temp,  $dest);
                    if ($upload) {
                    $data = [
                        'nisn'              => $_POST['nisn'],
                        'nik'               => $_POST['nik'],
                        'nama'              => mysqli_escape_string($koneksi, $_POST['nama']),
                        'tempat_lahir'      => mysqli_escape_string($koneksi, $_POST['tempat']),
                        'tgl_lahir'         => $_POST['tgllahir'],
                        'jenkel'            => $_POST['jenkel'],
                        'no_hp'             => $_POST['nohp'],
                        'anak_ke'           => $_POST['anakke'],
                        'saudara'           => $_POST['saudara'],
                        'tinggi'            => $_POST['tinggi'],
                        'berat'             => $_POST['berat'],
                        'status_keluarga'   => $_POST['statuskeluarga'],
                        'jurusan1'          => $_POST['jurusan1'],
                        'jurusan2'          => $_POST['jurusan2'],
                        'keterampilan'      => $_POST['keterampilan'],
                        'agama'             => $_POST['agama'],
                        'file_ijazah'       => $dest
                    ];
                
                    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
                    if ($exec) {
                        $pesan = [
                            'pesan' => 'ok'
                        ];
                        echo 'ok';
                    } else {
                        $pesan = [
                            'pesan' => mysqli_error($koneksi)
                        ];
                        echo mysqli_error($koneksi);
                    }
                    } else {
                        echo "penyimpanan gagal dilakukan, ulangi lagi yak";
                    }
                }
            }  else 
                echo "penyimpanan gagal dilakukan, ulangi lagi yak"; 
        } else {
            $data = [
                'nisn'              => $_POST['nisn'],
                'nik'               => $_POST['nik'],
                'nama'              => mysqli_escape_string($koneksi, $_POST['nama']),
                'tempat_lahir'      => mysqli_escape_string($koneksi, $_POST['tempat']),
                'tgl_lahir'         => $_POST['tgllahir'],
                'jenkel'            => $_POST['jenkel'],
                'no_hp'             => $_POST['nohp'],
                'jurusan1'          => $_POST['jurusan1'],
                'jurusan2'          => $_POST['jurusan2'],
                'keterampilan'      => $_POST['keterampilan'],
                'agama'             => $_POST['agama'],
            ];
            
            $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
            if ($exec) {
                $pesan = [
                    'pesan' => 'ok'
                ];
                echo 'ok';
            } else {
                $pesan = [
                    'pesan' => mysqli_error($koneksi)
                ];
                echo mysqli_error($koneksi);
            }
        }
    } else {
        echo "Upload Pasfoto berseragam terlebih dahulu!!"; 
    }
}
if ($pg == 'simpanalamat') {
    $siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id]);
    $status = $siswa['status'];

    $data = [
        'jenjang_sekolah'            => $_POST['jenjangsekolah'],
        'status_sekolah'             => $_POST['statussekolah'],
        'asal_sekolah'               => mysqli_escape_string($koneksi, $_POST['asalsekolah']),
        'npsn_sekolah'               => $_POST['npsn'],
        'kab_sekolah'                => mysqli_escape_string($koneksi, $_POST['kabsekolah']),
        'no_ujian'                   => $_POST['noujian']
    ];

    if ($status >= 1) {
        $data1 = [
            'alamat'            => mysqli_escape_string($koneksi, $_POST['alamat']),
            'rt'                => $_POST['rt'],
            'rw'                => $_POST['rw'],
            'desa'              => mysqli_escape_string($koneksi, $_POST['desa']),
            'kecamatan'         => mysqli_escape_string($koneksi, $_POST['kecamatan']),
            'kota'              => mysqli_escape_string($koneksi, $_POST['kota']),
            'provinsi'          => mysqli_escape_string($koneksi, $_POST['provinsi']),
            'kode_pos'          => $_POST['kodepos'],
            'tinggal'           => $_POST['tinggal'],
            'jarak'             => $_POST['jarak'],
            'waktu'             => $_POST['waktu'],
            'transportasi'      => $_POST['transportasi'],
        ];

        $data = array_merge($data, $data1);
    }

    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'simpanortu') {
    $siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id]);
    $status = $siswa['status'];
    $ektensi = ['jpg', 'png', 'jpeg', 'JPG', 'JPEG'];
    if ($_FILES['berkas_kk']['name'] <> '') {
        $logokk = $_FILES['berkas_kk']['name'];
        $tempkk = $_FILES['berkas_kk']['tmp_name'];
        $extkk = explode('.', $logokk);
        $extkk = end($extkk);

        $kartu_in_arr = true;
        $upload_kartu = $_FILES['berkas_kartu']['name'] <> '';

        if ($upload_kartu) {
            $logo = $_FILES['berkas_kartu']['name'];
            $temp = $_FILES['berkas_kartu']['tmp_name'];
            $ext = explode('.', $logo);
            $ext = end($ext);
            $kartu_in_arr = in_array($ext, $ektensi);
        }

        if (in_array($extkk, $ektensi) && $kartu_in_arr) {
            $destkk = 'berkas_kk/kk_' . $siswa['nisn'] .time(). '.' . $extkk;
            if ($siswa['file_kk'] <> null) {
                unlink($siswa['file_kk']);
            }
            $uploadkk = move_uploaded_file($tempkk,  $destkk);
            
            $upload = true;

            if ($upload_kartu) {
                $dest = 'berkas_kartu/kartu_' . $siswa['nisn'] .time(). '.' . $ext;
                if ($siswa['file_kartu'] <> null) {
                    unlink($siswa['file_kartu']);
                }
                $upload = move_uploaded_file($temp,  $dest);
            }
            
            if ($uploadkk && $upload) {
              $data = [
                'no_kk'               => $_POST['nokk'],
                'nik_ayah'            => $_POST['nikayah'],
                'nama_ayah'           => mysqli_escape_string($koneksi, $_POST['namaayah']),
                'tempat_ayah'    => $_POST['tempatlahirayah'],
                'tgl_lahir_ayah'    => $_POST['tgllahirayah'],
                'pendidikan_ayah'     => $_POST['pendidikan_ayah'],
                'pekerjaan_ayah'      => $_POST['pekerjaan_ayah'],
                'penghasilan_ayah'    => $_POST['penghasilan_ayah'],
                'no_hp_ayah'          => $_POST['nohpayah'],
                'nik_ibu'             => $_POST['nikibu'],
                'nama_ibu'            => mysqli_escape_string($koneksi, $_POST['namaibu']),
                'tempat_ibu'    => $_POST['tempatlahiribu'],
                'tgl_lahir_ibu'     => $_POST['tgllahiribu'],
                'pendidikan_ibu'      => $_POST['pendidikan_ibu'],
                'pekerjaan_ibu'       => $_POST['pekerjaan_ibu'],
                'penghasilan_ibu'     => $_POST['penghasilan_ibu'],
                'no_hp_ibu'           => $_POST['nohpibu'],
                // 'nik_wali'            => $_POST['nikwali'],
                // 'nama_wali'           => mysqli_escape_string($koneksi, $_POST['namawali']),
                // 'tahun_lahir_wali'    => $_POST['tahunlahirwali'],
                // 'pendidikan_wali'     => $_POST['pendidikan_wali'],
                // 'pekerjaan_wali'      => $_POST['pekerjaan_wali'],
                // 'penghasilan_wali'    => $_POST['penghasilan_wali'],
                // 'no_hp_wali'          => $_POST['nohpwali'],
                'file_kk'             => $destkk
              ];
              
              if ($upload_kartu) {
                $data1 = [
                    'status_kartu'      => $_POST['statuskartu'],
                    'jenis_kartu'       => $_POST['jeniskartu'],
                    'no_kartu'          => $_POST['nokartu'],
                    'file_kartu'        => $dest
                ];
                $data = array_merge($data, $data1);
              }
          
              $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
              if ($exec) {
                  $pesan = [
                      'pesan' => 'ok'
                  ];
                  echo 'ok';
              } else {
                  $pesan = [
                      'pesan' => mysqli_error($koneksi)
                  ];
                  echo mysqli_error($koneksi);
              }
            } else {
                echo "penyimpanan gagal dilakukan, ulangi lagi yak";
            }
        }
    } else {
      if ($cek == 0) {
        if ($_FILES['berkas_kartu']['name'] <> '') {
            $logo = $_FILES['berkas_kartu']['name'];
            $temp = $_FILES['berkas_kartu']['tmp_name'];
            $ext = explode('.', $logo);
            $ext = end($ext);
            if (in_array($ext, $ektensi)) {
                $dest = 'berkas_kartu/kartu_' . $siswa['nisn'] .time(). '.' . $ext;
                if ($siswa['file_kartu'] <> null) {
                    unlink($siswa['file_kartu']);
                }
                $upload = move_uploaded_file($temp,  $dest);
                if ($upload) {
                  $data = [
                    'status_kartu'      => $_POST['statuskartu'],
                    'jenis_kartu'       => $_POST['jeniskartu'],
                    'no_kartu'          => $_POST['nokartu'],
                    'file_kartu'        => $dest
                  ];
              
                  $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
                  if ($exec) {
                      $pesan = [
                          'pesan' => 'ok'
                      ];
                      echo 'ok';
                  } else {
                      $pesan = [
                          'pesan' => mysqli_error($koneksi)
                      ];
                      echo mysqli_error($koneksi);
                  }
                } else {
                    echo "penyimpanan gagal dilakukan, ulangi lagi yak";
                }
            }
        } else {
          echo "penyimpanan gagal dilakukan, ulangi lagi yak";
        }
      } else {
        echo "penyimpanan gagal dilakukan, ulangi lagi yak";
      }
    }
}
if ($pg == 'simpanasalsekolah') {
    $data = [
        'jenjang_sekolah'            => $_POST['jenjangsekolah'],
        'status_sekolah'             => $_POST['statussekolah'],
        'asal_sekolah'               => mysqli_escape_string($koneksi, $_POST['asalsekolah']),
        'npsn_sekolah'               => $_POST['npsn'],
        'kab_sekolah'                => mysqli_escape_string($koneksi, $_POST['kabsekolah']),
        'no_ujian'                   => $_POST['noujian']
    ];
    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'simpaninfokartu') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id]);
    $ektensi = ['jpg', 'png'];
    if ($_FILES['berkas_kartu']['name'] <> '') {
        $logo = $_FILES['berkas_kartu']['name'];
        $temp = $_FILES['berkas_kartu']['tmp_name'];
        $ext = explode('.', $logo);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'berkas_kartu/kartu_' . $siswa['nisn'] .time(). '.' . $ext;
            if ($siswa['file_kartu'] <> null) {
                unlink($siswa['file_kartu']);
            }
            $upload = move_uploaded_file($temp,  $dest);
            if ($upload) {
              $data = [
                'status_kartu'      => $_POST['statuskartu'],
                'jenis_kartu'       => $_POST['jeniskartu'],
                'no_kartu'          => $_POST['nokartu'],
                'file_kartu'        => $dest
              ];
          
              $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
              if ($exec) {
                  $pesan = [
                      'pesan' => 'ok'
                  ];
                  echo 'ok';
              } else {
                  $pesan = [
                      'pesan' => mysqli_error($koneksi)
                  ];
                  echo mysqli_error($koneksi);
              }
            } else {
                echo "penyimpanan gagal dilakukan, ulangi lagi yak";
            }
        }
    } else {
      echo "penyimpanan gagal dilakukan, ulangi lagi yak";
    }
}
if ($pg == 'gantifoto') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id]);
    $ektensi = ['jpg', 'png', 'jpeg', 'JPG', 'JPEG'];
    if ($_FILES['foto_siswa']['name'] <> '') {
        $logo = $_FILES['foto_siswa']['name'];
        $temp = $_FILES['foto_siswa']['tmp_name'];
        $ext = explode('.', $logo);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'foto_siswa/foto_' . $siswa['nisn'] . time().'.' . $ext;
            if ($siswa['foto'] <> null) {
                unlink($siswa['foto']);
            }
            $upload = move_uploaded_file($temp,  $dest);
            if ($upload) {
              $data = [
                'foto'        => $dest
              ];
              $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
              if ($exec) {
                  $pesan = [
                      'pesan' => 'ok'
                  ];
                  echo 'ok';
              } else {
                  $pesan = [
                      'pesan' => mysqli_error($koneksi)
                  ];
                  echo mysqli_error($koneksi);
              }
            } else {
                echo "penyimpanan gagal dilakukan, ulangi lagi yak";
            }
        }
    } else {
      echo "penyimpanan gagal dilakukan, ulangi lagi yak";
    }
}
if ($pg == 'simpanprestasi') {
    $siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id]);
    $ektensi = ['jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'pdf'];
    if ($_POST['tipeprestasi'] == '') {
        $data = [
            'mat3'              => $_POST['mat3'],
            'bin3'              => $_POST['bin3'],
            'bing3'             => $_POST['bing3'],
            'ipa3'              => $_POST['ipa3'],
            'ips3'              => $_POST['ips3'],
            'mat4'              => $_POST['mat4'],
            'bin4'              => $_POST['bin4'],
            'bing4'             => $_POST['bing4'],
            'ipa4'              => $_POST['ipa4'],
            'ips4'              => $_POST['ips4'],
            'mat5'              => $_POST['mat5'],
            'bin5'              => $_POST['bin5'],
            'bing5'             => $_POST['bing5'],
            'ipa5'              => $_POST['ipa5'],
            'ips5'              => $_POST['ips5']
        ];

        $exec = update($koneksi, 'prestasi', $data, ['id_daftar' => $id]);
        if ($exec) {
            $pesan = [
                'pesan' => 'ok'
            ];
            echo 'ok';
        } else {
            $pesan = [
                'pesan' => mysqli_error($koneksi)
            ];
            echo mysqli_error($koneksi);
        }
    } else if ($_POST['tipeprestasi'] <> '') {
        $logo = $_FILES['berkas_prestasi']['name'];
        $temp = $_FILES['berkas_prestasi']['tmp_name'];
        $ext = explode('.', $logo);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'berkas_prestasi/pr_' . $siswa['nisn'] .time(). '.' . $ext;
            if ($siswa['file_prestasi'] <> null) {
                unlink($siswa['file_prestasi']);
            }
            $upload = move_uploaded_file($temp,  $dest);
            if ($upload) {
              $data = [
                'mat3'              => $_POST['mat3'],
                'bin3'              => $_POST['bin3'],
                'bing3'             => $_POST['bing3'],
                'ipa3'              => $_POST['ipa3'],
                'ips3'              => $_POST['ips3'],
                'mat4'              => $_POST['mat4'],
                'bin4'              => $_POST['bin4'],
                'bing4'             => $_POST['bing4'],
                'ipa4'              => $_POST['ipa4'],
                'ips4'              => $_POST['ips4'],
                'mat5'              => $_POST['mat5'],
                'bin5'              => $_POST['bin5'],
                'bing5'             => $_POST['bing5'],
                'ipa5'              => $_POST['ipa5'],
                'ips5'              => $_POST['ips5'],
                'tipe_prestasi'     => mysqli_escape_string($koneksi, $_POST['tipeprestasi']),
                'file_prestasi'     => $dest
              ];
              if ($_POST['tipeprestasi'] == "AKADEMIK") {
                $data1 = [
                    'jenis_prestasi'    => mysqli_escape_string($koneksi, $_POST['jenisprestasi'])
                ];
              } else if ($_POST['tipeprestasi'] == "NON AKADEMIK") {
                $data1 = [
                    'nama_prestasi'    => mysqli_escape_string($koneksi, $_POST['namaprestasi']),
                    'tingkat_prestasi'  => mysqli_escape_string($koneksi, $_POST['tingkatprestasi']),
                    'peringkat_prestasi'   => $_POST['peringkatprestasi'],
                ];
              }

              $data = array_merge($data, $data1);

              $exec = update($koneksi, 'prestasi', $data, ['id_daftar' => $id]);
              if ($exec) {
                  $pesan = [
                      'pesan' => 'ok'
                  ];
                  echo 'ok';
              } else {
                  $pesan = [
                      'pesan' => mysqli_error($koneksi)
                  ];
                  echo mysqli_error($koneksi);
              }
            } else {
                echo "penyimpanan gagal dilakukan, ulangi lagi yak";
            }
        }
    } else {
        echo "penyimpanan gagal dilakukan, ulangi lagi yak";
    }
}
