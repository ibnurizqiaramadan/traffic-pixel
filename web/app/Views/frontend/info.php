<?= $this->extend('frontend/layouts/app'); ?>

<?= $this->section('content'); ?>
<div class="container pt-5">
    <div class="row pt-5 mt-5 pb-3 justify-content-center">
        <div class="col-12">

            <h3>1. Rambu Peringatan</h3>
            <p>Sesuai dengan namanya, ini merupakan rambu yang dibuat untuk memberikan peringatan kepada pengguna jalan. Biasanya isinya berupa peringatan tentang kondisi jalan atau kemungkinan bahaya yang akan ditemui di lintasan jalan tersebut. Bentuknya umumnya berupa plat berbentuk persegi. Rambu ini umumnya berwarna dasar kuning dengan tulisan atau gambar berwarna hitam yang merupakan isi peringatan dari rambu-rambu tersebut.</p>
            <center>
                <img src="https://cdn.discordapp.com/attachments/752130537455484999/923903602324541470/peringataann.jpg" class="img-fluid" alt="">
            </center>
            <p class="text-center mt-3">Contoh rambu peringatan</p>
            <p>Rambu peringatan biasanya berupa peringatan kondisi jalan, seperti arah jalan menikung, di depan ada tanjakan, kondisi jalan bergelombang, hingga jalan di depan menyempit. Bisa juga berisi peringatan bahwa di sekitar jalur tersebut sering terjadi kecelakaan, sehingga pengguna jalan harus berhati-hati.</p>

            <h3>2. Rambu Larangan</h3>
            <p>Rambu larangan merupakan rambu-rambu lalu lintas yang berisi larangan bagi pengguna jalan yang melintasi jalan tersebut atau larangan melakukan aktivitas tertentu. Dari ruang lingkupnya, rambu ini memberikan larangan kepada semua pengguna jalan yang ada di kawasan tersebut.</p>
            <center>
                <img src="https://cdn.discordapp.com/attachments/752130537455484999/923904523402096640/larangann.jpg" class="img-fluid" alt="">
            </center>
            <p class="text-center mt-3">Contoh rambu larangan</p>
            <p>Rambu larangan juga terbuat dari plat berbentuk lingkaran. Namun berbeda dengan rambu peringatan, bentuk rambu larangan adalah lingkaran dengan warna dasar putih dan tulisan atau gambar berwarna hitam dan garis tepi berwarna merah. Rambu larangan biasanya merupakan larangan untuk parkir dengan tanda huruf S diberi garis miring. Ada juga larangan masuk bagi kendaraan roda dua, larangan masuk kendaraan roda empat, larangan kendaraan melintas dengan beban tertentu dan sebagainya.</p>

            <h3>3. Rambu Perintah</h3>
            <p>Selanjutnya untuk rambu perintah, yang berisi perintah untuk ditaati oleh pengguna jalan tempat rambu tersebut terpasang. Rambu perintah juga terbuat dari plat dengan bentuk lingkaran berwarna putih dan simbol larangan berwarna hitam dan merah.</p>
            <center>
                <img src="https://blog.carro.id/wp-content/uploads/2021/07/392240657.jpg" class="img-fluid" alt="">
            </center>
            <p class="text-center mt-3">Contoh rambu perintah</p>
            <p>Contoh dari rambu perintah adalah perintah untuk mengikuti arah yang ditunjuk. Ada juga perintah batas minimum beban kendaraan yang diperbolehkan, perintah penggunaan rantai ban, perintah mematuhi arah yang ditunjuk, perintah menggunakan jalur lintas khusus, dan berbagai perintah lainnya.</p>

            <h3>4. Rambu Petunjuk</h3>
            <p>Jenis rambu lalu lintas berdasarkan artinya yang perlu diketahui selanjutnya adalah rambu petunjuk. Sesuai dengan namanya, rambu lalu lintas ini berfungsi untuk memberikan petunjuk kepada pengguna jalan.Rambu petunjuk biasanya berbentuk persegi, dengan warna dasar berwarna hijau dengan gambar atau tulisan berwarna putih.</p>
            <center>
                <img src="https://blog.carro.id/wp-content/uploads/2021/07/0501249Rambu-11780x390-1-e1627381765186.jpg" class="img-fluid" alt="">
            </center>
            <p class="text-center mt-3">Contoh rambu petunjuk</p>
            <p>Namun, ada beberapa jenis rambu petunjuk dengan warna yang berbeda pula. Rambu petunjuk bisa berupa gambar, dan bisa berupa tulisan. Misalnya rambu dengan gambar masjid, berarti di dekat posisi jalan tersebut terdapat masjid. Demikian juga dengan gambar ranjang putih bersilang merah, maka tempat tersebut dekat dengan lokasi rumah sakit.</p>

            <p><i>Sumber <a href="https://carro.id/blog/berita/mengenal-jenis-rambu-lalu-lintas-beserta-artinya/5473/">carro.id</a></i></p>

        </div>
        <div id="canvasSource" class="col-xl-6 col-md-8 col-sm-12 d-none">
            <canvas id="canvas" width="400" height="300" class="border-0 shadow-2 rounded" style="width: 100%"></canvas>
        </div>
    </div>
</div>

<?= $this->endSection() ?>