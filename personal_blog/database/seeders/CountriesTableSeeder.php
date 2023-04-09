<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'id' => 1,
                'name' => 'Afghanistan',
                'short_code' => 'af',

            ],
            [
                'id' => 2,
                'name' => 'Albania',
                'short_code' => 'al',
            ],
            [
                'id' => 3,
                'name' => 'Algeria',
                'short_code' => 'dz',
            ],
            [
                'id' => 4,
                'name' => 'American Samoa',
                'short_code' => 'as',
            ],
            [
                'id' => 5,
                'name' => 'Andorra',
                'short_code' => 'ad',
            ],
            [
                'id' => 6,
                'name' => 'Angola',
                'short_code' => 'ao',
            ],
            [
                'id' => 7,
                'name' => 'Anguilla',
                'short_code' => 'ai',
            ],
            [
                'id' => 8,
                'name' => 'Antarctica',
                'short_code' => 'aq',
            ],
            [
                'id' => 9,
                'name' => 'Antigua and Barbuda',
                'short_code' => 'ag',
            ],
            [
                'id' => 10,
                'name' => 'Argentina',
                'short_code' => 'ar',
            ],
            [
                'id' => 11,
                'name' => 'Armenia',
                'short_code' => 'am',
            ],
            [
                'id' => 12,
                'name' => 'Aruba',
                'short_code' => 'aw',
            ],
            [
                'id' => 13,
                'name' => 'Australia',
                'short_code' => 'au',
            ],
            [
                'id' => 14,
                'name' => 'Austria',
                'short_code' => 'at',
            ],
            [
                'id' => 15,
                'name' => 'Azerbaijan',
                'short_code' => 'az',
            ],
            [
                'id' => 16,
                'name' => 'Bahamas',
                'short_code' => 'bs',
            ],
            [
                'id' => 17,
                'name' => 'Bahrain',
                'short_code' => 'bh',
            ],
            [
                'id' => 18,
                'name' => 'Bangladesh',
                'short_code' => 'bd',
            ],
            [
                'id' => 19,
                'name' => 'Barbados',
                'short_code' => 'bb',
            ],
            [
                'id' => 20,
                'name' => 'Belarus',
                'short_code' => 'by',
            ],
            [
                'id' => 21,
                'name' => 'Belgium',
                'short_code' => 'be',
            ],
            [
                'id' => 22,
                'name' => 'Belize',
                'short_code' => 'bz',
            ],
            [
                'id' => 23,
                'name' => 'Benin',
                'short_code' => 'bj',
            ],
            [
                'id' => 24,
                'name' => 'Bermuda',
                'short_code' => 'bm',
            ],
            [
                'id' => 25,
                'name' => 'Bhutan',
                'short_code' => 'bt',
            ],
            [
                'id' => 26,
                'name' => 'Bolivia',
                'short_code' => 'bo',
            ],
            [
                'id' => 27,
                'name' => 'Bosnia and Herzegovina',
                'short_code' => 'ba',
            ],
            [
                'id' => 28,
                'name' => 'Botswana',
                'short_code' => 'bw',
            ],
            [
                'id' => 29,
                'name' => 'Brazil',
                'short_code' => 'br',
            ],
            [
                'id' => 30,
                'name' => 'British Indian Ocean Territory',
                'short_code' => 'io',
            ],
            [
                'id' => 31,
                'name' => 'British Virgin Islands',
                'short_code' => 'vg',
            ],
            [
                'id' => 32,
                'name' => 'Brunei',
                'short_code' => 'bn',
            ],
            [
                'id' => 33,
                'name' => 'Bulgaria',
                'short_code' => 'bg',
            ],
            [
                'id' => 34,
                'name' => 'Burkina Faso',
                'short_code' => 'bf',
            ],
            [
                'id' => 35,
                'name' => 'Burundi',
                'short_code' => 'bi',
            ],
            [
                'id' => 36,
                'name' => 'Cambodia',
                'short_code' => 'kh',
            ],
            [
                'id' => 37,
                'name' => 'Cameroon',
                'short_code' => 'cm',
            ],
            [
                'id' => 38,
                'name' => 'Canada',
                'short_code' => 'ca',
            ],
            [
                'id' => 39,
                'name' => 'Cape Verde',
                'short_code' => 'cv',
            ],
            [
                'id' => 40,
                'name' => 'Cayman Islands',
                'short_code' => 'ky',
            ],
            [
                'id' => 41,
                'name' => 'Central African Republic',
                'short_code' => 'cf',
            ],
            [
                'id' => 42,
                'name' => 'Chad',
                'short_code' => 'td',
            ],
            [
                'id' => 43,
                'name' => 'Chile',
                'short_code' => 'cl',
            ],
            [
                'id' => 44,
                'name' => 'China',
                'short_code' => 'cn',
            ],
            [
                'id' => 45,
                'name' => 'Christmas Island',
                'short_code' => 'cx',
            ],
            [
                'id' => 46,
                'name' => 'Cocos Islands',
                'short_code' => 'cc',
            ],
            [
                'id' => 47,
                'name' => 'Colombia',
                'short_code' => 'co',
            ],
            [
                'id' => 48,
                'name' => 'Comoros',
                'short_code' => 'km',
            ],
            [
                'id' => 49,
                'name' => 'Cook Islands',
                'short_code' => 'ck',
            ],
            [
                'id' => 50,
                'name' => 'Costa Rica',
                'short_code' => 'cr',
            ],
            [
                'id' => 51,
                'name' => 'Croatia',
                'short_code' => 'hr',
            ],
            [
                'id' => 52,
                'name' => 'Cuba',
                'short_code' => 'cu',
            ],
            [
                'id' => 53,
                'name' => 'Curacao',
                'short_code' => 'cw',
            ],
            [
                'id' => 54,
                'name' => 'Cyprus',
                'short_code' => 'cy',
            ],
            [
                'id' => 55,
                'name' => 'Czech Republic',
                'short_code' => 'cz',
            ],
            [
                'id' => 56,
                'name' => 'Democratic Republic of the Congo',
                'short_code' => 'cd',
            ],
            [
                'id' => 57,
                'name' => 'Denmark',
                'short_code' => 'dk',
            ],
            [
                'id' => 58,
                'name' => 'Djibouti',
                'short_code' => 'dj',
            ],
            [
                'id' => 59,
                'name' => 'Dominica',
                'short_code' => 'dm',
            ],
            [
                'id' => 60,
                'name' => 'Dominican Republic',
                'short_code' => 'do',
            ],
            [
                'id' => 61,
                'name' => 'East Timor',
                'short_code' => 'tl',
            ],
            [
                'id' => 62,
                'name' => 'Ecuador',
                'short_code' => 'ec',
            ],
            [
                'id' => 63,
                'name' => 'Egypt',
                'short_code' => 'eg',
            ],
            [
                'id' => 64,
                'name' => 'El Salvador',
                'short_code' => 'sv',
            ],
            [
                'id' => 65,
                'name' => 'Equatorial Guinea',
                'short_code' => 'gq',
            ],
            [
                'id' => 66,
                'name' => 'Eritrea',
                'short_code' => 'er',
            ],
            [
                'id' => 67,
                'name' => 'Estonia',
                'short_code' => 'ee',
            ],
            [
                'id' => 68,
                'name' => 'Ethiopia',
                'short_code' => 'et',
            ],
            [
                'id' => 69,
                'name' => 'Falkland Islands',
                'short_code' => 'fk',
            ],
            [
                'id' => 70,
                'name' => 'Faroe Islands',
                'short_code' => 'fo',
            ],
            [
                'id' => 71,
                'name' => 'Fiji',
                'short_code' => 'fj',
            ],
            [
                'id' => 72,
                'name' => 'Finland',
                'short_code' => 'fi',
            ],
            [
                'id' => 73,
                'name' => 'France',
                'short_code' => 'fr',
            ],
            [
                'id' => 74,
                'name' => 'French Polynesia',
                'short_code' => 'pf',
            ],
            [
                'id' => 75,
                'name' => 'Gabon',
                'short_code' => 'ga',
            ],
            [
                'id' => 76,
                'name' => 'Gambia',
                'short_code' => 'gm',
            ],
            [
                'id' => 77,
                'name' => 'Georgia',
                'short_code' => 'ge',
            ],
            [
                'id' => 78,
                'name' => 'Germany',
                'short_code' => 'de',
            ],
            [
                'id' => 79,
                'name' => 'Ghana',
                'short_code' => 'gh',
            ],
            [
                'id' => 80,
                'name' => 'Gibraltar',
                'short_code' => 'gi',
            ],
            [
                'id' => 81,
                'name' => 'Greece',
                'short_code' => 'gr',
            ],
            [
                'id' => 82,
                'name' => 'Greenland',
                'short_code' => 'gl',
            ],
            [
                'id' => 83,
                'name' => 'Grenada',
                'short_code' => 'gd',
            ],
            [
                'id' => 84,
                'name' => 'Guam',
                'short_code' => 'gu',
            ],
            [
                'id' => 85,
                'name' => 'Guatemala',
                'short_code' => 'gt',
            ],
            [
                'id' => 86,
                'name' => 'Guernsey',
                'short_code' => 'gg',
            ],
            [
                'id' => 87,
                'name' => 'Guinea',
                'short_code' => 'gn',
            ],
            [
                'id' => 88,
                'name' => 'Guinea-Bissau',
                'short_code' => 'gw',
            ],
            [
                'id' => 89,
                'name' => 'Guyana',
                'short_code' => 'gy',
            ],
            [
                'id' => 90,
                'name' => 'Haiti',
                'short_code' => 'ht',
            ],
            [
                'id' => 91,
                'name' => 'Honduras',
                'short_code' => 'hn',
            ],
            [
                'id' => 92,
                'name' => 'Hong Kong',
                'short_code' => 'hk',
            ],
            [
                'id' => 93,
                'name' => 'Hungary',
                'short_code' => 'hu',
            ],
            [
                'id' => 94,
                'name' => 'Iceland',
                'short_code' => 'is',
            ],
            [
                'id' => 95,
                'name' => 'India',
                'short_code' => 'in',
            ],
            [
                'id' => 96,
                'name' => 'Indonesia',
                'short_code' => 'id',
            ],
            [
                'id' => 97,
                'name' => 'Iran',
                'short_code' => 'ir',
            ],
            [
                'id' => 98,
                'name' => 'Iraq',
                'short_code' => 'iq',
            ],
            [
                'id' => 99,
                'name' => 'Ireland',
                'short_code' => 'ie',
            ],
            [
                'id' => 100,
                'name' => 'Isle of Man',
                'short_code' => 'im',
            ],
            [
                'id' => 101,
                'name' => 'Israel',
                'short_code' => 'il',
            ],
            [
                'id' => 102,
                'name' => 'Italy',
                'short_code' => 'it',
            ],
            [
                'id' => 103,
                'name' => 'Ivory Coast',
                'short_code' => 'ci',
            ],
            [
                'id' => 104,
                'name' => 'Jamaica',
                'short_code' => 'jm',
            ],
            [
                'id' => 105,
                'name' => 'Japan',
                'short_code' => 'jp',
            ],
            [
                'id' => 106,
                'name' => 'Jersey',
                'short_code' => 'je',
            ],
            [
                'id' => 107,
                'name' => 'Jordan',
                'short_code' => 'jo',
            ],
            [
                'id' => 108,
                'name' => 'Kazakhstan',
                'short_code' => 'kz',
            ],
            [
                'id' => 109,
                'name' => 'Kenya',
                'short_code' => 'ke',
            ],
            [
                'id' => 110,
                'name' => 'Kiribati',
                'short_code' => 'ki',
            ],
            [
                'id' => 111,
                'name' => 'Kosovo',
                'short_code' => 'xk',
            ],
            [
                'id' => 112,
                'name' => 'Kuwait',
                'short_code' => 'kw',
            ],
            [
                'id' => 113,
                'name' => 'Kyrgyzstan',
                'short_code' => 'kg',
            ],
            [
                'id' => 114,
                'name' => 'Laos',
                'short_code' => 'la',
            ],
            [
                'id' => 115,
                'name' => 'Latvia',
                'short_code' => 'lv',
            ],
            [
                'id' => 116,
                'name' => 'Lebanon',
                'short_code' => 'lb',
            ],
            [
                'id' => 117,
                'name' => 'Lesotho',
                'short_code' => 'ls',
            ],
            [
                'id' => 118,
                'name' => 'Liberia',
                'short_code' => 'lr',
            ],
            [
                'id' => 119,
                'name' => 'Libya',
                'short_code' => 'ly',
            ],
            [
                'id' => 120,
                'name' => 'Liechtenstein',
                'short_code' => 'li',
            ],
            [
                'id' => 121,
                'name' => 'Lithuania',
                'short_code' => 'lt',
            ],
            [
                'id' => 122,
                'name' => 'Luxembourg',
                'short_code' => 'lu',
            ],
            [
                'id' => 123,
                'name' => 'Macau',
                'short_code' => 'mo',
            ],
            [
                'id' => 124,
                'name' => 'North Macedonia',
                'short_code' => 'mk',
            ],
            [
                'id' => 125,
                'name' => 'Madagascar',
                'short_code' => 'mg',
            ],
            [
                'id' => 126,
                'name' => 'Malawi',
                'short_code' => 'mw',
            ],
            [
                'id' => 127,
                'name' => 'Malaysia',
                'short_code' => 'my',
            ],
            [
                'id' => 128,
                'name' => 'Maldives',
                'short_code' => 'mv',
            ],
            [
                'id' => 129,
                'name' => 'Mali',
                'short_code' => 'ml',
            ],
            [
                'id' => 130,
                'name' => 'Malta',
                'short_code' => 'mt',
            ],
            [
                'id' => 131,
                'name' => 'Marshall Islands',
                'short_code' => 'mh',
            ],
            [
                'id' => 132,
                'name' => 'Mauritania',
                'short_code' => 'mr',
            ],
            [
                'id' => 133,
                'name' => 'Mauritius',
                'short_code' => 'mu',
            ],
            [
                'id' => 134,
                'name' => 'Mayotte',
                'short_code' => 'yt',
            ],
            [
                'id' => 135,
                'name' => 'Mexico',
                'short_code' => 'mx',
            ],
            [
                'id' => 136,
                'name' => 'Micronesia',
                'short_code' => 'fm',
            ],
            [
                'id' => 137,
                'name' => 'Moldova',
                'short_code' => 'md',
            ],
            [
                'id' => 138,
                'name' => 'Monaco',
                'short_code' => 'mc',
            ],
            [
                'id' => 139,
                'name' => 'Mongolia',
                'short_code' => 'mn',
            ],
            [
                'id' => 140,
                'name' => 'Montenegro',
                'short_code' => 'me',
            ],
            [
                'id' => 141,
                'name' => 'Montserrat',
                'short_code' => 'ms',
            ],
            [
                'id' => 142,
                'name' => 'Morocco',
                'short_code' => 'ma',
            ],
            [
                'id' => 143,
                'name' => 'Mozambique',
                'short_code' => 'mz',
            ],
            [
                'id' => 144,
                'name' => 'Myanmar',
                'short_code' => 'mm',
            ],
            [
                'id' => 145,
                'name' => 'Namibia',
                'short_code' => 'na',
            ],
            [
                'id' => 146,
                'name' => 'Nauru',
                'short_code' => 'nr',
            ],
            [
                'id' => 147,
                'name' => 'Nepal',
                'short_code' => 'np',
            ],
            [
                'id' => 148,
                'name' => 'Netherlands',
                'short_code' => 'nl',
            ],
            [
                'id' => 149,
                'name' => 'Netherlands Antilles',
                'short_code' => 'an',
            ],
            [
                'id' => 150,
                'name' => 'New Caledonia',
                'short_code' => 'nc',
            ],
            [
                'id' => 151,
                'name' => 'New Zealand',
                'short_code' => 'nz',
            ],
            [
                'id' => 152,
                'name' => 'Nicaragua',
                'short_code' => 'ni',
            ],
            [
                'id' => 153,
                'name' => 'Niger',
                'short_code' => 'ne',
            ],
            [
                'id' => 154,
                'name' => 'Nigeria',
                'short_code' => 'ng',
            ],
            [
                'id' => 155,
                'name' => 'Niue',
                'short_code' => 'nu',
            ],
            [
                'id' => 156,
                'name' => 'North Korea',
                'short_code' => 'kp',
            ],
            [
                'id' => 157,
                'name' => 'Northern Mariana Islands',
                'short_code' => 'mp',
            ],
            [
                'id' => 158,
                'name' => 'Norway',
                'short_code' => 'no',
            ],
            [
                'id' => 159,
                'name' => 'Oman',
                'short_code' => 'om',
            ],
            [
                'id' => 160,
                'name' => 'Pakistan',
                'short_code' => 'pk',
            ],
            [
                'id' => 161,
                'name' => 'Palau',
                'short_code' => 'pw',
            ],
            [
                'id' => 162,
                'name' => 'Palestine',
                'short_code' => 'ps',
            ],
            [
                'id' => 163,
                'name' => 'Panama',
                'short_code' => 'pa',
            ],
            [
                'id' => 164,
                'name' => 'Papua New Guinea',
                'short_code' => 'pg',
            ],
            [
                'id' => 165,
                'name' => 'Paraguay',
                'short_code' => 'py',
            ],
            [
                'id' => 166,
                'name' => 'Peru',
                'short_code' => 'pe',
            ],
            [
                'id' => 167,
                'name' => 'Philippines',
                'short_code' => 'ph',
            ],
            [
                'id' => 168,
                'name' => 'Pitcairn',
                'short_code' => 'pn',
            ],
            [
                'id' => 169,
                'name' => 'Poland',
                'short_code' => 'pl',
            ],
            [
                'id' => 170,
                'name' => 'Portugal',
                'short_code' => 'pt',
            ],
            [
                'id' => 171,
                'name' => 'Puerto Rico',
                'short_code' => 'pr',
            ],
            [
                'id' => 172,
                'name' => 'Qatar',
                'short_code' => 'qa',
            ],
            [
                'id' => 173,
                'name' => 'Republic of the Congo',
                'short_code' => 'cg',
            ],
            [
                'id' => 174,
                'name' => 'Reunion',
                'short_code' => 're',
            ],
            [
                'id' => 175,
                'name' => 'Romania',
                'short_code' => 'ro',
            ],
            [
                'id' => 176,
                'name' => 'Russia',
                'short_code' => 'ru',
            ],
            [
                'id' => 177,
                'name' => 'Rwanda',
                'short_code' => 'rw',
            ],
            [
                'id' => 178,
                'name' => 'Saint Barthelemy',
                'short_code' => 'bl',
            ],
            [
                'id' => 179,
                'name' => 'Saint Helena',
                'short_code' => 'sh',
            ],
            [
                'id' => 180,
                'name' => 'Saint Kitts and Nevis',
                'short_code' => 'kn',
            ],
            [
                'id' => 181,
                'name' => 'Saint Lucia',
                'short_code' => 'lc',
            ],
            [
                'id' => 182,
                'name' => 'Saint Martin',
                'short_code' => 'mf',
            ],
            [
                'id' => 183,
                'name' => 'Saint Pierre and Miquelon',
                'short_code' => 'pm',
            ],
            [
                'id' => 184,
                'name' => 'Saint Vincent and the Grenadines',
                'short_code' => 'vc',
            ],
            [
                'id' => 185,
                'name' => 'Samoa',
                'short_code' => 'ws',
            ],
            [
                'id' => 186,
                'name' => 'San Marino',
                'short_code' => 'sm',
            ],
            [
                'id' => 187,
                'name' => 'Sao Tome and Principe',
                'short_code' => 'st',
            ],
            [
                'id' => 188,
                'name' => 'Saudi Arabia',
                'short_code' => 'sa',
            ],
            [
                'id' => 189,
                'name' => 'Senegal',
                'short_code' => 'sn',
            ],
            [
                'id' => 190,
                'name' => 'Serbia',
                'short_code' => 'rs',
            ],
            [
                'id' => 191,
                'name' => 'Seychelles',
                'short_code' => 'sc',
            ],
            [
                'id' => 192,
                'name' => 'Sierra Leone',
                'short_code' => 'sl',
            ],
            [
                'id' => 193,
                'name' => 'Singapore',
                'short_code' => 'sg',
            ],
            [
                'id' => 194,
                'name' => 'Sint Maarten',
                'short_code' => 'sx',
            ],
            [
                'id' => 195,
                'name' => 'Slovakia',
                'short_code' => 'sk',
            ],
            [
                'id' => 196,
                'name' => 'Slovenia',
                'short_code' => 'si',
            ],
            [
                'id' => 197,
                'name' => 'Solomon Islands',
                'short_code' => 'sb',
            ],
            [
                'id' => 198,
                'name' => 'Somalia',
                'short_code' => 'so',
            ],
            [
                'id' => 199,
                'name' => 'South Africa',
                'short_code' => 'za',
            ],
            [
                'id' => 200,
                'name' => 'South Korea',
                'short_code' => 'kr',
            ],
            [
                'id' => 201,
                'name' => 'South Sudan',
                'short_code' => 'ss',
            ],
            [
                'id' => 202,
                'name' => 'Spain',
                'short_code' => 'es',
            ],
            [
                'id' => 203,
                'name' => 'Sri Lanka',
                'short_code' => 'lk',
            ],
            [
                'id' => 204,
                'name' => 'Sudan',
                'short_code' => 'sd',
            ],
            [
                'id' => 205,
                'name' => 'Suriname',
                'short_code' => 'sr',
            ],
            [
                'id' => 206,
                'name' => 'Svalbard and Jan Mayen',
                'short_code' => 'sj',
            ],
            [
                'id' => 207,
                'name' => 'Swaziland',
                'short_code' => 'sz',
            ],
            [
                'id' => 208,
                'name' => 'Sweden',
                'short_code' => 'se',
            ],
            [
                'id' => 209,
                'name' => 'Switzerland',
                'short_code' => 'ch',
            ],
            [
                'id' => 210,
                'name' => 'Syria',
                'short_code' => 'sy',
            ],
            [
                'id' => 211,
                'name' => 'Taiwan',
                'short_code' => 'tw',
            ],
            [
                'id' => 212,
                'name' => 'Tajikistan',
                'short_code' => 'tj',
            ],
            [
                'id' => 213,
                'name' => 'Tanzania',
                'short_code' => 'tz',
            ],
            [
                'id' => 214,
                'name' => 'Thailand',
                'short_code' => 'th',
            ],
            [
                'id' => 215,
                'name' => 'Togo',
                'short_code' => 'tg',
            ],
            [
                'id' => 216,
                'name' => 'Tokelau',
                'short_code' => 'tk',
            ],
            [
                'id' => 217,
                'name' => 'Tonga',
                'short_code' => 'to',
            ],
            [
                'id' => 218,
                'name' => 'Trinidad and Tobago',
                'short_code' => 'tt',
            ],
            [
                'id' => 219,
                'name' => 'Tunisia',
                'short_code' => 'tn',
            ],
            [
                'id' => 220,
                'name' => 'Turkey',
                'short_code' => 'tr',
            ],
            [
                'id' => 221,
                'name' => 'Turkmenistan',
                'short_code' => 'tm',
            ],
            [
                'id' => 222,
                'name' => 'Turks and Caicos Islands',
                'short_code' => 'tc',
            ],
            [
                'id' => 223,
                'name' => 'Tuvalu',
                'short_code' => 'tv',
            ],
            [
                'id' => 224,
                'name' => 'U.S. Virgin Islands',
                'short_code' => 'vi',
            ],
            [
                'id' => 225,
                'name' => 'Uganda',
                'short_code' => 'ug',
            ],
            [
                'id' => 226,
                'name' => 'Ukraine',
                'short_code' => 'ua',
            ],
            [
                'id' => 227,
                'name' => 'United Arab Emirates',
                'short_code' => 'ae',
            ],
            [
                'id' => 228,
                'name' => 'United Kingdom',
                'short_code' => 'gb',
            ],
            [
                'id' => 229,
                'name' => 'United States',
                'short_code' => 'us',
            ],
            [
                'id' => 230,
                'name' => 'Uruguay',
                'short_code' => 'uy',
            ],
            [
                'id' => 231,
                'name' => 'Uzbekistan',
                'short_code' => 'uz',
            ],
            [
                'id' => 232,
                'name' => 'Vanuatu',
                'short_code' => 'vu',
            ],
            [
                'id' => 233,
                'name' => 'Vatican',
                'short_code' => 'va',
            ],
            [
                'id' => 234,
                'name' => 'Venezuela',
                'short_code' => 've',
            ],
            [
                'id' => 235,
                'name' => 'Vietnam',
                'short_code' => 'vn',
            ],
            [
                'id' => 236,
                'name' => 'Wallis and Futuna',
                'short_code' => 'wf',
            ],
            [
                'id' => 237,
                'name' => 'Western Sahara',
                'short_code' => 'eh',
            ],
            [
                'id' => 238,
                'name' => 'Yemen',
                'short_code' => 'ye',
            ],
            [
                'id' => 239,
                'name' => 'Zambia',
                'short_code' => 'zm',
            ],
            [
                'id' => 240,
                'name' => 'Zimbabwe',
                'short_code' => 'zw',
            ],
        ];

        Country::insert($countries);
    }
}
