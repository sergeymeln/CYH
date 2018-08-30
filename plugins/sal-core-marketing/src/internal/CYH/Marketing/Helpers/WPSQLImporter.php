<?php
namespace CYH\Marketing\Helpers;

use CYH\Models\Filters\ProductFilter;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\ProductsService;
use CYH\Marketing\Services\MarketingService;

class WPSQLImporter
{
    const PROD_IDS = '26,30,67,69,77,96,132,134,136,154,156,167,173,227,230,241,285,296,337,339,343,360,381,401,403,483,488,495,514,535,550,621,622,626,678,706,709,753,772,789,891,907,974,978,979,1009,1044,1099,1107,1180,1193,1200,1231,1305,1323,1337,1368,1375,1382,1387,1396,1419,1455,1501,1519,1534,1542,1606,1625,1627,1632,1675,1693,1694,1703,1730,1744,1746,1802,1813,1844,1853,1872,1927,1938,1943,1945,1963,1969,1971,1974,1998,2000,2001,2016,2022,2031,2079,2090,2092,2118,2136,2144,2156,2164,2165,2175,2179,2180,2183,2185,2198,2200,2214,2219,2220,2226,2231,2239,2254,2258,2259,2261,2265,2269,2289,2304,2309,2335,2341,2342,2350,2353,2366,2368,2376,2398,2399,2415,2422,2426,2431,2436,2439,2447,2448,2449,2492,2501,2503,2506,2511,2517,2537,2538,2550,2553,2559,2577,2609,2612,2622,2623,2640,2641,2642,2645,2679,2693,2697,2709,2716,2731,2735,2746,2781,2784,2798,2805,2807,2820,2823,2832,2833,2845,2853,2857,2858,2861,2867,2888,2889,2896,2905,2913,2915,2925,2933,2934,2935,2936,2944,2950,2962,2964,2970,2986,2988,2993,3001,3005,3013,3026,3027,3033,3039,3040,3041,3043,3047,3050,3065,3068,3081,3083,3094,3096,3105,3108,3110,3113,3117,3119,3122,3125,3126,3129,3134,3135,3137,3138,3139,3140,3141,3144,3145,3148,3153,3192,3211,3216,3238,3254,3273,3285,3299,3300,3310,3314,3315,3323,3324,3326,3329,3344,3351,3352,3359,3368,3379,3386,3394,3402,3423,3431,3436,3437,3457,3462,3483,3491,3504,3509,3527,3531,3550,3590,3620,3623,3681,3695,3701,3704,3740,3765,3782,3852,3881,3918,3919,3921,3922,3953,3954,3970,3978,3981,3993,4002,4004,4005,4028,4034,4035,4038,4039,4040,4041,4050,4051,4056,4057,4079,4080,4143,4144,4149,4168,4172,4173,4182,4184,4185,4208,4218,4220,4223,4228,4232,4238,4242,4250,4252,4256,4257,4258,4260,4261,4262,4265,4273,4274,4276,4279,4281,4300,4353,4356,4359,4360,4389,4416,4425,4431,4432,4448,4456,4458,4461,4466,4467,4473,4525,4527,4530,4545,4602,4619,4622,4652,4664,4682,4700,4720,4723,4765,4779,4785,4786,4787,4800,4840,4843,4850,4853,4857,4872,4884,4886,4889,4913,4915,4927,4934,4942,4947,4952,4990,4992,5046,5055,5062,5067,5068,5070,5092,5141,5153,5154,5207,5212,5227,5270,5326,5378,5387,5425,5500,5550,5572,5599,5629,5630,5682,5685,5692,5698,5714,5778,5792,5999,6005,6059,6096,6118,6119,6149,6179,6197,6216,6234,6296,6411,6539,6542,6547,6670,6812,6897,6924,6945,6987,6999,7003,7009,7015,7019,7038,7052,7069,7080,7085,7094,7098,7111,7118,7119,7126,7149,7151,7158,7194,7216,7230,7280,7320,7321,7329,7411,7412,7437,7439,7440,7441,7454,7484,7593,7646,7647,7679,7689,7690,7830,7831,7842,7855,7887,7888,7898,7903,7950,7958,7959,7965,7981,8019,8104,8176,8198,8271,8349,8447,8448,8597,8602,8620,8634,8681,8698,8775,8831,8899,8922,8923,8975,8979,8989,8990,9003,9029,9031,9032,9096,9098,9105,9118,9119,9125,9173,9174,9219,9278,9314,9368,9369,9468,9469,9536,9590,9611,9713,9719,9744,9789,9837,9858,9859,9866,9906,9907,9910,9948,9978,9994,10035,10039,10094,10095,10165,10176,10200,10206,10210,10213,10247,10295,10296,10298,10382,10397,10401,10408,10418,10429,10444,10470,10525,10543,10580,10636,10723,10759,10764,10774,10803,10806,10950,11003,11011,11050,11051,11052,11128,11136,11139,11155,11170,11186,11187,11272,11352,11392,11393,11430,11529,11545,11572,11577,11602,11610,11629,11646,12089,12099,12175,12276,12280,12486,12538,12541,12606,12608,12609,12617,12753,12957,12990,13090,13161,13198,13239,13382,13555,13610,13648,13712,13748,13756,13775,13786,13794,13828,13843,13851,13861,13892,13902,13949,13956,13971,13974,14008,14013,14125,14141,14162,14185,14211,14319,14325,14340,14360,14371,14375,14426,14445,14447,14449,14465,14521,14528,14538,14560,14569,14609,14626,14634,14640,14661,14674,14677,14683,14698,14750,14752,14761,14798,14830,14846,14850,14854,14874,14879,14910,14917,14960,14973,14982,14990,15033,15049,15064,15088,15130,15150,15155,15164,15177,15204,15230,15270,15283,15306,15319,15347,15356,15381,15384,15389,15403,15435,15499,15574,15581,15619,15648,15691,15692,15698,15712,15739,15836,15864,15917,15934,16042,16072,16094,16095,16097,16121,16130,16188,16192,16195,16209,16229,16282,16351,16593,16705,16706,16727,16763,16844,16861,16963,17164,17177,17224,17280,17307,17523,17646,17648,17727,17748,17752,17760,17838,17877,17882,17891,17923,17951,18007,18051,18107,18189,18358,18367,18416,18452,18609,18741,18750,18779,18782,19440,19624,19724,19733,19756,20049,20153,20395,20417,20437,20760,20856,20911,20978,21018,21057,21211,21387,21419,21423,21427,21490,21504,21704,21921,21927,21940,21941,21952,22013,22079,22101,22157,22165,22189,22197,22254,22259,22264,22277,22285,22297,22316,22331,22365,22367,22371,22373,22400,22434,22436,22459,22469,22513,22522,22530,22558,22578,22624,22625,22627,22629,22631,22635,22640,22667,22679,22681,22689,22708,22709,22736,22777,22833,22863,22869,22942,22960,22972,22973,22994,23031,23076,23102,23123,23124,23154,23172,23182,23188,23379,23404,23574,23575,23580,23647,23724,23737,23972,23977,24091,24209,24215,24300,24379,24485,24534,24619,24930,25105,25163,25191,25214,25216,25233,25262,25318,25367,25379,25401,25493,25633,25649,25664,25701,25764,25778,25789,25801,25866,25929,25937,25955,25981,26077,26109,26269,26293,26333,26344,26347,26351,26365,26378,26392,26413,26416,26422,26425,26440,26449,26457,26460,26469,26514,26520,26525,26584,26624,26652,26667,26670,26691,26705,26719,26761,26768,26776,26779,26793,26820,26841,26856,26866,26898,26911,26915,26918,26921,26942,27022,27034,27064,27065,27075,27101,27113,27114,27115,27128,27136,27139,27238,27276,27278,27283,27285,27303,27318,27324,27337,27339,27360,27382,27383,27388,27397,27426,27452,27474,27500,27504,27513,27532,27569,27573,27587,27590,27673,27696,27702,27735,27748,27757,27825,27827,27829,27841,27842,27846,27848,27863,27876,27880,27884,27896,27908,27921,27941,27942,27945,27946,27959,27987,28041,28104,28159,28161,28170,28273,28301,28305,28336,28695,28697,28736,28785,28786,28850,28866,28872,29181,29183,29237,29244,29247,29279,29341,29372,29410,29495,29517,29562,29602,29643,29710,29725,29807,29815,29837,29844,29866,29876,29961,30003,30020,30069,30097,30199,30200,30401,30476,30507,30508,30530,30539,30585,30603,30652,30700,30710,30879,30919,31064,31146,31196,31285,31348,31422,31431,31444,31584,31755,31833,32148,32198,32231,32262,32306,32429,32492,32594,32623,32636,32652,32679,32783,32804,32812,32822,32937,32977,33038,33045,33056,33075,33091,33101,33128,33195,33223,33268,33339,33346,33370,33372,33412,33444,33471,33475,33488,33511,33521,33542,33543,33591,33604,33614,33631,33652,33672,33678,33702,33715,33724,33759,33769,33900,33923,34016,34585,34890,34906,35175,35328,35335,35487,35512,35893,35922,35952,36063,36229,36651,37002,37020,37021,37023,37028,37029,37030,37033,37046,37048,37055,37058,37059,37062,37063,37064,37068,37069,37075,37078,37081,37082,37085,37088,37138,37153,37155,37194,37214,37221,37222,37223,37225,37233,37297,37312,37318,37328,37329,37379,37413,37427,37429,37480,37564,37580,37603,37606,37623,37779,37982,38047,38201,38249,38250,38365,38427,38525,38536,38577,38596,38651,38700,38774,38799,38821,38843,38849,38850,38856,38859,38920,38925,38930,38955,38972,38977,38981,38984,38993,39026,39046,39050,39051,39137,39149,39210,39229,39240,39265,39276,39306,39311,39313,39389,39395,39411,39445,39453,39454,39505,39519,39528,39568,39588,39591,39634,39660,39676,39712,39724,39736,39748,39756,39762,39788,39796,39820,39827,39887,39924,39956,39969,40049,40072,40083,40118,40151,40167,40190,40194,40214,40218,40239,40241,40296,40326,40342,40389,40394,40413,40414,40428,40440,40526,40571,40573,40590,40591,40616,40737,40764,40770,40820,40846,40856,40910,40941,40977,41012,41103,41106,41112,41131,41143,41159,41164,41177,41183,41192,41196,41200,41202,41213,41218,41227,41235,41263,41266,41281,41319,41376,41383,41425,41484,41519,41522,41586,41601,41606,41667,41672,41699,41707,41726,41732,41742,41797,41831,41852,41883,41884,41890,41905,41917,41937,41966,41967,41999,42045,42049,42053,42120,42130,42136,42140,42142,42148,42159,42211,42218,42251,42265,42267,42278,42298,42403,42411,42485,42486,42492,42497,42519,42563,42633,42652,42685,42686,42688,42710,42715,42722,42743,42744,42767,42799,42843,42904,42999,43081,43367,43457,43571,43577,43728,43755,43788,43934,44009,44041,44123,44206,44332,44475,44743,44752,44758,44770,44902,44920,44933,44955,44964,44990,44998,45003,45067,45068,45108,45130,45131,45144,45148,45156,45222,45226,45252,45260,45270,45312,45318,45321,45326,45336,45346,45359,45363,45379,45391,45392,45410,45415,45431,45437,45441,45444,45449,45467,45478,45482';
    const ZIP_OFFSET_OPTION_NAME = 'cyh_smart_zip_offset';
    const ZIP_CITY_BATCH_LIMIT = 10;

