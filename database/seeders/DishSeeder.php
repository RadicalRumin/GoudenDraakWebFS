<?php

namespace Database\Seeders;
use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dish::create([
            'id' => '1',
            'category_id' => 1,
            'name' => 'Soep Ling Fa',
            'description' => '',
            'price' => 3.80
        ]);

        Dish::create([
            'id' => '2',
            'category_id' => 1,
            'name' => 'Kippensoep',
            'description' => '',
            'price' => 2.90
        ]);

        Dish::create([
            'id' => '3',
            'category_id' => 1,
            'name' => 'Tomatensoep',
            'description' => '',
            'price' => 2.90
        ]);

        Dish::create([
            'id' => '4',
            'category_id' => 1,
            'name' => 'Haalevinnensoep',
            'description' => '',
            'price' => 3.10
        ]);

        Dish::create([
            'id' => '5',
            'category_id' => 1,
            'name' => 'Champignonsoep',
            'description' => '',
            'price' => 3.10
        ]);

        Dish::create([
            'id' => '6',
            'category_id' => 1,
            'name' => 'Pekingsoep',
            'description' => '',
            'price' => 3.80
        ]);

        Dish::create([
            'id' => '7',
            'category_id' => 1,
            'name' => 'Wan Tan Soep',
            'description' => '',
            'price' => 4.30
        ]);

        Dish::create([
            'id' => '8',
            'category_id' => 1,
            'name' => 'Chinese Champignonsoep',
            'description' => '',
            'price' => 3.10
        ]);

        Dish::create([
            'id' => '10',
            'category_id' => 2,
            'name' => 'Loempia Ling Fa',
            'description' => '',
            'price' => 6.20
        ]);

        Dish::create([
            'id' => '11',
            'category_id' => 2,
            'name' => 'Loempia Compleet',
            'description' => '',
            'price' => 6.20
        ]);

        Dish::create([
            'id' => '12',
            'category_id' => 2,
            'name' => 'Loempia met kip',
            'description' => '',
            'price' => 3.90
        ]);

        Dish::create([
            'id' => '13',
            'category_id' => 2,
            'name' => 'Loempia',
            'description' => '',
            'price' => 3.80
        ]);

        Dish::create([
            'id' => '14',
            'category_id' => 2,
            'name' => 'Chinese mini loempia',
            'description' => '4st',
            'price' => 2.90
        ]);

        Dish::create([
            'id' => '14A',
            'category_id' => 2,
            'name' => 'Vegetarisch mini loempia',
            'description' => '12st',
            'price' => 4.20
        ]);

        Dish::create([
            'id' => '15',
            'category_id' => 2,
            'name' => 'Kroepoek',
            'description' => '',
            'price' => 2.30
        ]);

        Dish::create([
            'id' => '15A',
            'category_id' => 2,
            'name' => 'Casave Kroepoek',
            'description' => '',
            'price' => 2.30
        ]);

        Dish::create([
            'id' => '16',
            'category_id' => 2,
            'name' => 'Pangsit Goreng',
            'description' => '7st',
            'price' => 3.90
        ]);

        Dish::create([
            'id' => '17',
            'category_id' => 2,
            'name' => 'Pisang Goreng',
            'description' => '5st',
            'price' => 3.40
        ]);

        Dish::create([
            'id' => '18',
            'category_id' => 2,
            'name' => 'Chinese Dim Sum',
            'description' => '',
            'price' => 5.40
        ]);

        Dish::create([
            'id' => '19',
            'category_id' => 2,
            'name' => 'Saté Babi',
            'description' => '4st',
            'price' => 6.30
        ]);

        Dish::create([
            'id' => '20',
            'category_id' => 2,
            'name' => 'Saté Ajarm',
            'description' => '4st',
            'price' => 6.30
        ]);

        Dish::create([
            'id' => '20A',
            'category_id' => 2,
            'name' => 'Saté garnalen',
            'description' => '3st',
            'price' => 5.30
        ]);

        Dish::create([
            'id' => '21A',
            'category_id' => 2,
            'name' => 'Fong Mei Ha (4st)',
            'description' => '',
            'price' => 5.30
        ]);

        Dish::create([
            'id' => '22',
            'category_id' => 2,
            'name' => 'Tsa Sieuw Maa',
            'description' => '',
            'price' => 4.30
        ]);

        Dish::create([
            'id' => '24',
            'category_id' => 2,
            'name' => 'Atjar',
            'description' => '',
            'price' => 1.50
        ]);

        Dish::create([
            'id' => '25',
            'category_id' => 2,
            'name' => 'Witte rijst',
            'description' => '',
            'price' => 1.50
        ]);

        Dish::create([
            'id' => '26',
            'category_id' => 2,
            'name' => 'Grote pindasaus',
            'description' => '',
            'price' => 2.90
        ]);

        Dish::create([
            'id' => '27',
            'category_id' => 2,
            'name' => 'Kleine pindasaus',
            'description' => '',
            'price' => 1.50
        ]);

        Dish::create([
            'id' => '28',
            'category_id' => 2,
            'name' => 'Kippenvleugels',
            'description' => '',
            'price' => 3.20
        ]);

        Dish::create([
            'id' => '29',
            'category_id' => 2,
            'name' => 'Haaie kip',
            'description' => '',
            'price' => 4.00
        ]);

        Dish::create([
            'id' => '29H',
            'category_id' => 2,
            'name' => 'Kroket',
            'description' => '',
            'price' => 1.40
        ]);

        Dish::create([
            'id' => '29C',
            'category_id' => 2,
            'name' => 'Friet',
            'description' => '',
            'price' => 2.20
        ]);

        Dish::create([
            'id' => '180H',
            'category_id' => 2,
            'name' => 'Kleine Sambal',
            'description' => '',
            'price' => 2.50
        ]);

        Dish::create([
            'id' => '30',
            'category_id' => 3,
            'name' => 'Bami of Nasi Goreng Ling Fa',
            'description' => '',
            'price' => 14.30
        ]);

        Dish::create([
            'id' => '31',
            'category_id' => 3,
            'name' => 'Bami of Nasi Goreng met kipfilet en ei',
            'description' => '',
            'price' => 8.00
        ]);

        Dish::create([
            'id' => '32',
            'category_id' => 3,
            'name' => 'Bami of Nasi Goreng special',
            'description' => '',
            'price' => 8.50
        ]);

        Dish::create([
            'id' => '33',
            'category_id' => 3,
            'name' => 'Bami of Nasi Goreng met garnalen',
            'description' => '',
            'price' => 9.20
        ]);

        Dish::create([
            'id' => '34',
            'category_id' => 3,
            'name' => 'Bami Yeung Chow',
            'description' => '',
            'price' => 9.30
        ]);

        Dish::create([
            'id' => '35',
            'category_id' => 3,
            'name' => 'Chinese Bami of Nasi Malay',
            'description' => '',
            'price' => 9.30
        ]);

        Dish::create([
            'id' => '36',
            'category_id' => 3,
            'name' => 'Bami of Nasi met kipfilet',
            'description' => '',
            'price' => 8.00
        ]);

        Dish::create([
            'id' => '37',
            'category_id' => 3,
            'name' => 'Bami of Nasi met varkensvlees',
            'description' => '',
            'price' => 8.00
        ]);
        Dish::create([
            'id' => '38',
            'category_id' => 3,
            'name' => 'Bami of Nasi met ossehaas',
            'description' => '',
            'price' => 10.00
        ]);

        Dish::create([
            'id' => '40',
            'category_id' => 3,
            'name' => 'Babi Pangang/Foe Yong Hai en saté',
            'description' => '',
            'price' => 15.80
        ]);

        Dish::create([
            'id' => '41',
            'category_id' => 3,
            'name' => 'Babi Pangang en kip saté',
            'description' => '',
            'price' => 15.80
        ]);

        Dish::create([
            'id' => '42',
            'category_id' => 3,
            'name' => 'Babi Pangang/Koe Loe Yuk en saté',
            'description' => '',
            'price' => 15.80
        ]);

        Dish::create([
            'id' => '50',
            'category_id' => 4,
            'name' => 'Mihoen Ling Fa',
            'description' => '',
            'price' => 16.40
        ]);

        Dish::create([
            'id' => '51',
            'category_id' => 4,
            'name' => 'Mihoen met varkensvlees',
            'description' => '',
            'price' => 9.30
        ]);

        Dish::create([
            'id' => '52',
            'category_id' => 4,
            'name' => 'Mihoen met kipfilet',
            'description' => '',
            'price' => 8.60
        ]);

        Dish::create([
            'id' => '53',
            'category_id' => 4,
            'name' => 'Mihoen met ossehaas',
            'description' => '',
            'price' => 11.00
        ]);

        Dish::create([
            'id' => '54',
            'category_id' => 4,
            'name' => 'Mihoen Singapore-style',
            'description' => '',
            'price' => 9.90
        ]);

        Dish::create([
            'id' => '55',
            'category_id' => 4,
            'name' => 'Mihoen garnalen',
            'description' => '',
            'price' => 11.20
        ]);

        Dish::create([
            'id' => '56',
            'category_id' => 4,
            'name' => 'Mihoen met Cha Sieuw vlees',
            'description' => '',
            'price' => 11.20
        ]);

        Dish::create([
            'id' => '57',
            'category_id' => 5,
            'name' => 'Chinese Bami Ling Fa',
            'description' => '',
            'price' => 16.90
        ]);

        Dish::create([
            'id' => '58',
            'category_id' => 5,
            'name' => 'Chinese Bami met varkensvlees',
            'description' => '',
            'price' => 10.10
        ]);

        Dish::create([
            'id' => '58A',
            'category_id' => 5,
            'name' => 'Chinese Bami met kipfilet',
            'description' => '',
            'price' => 10.10
        ]);

        Dish::create([
            'id' => '58B',
            'category_id' => 5,
            'name' => 'Chinese Bami met Cha Sieuw-Vlees',
            'description' => '',
            'price' => 11.20
        ]);

        Dish::create([
            'id' => '58C',
            'category_id' => 5,
            'name' => 'Chinese Bami met garnalen',
            'description' => '',
            'price' => 11.20
        ]);

        Dish::create([
            'id' => '58D',
            'category_id' => 5,
            'name' => 'Chinese Bami met ossehaas',
            'description' => '',
            'price' => 17.40
        ]);

        Dish::create([
            'id' => 'M1',
            'category_id' => 6,
            'name' => 'Bami of Nasi Rames Ling Fa',
            'description' => '',
            'price' => 15.30
        ]);

        Dish::create([
            'id' => 'M2',
            'category_id' => 6,
            'name' => 'Bami of Nasi Rames',
            'description' => '',
            'price' => 8.50
        ]);

        Dish::create([
            'id' => 'M3',
            'category_id' => 6,
            'name' => 'Bami of Nasi Rames special',
            'description' => '',
            'price' => 9.00
        ]);

        Dish::create([
            'id' => 'M4',
            'category_id' => 6,
            'name' => 'Gado Gado',
            'description' => '',
            'price' => 7.60
        ]);

        Dish::create([
            'id' => 'M5',
            'category_id' => 6,
            'name' => 'Gado Gado met vlees',
            'description' => '',
            'price' => 8.80
        ]);

        Dish::create([
            'id' => 'M6',
            'category_id' => 6,
            'name' => 'Daging Roedjak',
            'description' => '',
            'price' => 13.30
        ]);

        Dish::create([
            'id' => '59',
            'category_id' => 7,
            'name' => 'Foe Yong Hai Ling Fa',
            'description' => '',
            'price' => 16.40
        ]);

        Dish::create([
            'id' => '60',
            'category_id' => 7,
            'name' => 'Foe Yong Hai met varkensvlees',
            'description' => '',
            'price' => 9.30
        ]);

        Dish::create([
            'id' => '61',
            'category_id' => 7,
            'name' => 'Foe Yong Hai met kipfilet',
            'description' => '',
            'price' => 9.30
        ]);

        Dish::create([
            'id' => '62',
            'category_id' => 7,
            'name' => 'Foe Yong Hai met krab',
            'description' => '',
            'price' => 11.30
        ]);

        Dish::create([
            'id' => '63',
            'category_id' => 7,
            'name' => 'Foe Yong Hai met Cha Sieuw Vlees',
            'description' => '',
            'price' => 11.20
        ]);

        Dish::create([
            'id' => '63B',
            'category_id' => 7,
            'name' => 'Foe Yong Hai met ossehaas',
            'description' => '',
            'price' => 17.40
        ]);

        Dish::create([
            'id' => '64',
            'category_id' => 8,
            'name' => 'Tjap Tjoy Ling Fa',
            'description' => '',
            'price' => 16.40
        ]);

        Dish::create([
            'id' => '65',
            'category_id' => 8,
            'name' => 'Tjap Tjoy met varkensvlees',
            'description' => '',
            'price' => 9.30
        ]);

        Dish::create([
            'id' => '66',
            'category_id' => 8,
            'name' => 'Tjap Tjoy met kipfilet',
            'description' => '',
            'price' => 9.30
        ]);

        Dish::create([
            'id' => '67',
            'category_id' => 8,
            'name' => 'Tjap Tjoy met ossehaas',
            'description' => '',
            'price' => 11.20
        ]);

        Dish::create([
            'id' => '68',
            'category_id' => 8,
            'name' => 'Tjap Tjoy met garnalen',
            'description' => '',
            'price' => 11.20
        ]);

        Dish::create([
            'id' => '70',
            'category_id' => 9,
            'name' => 'Babi Pangang',
            'description' => '',
            'price' => 12.20
        ]);

        Dish::create([
            'id' => '71',
            'category_id' => 9,
            'name' => 'Babi Pangang in ketjapsaus',
            'description' => '',
            'price' => 12.30
        ]);
        Dish::create([
            'id' => '72',
            'category_id' => 10,
            'name' => 'Cha Sieuw (rood geroosterd varkensvlees)',
            'description' => '',
            'price' => 13.30
        ]);

        Dish::create([
            'id' => '73',
            'category_id' => 10,
            'name' => 'Cha Sieuw in pikante saus',
            'description' => '',
            'price' => 13.30
        ]);

        Dish::create([
            'id' => '74',
            'category_id' => 10,
            'name' => 'Geroosterde Speenvarken',
            'description' => '',
            'price' => 13.80
        ]);

        Dish::create([
            'id' => '75',
            'category_id' => 10,
            'name' => 'Koe Loe Yuk (bolletjes vlees met zoetzure saus)',
            'description' => '',
            'price' => 11.90
        ]);

        Dish::create([
            'id' => '76',
            'category_id' => 10,
            'name' => 'Varkenshaas met kerriesaus',
            'description' => '',
            'price' => 11.90
        ]);

        Dish::create([
            'id' => '77',
            'category_id' => 10,
            'name' => 'Varkenshaas met tomatensaus',
            'description' => '',
            'price' => 11.90
        ]);

        Dish::create([
            'id' => '78',
            'category_id' => 10,
            'name' => 'Varkenshaas met champignons in knoflooksaus',
            'description' => '',
            'price' => 12.90
        ]);

        Dish::create([
            'id' => '78A',
            'category_id' => 10,
            'name' => 'Varkenshaas met Chinese champignons',
            'description' => '',
            'price' => 12.90
        ]);

        Dish::create([
            'id' => '78B',
            'category_id' => 10,
            'name' => 'Varkenshaas met zwarte bonensaus',
            'description' => '',
            'price' => 12.90
        ]);

        Dish::create([
            'id' => '78C',
            'category_id' => 10,
            'name' => 'Varkenshaas met verse ananas in zoetzure saus',
            'description' => '',
            'price' => 12.90
        ]);

        Dish::create([
            'id' => '79',
            'category_id' => 10,
            'name' => 'Yu Sian Yuk',
            'description' => '',
            'price' => 13.30
        ]);

        Dish::create([
            'id' => '79A',
            'category_id' => 10,
            'name' => 'Yu Sian Yuk (varkenshaas met niet zoet pikante kruiden saus)',
            'description' => '',
            'price' => 13.30
        ]);

        Dish::create([
            'id' => '79C',
            'category_id' => 10,
            'name' => 'SzeChuan Yuk (varkenshaas met pittige kruiden saus)',
            'description' => '',
            'price' => 13.30
        ]);

        Dish::create([
            'id' => '80',
            'category_id' => 11,
            'name' => 'Ajam Pangang',
            'description' => '',
            'price' => 13.00
        ]);

        Dish::create([
            'id' => '81',
            'category_id' => 11,
            'name' => 'Ajam Pangang in ketjapsaus',
            'description' => '',
            'price' => 13.00
        ]);

        Dish::create([
            'id' => '82',
            'category_id' => 11,
            'name' => 'Koe Loe Kai (bolletjes kip met zoetzure saus)',
            'description' => '',
            'price' => 13.00
        ]);

        Dish::create([
            'id' => '83',
            'category_id' => 11,
            'name' => 'Kipfilet met kerriesaus',
            'description' => '',
            'price' => 13.00
        ]);

        Dish::create([
            'id' => '84',
            'category_id' => 11,
            'name' => 'Kipfilet met champignons in knoflooksaus',
            'description' => '',
            'price' => 13.00
        ]);

        Dish::create([
            'id' => '85',
            'category_id' => 11,
            'name' => 'Kipfilet met Chinese champignons',
            'description' => '',
            'price' => 13.00
        ]);

        Dish::create([
            'id' => '86',
            'category_id' => 11,
            'name' => 'Kipfilet met broccoli in knoflooksaus',
            'description' => '',
            'price' => 13.00
        ]);

        Dish::create([
            'id' => '87',
            'category_id' => 11,
            'name' => 'Kipfilet met zwarte bonensaus',
            'description' => '',
            'price' => 13.00
        ]);

        Dish::create([
            'id' => '88',
            'category_id' => 11,
            'name' => 'Kipfilet met verse ananas in zoetzure saus',
            'description' => '',
            'price' => 13.00
        ]);

        Dish::create([
            'id' => '89',
            'category_id' => 11,
            'name' => 'Kipfilet met Yu Hsiang saus',
            'description' => '',
            'price' => 13.00
        ]);

        Dish::create([
            'id' => '90',
            'category_id' => 11,
            'name' => 'Tjap Tjoy met kipfilet',
            'description' => '',
            'price' => 13.30
        ]);

        Dish::create([
            'id' => '91',
            'category_id' => 11,
            'name' => 'Tjap Tjoy met garnalen',
            'description' => '',
            'price' => 13.30
        ]);

        Dish::create([
            'id' => '92',
            'category_id' => 11,
            'name' => 'Ja Yoe Kai',
            'description' => '',
            'price' => 13.00
        ]);

        Dish::create([
            'id' => '93',
            'category_id' => 11,
            'name' => 'Ja Yoe Kai (kipfilet met pittige kruiden saus)',
            'description' => '',
            'price' => 13.30
        ]);

        Dish::create([
            'id' => '94',
            'category_id' => 11,
            'name' => 'SzeChuan Kai (kipfilet met pittige kruiden saus)',
            'description' => '',
            'price' => 13.30
        ]);

        Dish::create([
            'id' => '97',
            'category_id' => 11,
            'name' => 'Kung Bao Kai',
            'description' => '',
            'price' => 13.30
        ]);

        Dish::create([
            'id' => '98',
            'category_id' => 12,
            'name' => 'Garnalen met champignons in knoflooksaus',
            'description' => '',
            'price' => 15.90
        ]);

        Dish::create([
            'id' => '99',
            'category_id' => 12,
            'name' => 'Garnalen met tomatensaus',
            'description' => '',
            'price' => 15.90
        ]);

        Dish::create([
            'id' => '100',
            'category_id' => 12,
            'name' => 'Garnalen met ketjapsaus',
            'description' => '',
            'price' => 15.90
        ]);

        Dish::create([
            'id' => '101',
            'category_id' => 12,
            'name' => 'Garnalen met broccoli',
            'description' => '',
            'price' => 15.90
        ]);

        Dish::create([
            'id' => '102',
            'category_id' => 12,
            'name' => 'Garnalen met Chinese champignons',
            'description' => '',
            'price' => 15.90
        ]);
    }
}
