<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Perjanjian {{ $pelanggaran->student->name }}</title>
    <style>
        * {
            margin: 0px;
            font-size: 1rem;
            font-weight: 100px;
        }

        .container {
            margin: 50px;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .text-base {
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .space-titik-dua {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center font-bold text-2xl">Surat Perjanjian</h1>
        <div style="margin-top: 30px;">
            <h1>Yang bertanda tangan di bawah ini adalah:</h1>
            <div style="margin-top: 20px; margin-left: 20px;">
                <h1 style="margin-top: 5px">Nama <span class="space-titik-dua">:
                        {{ $pelanggaran->student->name }}</span></h1>
                <h1 style="margin-top: 5px">NIS <span class="space-titik-dua">: {{ $pelanggaran->student->nis }}</span>
                </h1>
                <h1 style="margin-top: 5px">Kelas <span class="space-titik-dua">:
                        {{ $pelanggaran->student->class->name }}</span></h1>
                <h1 style="margin-top: 5px">Kategori <span class="space-titik-dua">:
                        {{ $pelanggaran->kategori->name }}</span></h1>
            </div>
            <div style="margin-top: 20px">
                <p>
                    Dengan ini berjanji tidak mengulangi kesalahan yang telah saya perbuat sebagaimana seperti kategori
                    diatas. Apabila dikemudian hari saya melakukan kesalahan yang sama maka saya siap diberi sanksi oleh
                    guru maupun sekolah.
                </p>
                <p style="margin-top: 20px">
                    Demikian surat perjanjian ini saya buat dengan sebenarnya tanpa paksaan dari manapun, Terima Kasih,
                </p>
                <p style="margin-top: 100px">
                    Yang Membuat Perjanjian
                </p>

                <p style="margin-top: 75px">
                    {{ $pelanggaran->student->name }}
                </p>
            </div>
        </div>
    </div>
</body>

</html>