    protected $prodService = null;
    protected $dataTransformerHelper;
    protected $marketingService = null;
    protected $urlHelper = null;
    const INTERNET_AND_BUNDLES_CATEGORIES = [4,5,7];
    const INTERNET_CATEGORIES = [4,5];
    const INTERNET_TV_CATEGORIES = [7];
    const COOKIE_ZIP_NAME = 'cyh_city_zip';
    const COOKIE_APPLY_ZIP_NAME = 'cyh_apply_city_zip';

    public function __construct()
    {
        $this->prodService = new ProductsService();
    }

    public function saveUsCitiesContent()
    {
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 0);
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM us_cities", OBJECT);

        $citiesToInsertCount = $wpdb->get_var('SELECT COUNT(*) FROM '.$wpdb->prefix.'cyh_city');

        if($citiesToInsertCount == 0) {
            $usedStatesCodes = [];
            foreach ($results as $result) {
                if(!array_key_exists($result->state_code, $usedStatesCodes)) {
                    $wpdb->insert($wpdb->prefix.'cyh_state', ['state_name' => $result->state, 'state_short_name' => $result->state_code]);
                    $usedStatesCodes[$result->state_code] = $wpdb->insert_id;
                }

                $stateId = $usedStatesCodes[$result->state_code];

                $wpdb->insert($wpdb->prefix.'cyh_city',
                    [
                        'country_id' => 1,
                        'state_id'=>$stateId,
                        'latitude'=>$result->latitude,
                        'longitude'=>$result->longitude,
                        'city_name'=>strtolower(str_replace([' ', 'ñ', '.','(', ')'], ['-', 'n', '-','-', ''],$result->name)),
                        'city_normal_name'=>str_replace(['(', ')'], ['', ''],$result->name),
                        'city_type'=>$result->type,
                        'county'=>$result->county,
                        'state_code'=>$result->state_code,
                        'area_code'=>$result->area_code,
                        'population'=>$result->population,
                        'city_time_zone'=>$result->time_zone,
                        'city_house_holds'=>$result->households,
                        'city_land_area'=>$result->land_area,
                        'city_water_area'=>$result->water_area,
                        'zip_code'=>$result->zip_codes,
                    ]
                );
            }
        }

