<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'title' => 'Pesta Kesenian Bali',
            'slug' => Str::slug('Pesta Kesenian Bali'),
            'description' => 'Pesta Kesenian Bali adalah festival tahunan yang merayakan kekayaan budaya dan kesenian provinsi Bali. Festival ini dibuka dengan pelepasan pawai budaya kemudian disusul dengan pergelaran pada malam harinya di Panggung Terbuka Ardha Candra, Art Center Denpasar. Berbagai pertunjukan seni diselenggarakan selama sebulan di Art Center Denpasar. Pesta Kesenian Bali tahun 2025 ini dirangkai dengan lomba, lokakarya, serasehan, parade, dan penghargaan pengabdi seni yang kesemuanya mengusung tema kesenian dan kebudayaan Bali. Selain itu, PKB tahun 2025 dirangkai dengan kegiatan Jantra Tradisi Bali dan BWCC (Perayaan Kebudayaan Dunia di Bali).',
            'event_date' => '21 Juni - 19 Juli 2025',
            'location' => 'Denpasar, Bali',
            'image' => 'pesta_bali.png',
        ]);

        Event::create([
            'title' => 'Jember Fashion Carnaval',
            'slug' => Str::slug('Jember Fashion Carnaval'),
            'description' => 'Jember Fashion Carnaval merupakan event sosial dengan konsep fesyen kreatif yang dikemas dalam bentuk parade karnaval. Festival ini adalah agenda tahunan untuk menampilkan berbagai busana unik yang mewakili filosofi dan budaya dari berbagai wilayah Nusantara. Terdapat juga pasar UMKM yang memamerkan berbagai produk dan layanan inovatif untuk pengunjung.',
            'event_date' => '8 - 10 Agustus 2025',
            'location' => 'Jember, Jawa Timur',
            'image' => 'karnaval_jember.jpg',
        ]);

        Event::create([
            'title' => 'Wayang Jogja Night Carnival',
            'slug' => Str::slug('Wayang Jogja Night Carnival'),
            'description' => 'Acara ini termasuk dalam event unggulan kota Yogyakarta yang diadakan dalam memperingati HUT Kota Yogyakarta. WJNC menyuguhkan karnaval jalanan art (art on the street) yang menggabungkan tema pewayangan dengan melibatkan seni koreografi, busana, musik kontemporer, dan permainan lighting. Acara ini sudah dilaksanakan secara rutin sejak 2016 dan telah berkolaborasi dengan komunitas seni, UMKM, dan dinas terkait dalam memberikan pengalaman terbaik untuk pengunjung.',
            'event_date' => '28 - 31 Mei 2025',
            'location' => 'Yogyakarta, Daerah Istimewa Yogyakarta',
            'image' => 'wayang_jogja.png',
        ]);

         Event::create([
            'title' => 'Festival Payung Indonesia',
            'slug' => Str::slug('Festival Payung Indonesia'),
            'description' => 'Festival Payung Indonesia menghadirkan karya dan kreasi seni dengan payung  berupa seni tari, musik, dan fashion show yang bertujuan memberikan inspirasi bagi masyarakat. Festival ini juga menyuguhkan pasar kuliner dan pameran UMKM. Banyak seniman dari berbagai kota di Indonesia berpartisipasi ikut dalam festival ini. Festival Payung Indonesia sudah menjadi acara tahunan di Solo sejak tahun 2014.',
            'event_date' => '5 - 7 September 2025',
            'location' => 'Solo, Jawa Tengah',
            'image' => 'festival_payung.jpeg',
        ]);

         Event::create([
            'title' => 'Cap Go Meh Kota Singkawang',
            'slug' => Str::slug('Cap Go Meh Kota Singkawang'),
            'description' => 'Kota Singkawang menyuguhkan berbgaai kegiatan dalam menyambut perayaan Imlek dan Cap Go Meh dengan menghiasi kota dengan lampion. Terdapat juga banyak rangkaian kegiatan lain seperti lomba hias lingkungan, opening ceremony, pentas pagelaran seni dan expo, replika shio, festival kuliner, pawai lampion, ritual tolak bala, dan berbagai acara meriah lainnya. Festival ini dapat menjadi pilihan liburan yang dapat dikunjungi.',
            'event_date' => '2 Januari - 3 Februari 2025',
            'location' => 'Singkawang, Kalimantan Barat',
            'image' => 'cap_go_meh.jpeg',
        ]);

         Event::create([
            'title' => 'Semasa Piknik',
            'slug' => Str::slug('Semasa Piknik'),
            'description' => 'Semasa Piknik ialah event tahunan yang digelar oleh Semasa untuk mengajak warga Jakarta menndukung ekonomi kreatif dan UMKM lokal sambil menikmati kegiatan outdoor di kota Jakarta dalam bentuk piknik bersama.',
            'event_date' => '27 - 29 Juni 2025',
            'location' => 'Jakarta Pusat, DKI Jakarta',
            'image' => 'semasa_piknik.jpg',
        ]);

         Event::create([
            'title' => 'Pesona Belitung Beach Festival',
            'slug' => Str::slug('Pesona Belitung Beach Festival'),
            'description' => 'Acara ini adalah perayaan yang menyuguhkan keberagaman seni dan budaya pesisir pulau Belitung dengan menampilkan berbagai pertunjukan seni tradisional dan modern. Festival ini juga menampikan pameran produk ekonomi kreatif, kuliner, serta berbagai lomba bertemakan kebaharian. Tujuan dari festival ini adalah memperkenalkan ke khalayak keberagaman seni dan budaya masyarakat Belitung, dan didukung keindahakan alam dan tradisi pesisir.',
            'event_date' => '8 - 12 Mei 2025',
            'location' => 'Tanjung Pandan, Belitung',
            'image' => 'festival_belitung.jpg',
        ]);

         Event::create([
            'title' => 'Festival Rakik-Rakik',
            'slug' => Str::slug('Festival Rakik-Rakik'),
            'description' => 'Festival Rakik-Rakik adalah acara tahunan dalam berlomba menghias rakit yang dilakukan oleh masyakat di Nagari Maninjau dalam merayakan tradisi dan menyambut hari raya idul fitri. Festival ini menjadi wadah untuk menuangkan kreativitas dan memperkuat semangat kebersamaan. Peserta dari berbagai jorong dan nagari menunjukkan kebanggaan budaya dan warisan mereka. Festival ini juga menghadirkan pengalaman yang intens tentang budaya Minangkabau, dengan pertunjukkan seni tradisional, hidangan khas lokal, dan kemeriahan acara.',
            'event_date' => '28 - 30 Juni 2025',
            'location' => 'Kabupaten Agam, Sumatra Barat',
            'image' => 'festival_rakik.jpg',
        ]);

         Event::create([
            'title' => 'Festival Lampion Waisak',
            'slug' => Str::slug('Festival Lampion Waisak'),
            'description' => 'Festival Lampion Waisak diselenggarakan di Candi Borodudur dengan mengangkat tema “Light of Peace” sebagai simbol perdamaian dunia. Acara ini bisa diikuti oleh semua kalangan masyarakat dengan bersama-sama menerbangkan lampion di depan Candi Borobudur dengan latar malam sehingga menambah pengalaman spiritual dalam merayakan  Waisak dengan suasana penuh kedamaian. Untuk dapat mengikuti acara ini, pengunjung perlu memesan terlebih dahulu tiket dari jauh-jauh hari.',
            'event_date' => '12 Mei 2025',
            'location' => 'Magelang, Jawa Tengah',
            'image' => 'festival_lampion.jpeg',
        ]);

    }
}