        $cities = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'cyh_city WHERE city_type IN("City", "Town", "Township", "Village", "Borough", "Metropolitan Government")', OBJECT);
        $allTagLines = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'cyh_tag_lines', OBJECT);
        $universalButtels = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'cyh_universal_statistic_bullets', OBJECT);

        $tmp=0;
        $halfCities = count($cities)/2;
        foreach($cities as $city) {
            $lessUsedNeeded = 0;

            if($tmp>=$halfCities) {
                $lessUsedNeeded = 1;
            }
            //end temporary code
            $sectionOne = $this->GenerateSection($city->id, 1, $lessUsedNeeded);
            $sectionTwo = $this->GenerateSection($city->id, 2, $lessUsedNeeded);
            $sectionThree = $this->GenerateSection($city->id, 3, $lessUsedNeeded);
            $state = $wpdb->get_var('SELECT state_name FROM '.$wpdb->prefix.'cyh_state WHERE id='.$city->state_id);
            $tmp++;
            $sectionOne = $this->GenerateContent($city->city_normal_name, $state, $sectionOne);
            $sectionTwo = $this->GenerateContent($city->city_normal_name, $state, $sectionTwo);
            $sectionThree = $this->GenerateContent($city->city_normal_name, $state, $sectionThree);
            $this->updateContentNew($city->id, $sectionOne, $sectionTwo, $sectionThree);
            /*$tagLines = $this->GenerateTagLines(1, $allTagLines);

            $wpdb->insert($wpdb->prefix.'cyh_city_content',
                [
                    'section_one' => $sectionOne,
                    'section_two'=>$sectionTwo,
                    'section_three'=>$sectionThree,
                    'key_words_seo_meta'=>'',
                    'description_seo_meta'=>'',
                    'city_id'=>$city->id,
                    'tag_lines_id'=>$tagLines[0],
                    'section_one_text'=>'',
                    'section_two_text'=>'',
                    'section_three_text'=>''
                ]
            );
            $bullets = $this->GenerateUniversalStatisticBullets(1, $universalButtels);
            $cityContentId = $wpdb->insert_id;

            foreach ($bullets as $bullet) {
                $wpdb->insert($wpdb->prefix.'cyh_city_to_universal_statistic_bullets',
                    [
                        'usb_id' => $bullet,
                        'city_content_id'=>$cityContentId
                    ]
                );
            }*/
        }

        echo 'FINISH';exit;

    }

    private function GenerateSection($cityId, $type=1, $lessUsedNeeded = 0)
    {
        global $wpdb;
        $typesMap = [
            1 => [1,2,3,4],
            2 => [5,6,7],
            3 => [8,9],
        ];

        $foundedParagraphsIds = [];
        $foundedParagraphs = [];
        $generatedText = '';
        if($lessUsedNeeded == 1) {
            foreach ($typesMap[$type] as $section) {
                $foundedParagraphs[] = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'cyh_content WHERE type='.$section.' ORDER BY usage_count ASC LIMIT 1', OBJECT);
            }
        } else {
            foreach ($typesMap[$type] as $section) {
                $foundedParagraphs[] = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'cyh_content WHERE type='.$section.' ORDER BY RAND() LIMIT 1', OBJECT);
            }
        }
        foreach ($foundedParagraphs as $paragr) {
            $generatedText.=$paragr[0]->content;
            $foundedParagraphsIds[] = $paragr[0]->id;
        }
        $wpdb->query('UPDATE '.$wpdb->prefix.'cyh_content SET usage_count=usage_count+1 WHERE id IN('.implode(',',$foundedParagraphsIds).')');

        return $generatedText;
    }

    private function GenerateContent($city, $state, $text)
    {
        $text = str_replace('$city', $city, $text);
        $text = str_replace('$state', $state, $text);
        preg_match_all('/{.*?}/',$text, $matches);

        $excludeReplaceTags = ['{text}', '{/text}'];
        if (count($matches[0])>0) {
            foreach($matches[0] as $match) {
                if(in_array($match, $excludeReplaceTags)) {
                    continue;
                }
                $matchArr = explode('|', $match);
                for ($i=0; $i<count($matchArr); $i++) {
                    $matchArr[$i] = str_replace(['{', '}'], '', $matchArr[$i]);
                }
                $matchCount = count($matchArr);
                $text = str_replace($match, $matchArr[rand(0, $matchCount-1)], $text);
            }
        }

        return $text;

    }

    private function GenerateUniversalStatisticBullets($cityId, $allBullets, $randCount=8)
    {
        $founded = [];
        $randomBullets = array_rand($allBullets, $randCount);
        for($i=0; $i<count($randomBullets); $i++) {
            $founded[] = $allBullets[$randomBullets[$i]]->id;
        }

        return $founded;
    }

    private function GenerateTagLines($cityId, $allTags, $randCount=1)
    {
        $founded = [];

        $randomTags = rand(0,count($allTags)-1);

        if (is_int($randomTags)) {
            $founded[] = $allTags[$randomTags]->id;

            return $founded;
        }

        for($i=0; $i<count($randomTags); $i++) {
            $founded[] = $allTags[$randomTags[$i]]->id;
        }

        return $founded;
    }

    public function updateContent()
    {
        ini_set('memory_limit', -1);
        global $wpdb;
        $results = $wpdb->get_results("SELECT id, section_two FROM wp_cyh_city_content", OBJECT);
        foreach($results as $res) {
            preg_match_all('/{great\r\n\|fabulous\|long-term}/',$res->section_two, $matches);

            if (count($matches[0])>0) {
                foreach($matches[0] as $match) {
                    $matchRepl = str_replace("\r\n",'',$match);
                    $matchArr = explode('|', $matchRepl);
                    for ($i=0; $i<count($matchArr); $i++) {
                        $matchArr[$i] = str_replace(['{', '}'], '', $matchArr[$i]);
                    }
                    $matchCount = count($matchArr);
                    $text = str_replace($match, $matchArr[rand(0, $matchCount-1)], $res->section_two);
                    $wpdb->query('UPDATE '.$wpdb->prefix.'cyh_city_content SET section_three = REPLACE(section_three, "'.$match.'", "'.$matchArr[rand(0, $matchCount-1)].'") WHERE id='.$res->id.';');
                    $wpdb->query('UPDATE '.$wpdb->prefix.'cyh_city_content SET section_three = REPLACE(section_three, "”", """) WHERE id='.$res->id.';');
                    $wpdb->query('UPDATE '.$wpdb->prefix.'cyh_city_content SET section_three = REPLACE(section_three, "“", """) WHERE id='.$res->id.';');
                }
            }

        }
        echo 'END';
        exit;
    }

    public function getOpenCitiesData()
    {
        global $wpdb;
        $results = $wpdb->get_results("SELECT c.city_name, c.state_code FROM wp_cyh_city c 
        INNER JOIN wp_cyh_city_content cc ON c.id=cc.city_id WHERE cc.is_published=1", OBJECT);
        foreach ($results as $res) {
            echo 'https://staging.connectyourhome.com/internet/'.strtolower($res->state_code).'/'.$res->city_name.'<br>';
        }
        exit;
    }

    public function openCities()
    {

        global $wpdb;
        $results = $wpdb->get_results("SELECT c.id, c.city_name, c.state_code FROM wp_cyh_city c 
        INNER JOIN wp_cyh_city_content cc ON c.id=cc.city_id WHERE section_two_text <> ''", OBJECT);
        $ids = [];
        foreach ($results as $res) {
            $ids[] = $res->id;
        }
        $impl = implode(',', $ids);

        $results = $wpdb->get_results("SELECT DISTINCT id, city_normal_name, state_code, population FROM `wp_cyh_city` WHERE id NOT IN(".$impl.") 
        AND city_type IN('City', 'Town', 'Township', 'Village') 
        GROUP BY city_normal_name, state_code 
        ORDER BY population DESC LIMIT 20000", OBJECT);

        foreach ($results as $res) {
            $ids[] = $res->id;
        }
        $impl = implode(',', $ids);
        $wpdb->query('UPDATE '.$wpdb->prefix.'cyh_city_content SET is_published = 1 WHERE city_id IN('.$impl.');');
        echo $impl;

        exit;
    }

    public function getNotCities()
    {

        global $wpdb;
        $results = $wpdb->get_results("SELECT c.id, c.city_type, c.city_name, c.state_code FROM wp_cyh_city c 
        INNER JOIN wp_cyh_city_content cc ON c.id=cc.city_id WHERE section_two_text <> '' AND city_type NOT IN('City', 'Town', 'Township', 'Village');", OBJECT);
        echo '<pre>'; print_r($results);exit;
        foreach ($results as $res) {
            echo 'https://staging.connectyourhome.com/internet/'.strtolower($res->state_code).'/'.$res->city_name.'<br>';
        }

        exit;
    }

    public function openMoreCities()
    {

        global $wpdb;
        //$statesArr = ['AK','DC','DE','HI','ME','NH','SD','WV','WY','MS','MT','KY','ND','NE','RI','NM','SC','AR','ID','AL','KS','LA','NV','OK'];
        $statesArr = $wpdb->get_results("SELECT state_short_name FROM `wp_cyh_state`", OBJECT);

        $ids=[];
        $allIds = [];
        foreach ($statesArr as $state) {
            $results = $wpdb->get_results("SELECT id, city_normal_name, population FROM `wp_cyh_city` WHERE state_code='".$state->state_short_name."' 
        AND city_type IN('City', 'Town', 'Township', 'Village') ORDER BY population DESC LIMIT 21", OBJECT);

            foreach ($results as $res) {
                $ids[] = $res->id;
                $allIds[] = $res->id;
            }
            $impl = implode(',', $ids);
            $wpdb->query('UPDATE '.$wpdb->prefix.'cyh_city_content SET is_published = 1 WHERE city_id IN('.$impl.');');
        }

        $imp = implode(',', $allIds);
        echo 'Count: '.count($allIds).'<br>';
        echo $imp;

        exit;
    }

    public function getOpenCitiesIds()
    {
        global $wpdb;
        $results = $wpdb->get_results("SELECT c.id FROM wp_cyh_city c 
        INNER JOIN wp_cyh_city_content cc ON c.id=cc.city_id WHERE cc.is_published=1", OBJECT);
        $ids=[];
        foreach ($results as $res) {
            $ids[]=$res->id;
        }
        $imp = implode(',', $ids);
        echo 'Count: '.count($ids).'<br>';
        echo $imp;
        exit;
    }

    private function updateContentNew($cityId, $sectionOne, $sectionTwo, $sectionThree)
    {
        global $wpdb;

        $sectionOne = str_replace(["'", '(Town)','(Township)'], ['&rsquo;','Town','Township'], $sectionOne);
        $sectionTwo = str_replace(["'", '(Town)','(Township)'], ['&rsquo;','Town','Township'], $sectionTwo);
        $sectionThree = str_replace(["'", '(Town)','(Township)'], ['&rsquo;','Town','Township'], $sectionThree);
        $wpdb->query('UPDATE '.$wpdb->prefix.'cyh_city_content SET section_one="", section_two="", section_three="" 
         WHERE city_id='.$cityId.' AND section_two_text="";');
        $wpdb->query('UPDATE '.$wpdb->prefix."cyh_city_content SET section_one='".$sectionOne."', section_two='".$sectionTwo."', section_three='".$sectionThree."' 
         WHERE city_id=".$cityId." AND section_two_text='';");
    }

    public function setMaximumProvidersZip()
    {
        global $wpdb;
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 0);

        $offset = get_option(self::ZIP_OFFSET_OPTION_NAME);
        if(!$offset) {
            $offset = 0;
        }

        $results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."cyh_zip_providers", OBJECT);
        $processedIds = [];
        foreach($results as $result) {
            $processedIds[]=$result->city_id;
        }
        $processedIds = implode(',',$processedIds);

        $results = $wpdb->get_results("SELECT c.id, c.city_name, c.city_normal_name, c.state_code, c.zip_code FROM wp_cyh_city c 
        INNER JOIN ".$wpdb->prefix."cyh_city_content cc ON c.id=cc.city_id WHERE cc.is_published=1 
         AND c.id NOT IN(".$processedIds.") ORDER BY c.population DESC", OBJECT);

        $providersCount = [];
        foreach ($results as $result) {
            $zips = array_map('trim', explode('/', $result->zip_code));
            foreach ($zips as $zip) {
                //TODO: Invoke real SAL method
                $productFilter = new ProductFilter();

                $productFilter->Zip = $zip;
                $productList = $this->prodService->GetAllProducts($productFilter, CacheSettingsProvider::GetCacheDisabledSettings());

                if(count($productList) ==0) {
                    continue;
                }
                $productList = $this->filterProducts($productList);
                $cnt = $this->getProvidersCountFromProducts($productList);
                $providersCount[$result->id][$zip] = $cnt;
            }

            $max = 0;
            $foundedZip=0;

            foreach($providersCount[$result->id] as $zip=>$count) {
                if($count>$max)
                {
                    $max = $count;
                    $foundedZip = $zip;
                }
            }
            $providersCount[$result->id] = [];
            $providersCount[$result->id][$foundedZip] = $max;

            $wpdb->insert($wpdb->prefix.'cyh_zip_providers',
                [
                    'city_id' => $result->id,
                    'zip_code'=>$foundedZip,
                    'providers_count'=>$max
                ]
            );
            $offset++;
            update_option( self::ZIP_OFFSET_OPTION_NAME, $offset );
        }

        echo 'END';exit;
    }

    /**
     * @param $allProducts
     * @return array
     */
    private function filterProducts($allProducts)
    {
        $filteredProducts = [];
        if (count($allProducts) > 0) {
            foreach ($allProducts as $product) {
                if(in_array($product->ServiceProviderCategory->Category->Id, self::INTERNET_AND_BUNDLES_CATEGORIES)) {
                    $filteredProducts[] = $product;
                }
            }
        }

        return $filteredProducts;
    }

    /**
     * @param $products
     * @return array
     */
    private function getProvidersCountFromProducts($products)
    {
        $uniqueProviderIds = [];
        foreach ($products as $product) {
            if(!in_array($product->ServiceProviderCategory->Provider->Id, $uniqueProviderIds)) {
                array_push($uniqueProviderIds, $product->ServiceProviderCategory->Provider->Id);
            }
        }

        return count($uniqueProviderIds);
    }

    public function getBestZipCities()
    {
        global $wpdb;
        $results = $wpdb->get_results("SELECT c.id, c.city_name, c.city_normal_name, c.state_code, zp.zip_code FROM wp_cyh_city c 
        INNER JOIN ".$wpdb->prefix."cyh_zip_providers zp ON c.id=zp.city_id", OBJECT);

        foreach ($results as $res) {
            $strZip = (string)$res->zip_code;
            if(strlen($strZip) != 5) {
                $newZip = '0'.$strZip;
                $wpdb->query('UPDATE '.$wpdb->prefix."cyh_zip_providers SET zip_code='".$newZip."' 
                 WHERE city_id=".$res->id.';');
            }

            echo 'https://staging.connectyourhome.com/internet/'.strtolower($res->state_code).'/'.$res->city_name.'/<br>';
        }

        exit;
    }

    public function getZeroZipCities()
    {
        global $wpdb;
        $results = $wpdb->get_results("SELECT c.* FROM `wp_cyh_city` c inner join `wp_cyh_zip_providers` zp on c.id=zp.city_id where zp.zip_code=0;", OBJECT);

        foreach ($results as $res) {
            echo 'https://www.connectyourhome.com/internet/'.strtolower($res->state_code).'/'.$res->city_name.'/  ZIP_CODE: '.$res->zip_code.'<br>';
        }

        exit;
    }
}
