<?php


namespace CYH\Marketing\Helpers;


class WPSQLImporter
{
    const PROD_IDS = '26,30,67,69,77,96,132,134,136,154,156,167,173,227,230,241,285,296,337,339,343,360,381,401,403,483,488,495,514,535,550,621,622,626,678,706,709,753,772,789,891,907,974,978,979,1009,1044,1099,1107,1180,1193,1200,1231,1305,1323,1337,1368,1375,1382,1387,1396,1419,1455,1501,1519,1534,1542,1606,1625,1627,1632,1675,1693,1694,1703,1730,1744,1746,1802,1813,1844,1853,1872,1927,1938,1943,1945,1963,1969,1971,1974,1998,2000,2001,2016,2022,2031,2079,2090,2092,2118,2136,2144,2156,2164,2165,2175,2179,2180,2183,2185,2198,2200,2214,2219,2220,2226,2231,2239,2254,2258,2259,2261,2265,2269,2289,2304,2309,2335,2341,2342,2350,2353,2366,2368,2376,2398,2399,2415,2422,2426,2431,2436,2439,2447,2448,2449,2492,2501,2503,2506,2511,2517,2537,2538,2550,2553,2559,2577,2609,2612,2622,2623,2640,2641,2642,2645,2679,2693,2697,2709,2716,2731,2735,2746,2781,2784,2798,2805,2807,2820,2823,2832,2833,2845,2853,2857,2858,2861,2867,2888,2889,2896,2905,2913,2915,2925,2933,2934,2935,2936,2944,2950,2962,2964,2970,2986,2988,2993,3001,3005,3013,3026,3027,3033,3039,3040,3041,3043,3047,3050,3065,3068,3081,3083,3094,3096,3105,3108,3110,3113,3117,3119,3122,3125,3126,3129,3134,3135,3137,3138,3139,3140,3141,3144,3145,3148,3153,3192,3211,3216,3238,3254,3273,3285,3299,3300,3310,3314,3315,3323,3324,3326,3329,3344,3351,3352,3359,3368,3379,3386,3394,3402,3423,3431,3436,3437,3457,3462,3483,3491,3504,3509,3527,3531,3550,3590,3620,3623,3681,3695,3701,3704,3740,3765,3782,3852,3881,3918,3919,3921,3922,3953,3954,3970,3978,3981,3993,4002,4004,4005,4028,4034,4035,4038,4039,4040,4041,4050,4051,4056,4057,4079,4080,4143,4144,4149,4168,4172,4173,4182,4184,4185,4208,4218,4220,4223,4228,4232,4238,4242,4250,4252,4256,4257,4258,4260,4261,4262,4265,4273,4274,4276,4279,4281,4300,4353,4356,4359,4360,4389,4416,4425,4431,4432,4448,4456,4458,4461,4466,4467,4473,4525,4527,4530,4545,4602,4619,4622,4652,4664,4682,4700,4720,4723,4765,4779,4785,4786,4787,4800,4840,4843,4850,4853,4857,4872,4884,4886,4889,4913,4915,4927,4934,4942,4947,4952,4990,4992,5046,5055,5062,5067,5068,5070,5092,5141,5153,5154,5207,5212,5227,5270,5326,5378,5387,5425,5500,5550,5572,5599,5629,5630,5682,5685,5692,5698,5714,5778,5792,5999,6005,6059,6096,6118,6119,6149,6179,6197,6216,6234,6296,6411,6539,6542,6547,6670,6812,6897,6924,6945,6987,6999,7003,7009,7015,7019,7038,7052,7069,7080,7085,7094,7098,7111,7118,7119,7126,7149,7151,7158,7194,7216,7230,7280,7320,7321,7329,7411,7412,7437,7439,7440,7441,7454,7484,7593,7646,7647,7679,7689,7690,7830,7831,7842,7855,7887,7888,7898,7903,7950,7958,7959,7965,7981,8019,8104,8176,8198,8271,8349,8447,8448,8597,8602,8620,8634,8681,8698,8775,8831,8899,8922,8923,8975,8979,8989,8990,9003,9029,9031,9032,9096,9098,9105,9118,9119,9125,9173,9174,9219,9278,9314,9368,9369,9468,9469,9536,9590,9611,9713,9719,9744,9789,9837,9858,9859,9866,9906,9907,9910,9948,9978,9994,10035,10039,10094,10095,10165,10176,10200,10206,10210,10213,10247,10295,10296,10298,10382,10397,10401,10408,10418,10429,10444,10470,10525,10543,10580,10636,10723,10759,10764,10774,10803,10806,10950,11003,11011,11050,11051,11052,11128,11136,11139,11155,11170,11186,11187,11272,11352,11392,11393,11430,11529,11545,11572,11577,11602,11610,11629,11646,12089,12099,12175,12276,12280,12486,12538,12541,12606,12608,12609,12617,12753,12957,12990,13090,13161,13198,13239,13382,13555,13610,13648,13712,13748,13756,13775,13786,13794,13828,13843,13851,13861,13892,13902,13949,13956,13971,13974,14008,14013,14125,14141,14162,14185,14211,14319,14325,14340,14360,14371,14375,14426,14445,14447,14449,14465,14521,14528,14538,14560,14569,14609,14626,14634,14640,14661,14674,14677,14683,14698,14750,14752,14761,14798,14830,14846,14850,14854,14874,14879,14910,14917,14960,14973,14982,14990,15033,15049,15064,15088,15130,15150,15155,15164,15177,15204,15230,15270,15283,15306,15319,15347,15356,15381,15384,15389,15403,15435,15499,15574,15581,15619,15648,15691,15692,15698,15712,15739,15836,15864,15917,15934,16042,16072,16094,16095,16097,16121,16130,16188,16192,16195,16209,16229,16282,16351,16593,16705,16706,16727,16763,16844,16861,16963,17164,17177,17224,17280,17307,17523,17646,17648,17727,17748,17752,17760,17838,17877,17882,17891,17923,17951,18007,18051,18107,18189,18358,18367,18416,18452,18609,18741,18750,18779,18782,19440,19624,19724,19733,19756,20049,20153,20395,20417,20437,20760,20856,20911,20978,21018,21057,21211,21387,21419,21423,21427,21490,21504,21704,21921,21927,21940,21941,21952,22013,22079,22101,22157,22165,22189,22197,22254,22259,22264,22277,22285,22297,22316,22331,22365,22367,22371,22373,22400,22434,22436,22459,22469,22513,22522,22530,22558,22578,22624,22625,22627,22629,22631,22635,22640,22667,22679,22681,22689,22708,22709,22736,22777,22833,22863,22869,22942,22960,22972,22973,22994,23031,23076,23102,23123,23124,23154,23172,23182,23188,23379,23404,23574,23575,23580,23647,23724,23737,23972,23977,24091,24209,24215,24300,24379,24485,24534,24619,24930,25105,25163,25191,25214,25216,25233,25262,25318,25367,25379,25401,25493,25633,25649,25664,25701,25764,25778,25789,25801,25866,25929,25937,25955,25981,26077,26109,26269,26293,26333,26344,26347,26351,26365,26378,26392,26413,26416,26422,26425,26440,26449,26457,26460,26469,26514,26520,26525,26584,26624,26652,26667,26670,26691,26705,26719,26761,26768,26776,26779,26793,26820,26841,26856,26866,26898,26911,26915,26918,26921,26942,27022,27034,27064,27065,27075,27101,27113,27114,27115,27128,27136,27139,27238,27276,27278,27283,27285,27303,27318,27324,27337,27339,27360,27382,27383,27388,27397,27426,27452,27474,27500,27504,27513,27532,27569,27573,27587,27590,27673,27696,27702,27735,27748,27757,27825,27827,27829,27841,27842,27846,27848,27863,27876,27880,27884,27896,27908,27921,27941,27942,27945,27946,27959,27987,28041,28104,28159,28161,28170,28273,28301,28305,28336,28695,28697,28736,28785,28786,28850,28866,28872,29181,29183,29237,29244,29247,29279,29341,29372,29410,29495,29517,29562,29602,29643,29710,29725,29807,29815,29837,29844,29866,29876,29961,30003,30020,30069,30097,30199,30200,30401,30476,30507,30508,30530,30539,30585,30603,30652,30700,30710,30879,30919,31064,31146,31196,31285,31348,31422,31431,31444,31584,31755,31833,32148,32198,32231,32262,32306,32429,32492,32594,32623,32636,32652,32679,32783,32804,32812,32822,32937,32977,33038,33045,33056,33075,33091,33101,33128,33195,33223,33268,33339,33346,33370,33372,33412,33444,33471,33475,33488,33511,33521,33542,33543,33591,33604,33614,33631,33652,33672,33678,33702,33715,33724,33759,33769,33900,33923,34016,34585,34890,34906,35175,35328,35335,35487,35512,35893,35922,35952,36063,36229,36651,37002,37020,37021,37023,37028,37029,37030,37033,37046,37048,37055,37058,37059,37062,37063,37064,37068,37069,37075,37078,37081,37082,37085,37088,37138,37153,37155,37194,37214,37221,37222,37223,37225,37233,37297,37312,37318,37328,37329,37379,37413,37427,37429,37480,37564,37580,37603,37606,37623,37779,37982,38047,38201,38249,38250,38365,38427,38525,38536,38577,38596,38651,38700,38774,38799,38821,38843,38849,38850,38856,38859,38920,38925,38930,38955,38972,38977,38981,38984,38993,39026,39046,39050,39051,39137,39149,39210,39229,39240,39265,39276,39306,39311,39313,39389,39395,39411,39445,39453,39454,39505,39519,39528,39568,39588,39591,39634,39660,39676,39712,39724,39736,39748,39756,39762,39788,39796,39820,39827,39887,39924,39956,39969,40049,40072,40083,40118,40151,40167,40190,40194,40214,40218,40239,40241,40296,40326,40342,40389,40394,40413,40414,40428,40440,40526,40571,40573,40590,40591,40616,40737,40764,40770,40820,40846,40856,40910,40941,40977,41012,41103,41106,41112,41131,41143,41159,41164,41177,41183,41192,41196,41200,41202,41213,41218,41227,41235,41263,41266,41281,41319,41376,41383,41425,41484,41519,41522,41586,41601,41606,41667,41672,41699,41707,41726,41732,41742,41797,41831,41852,41883,41884,41890,41905,41917,41937,41966,41967,41999,42045,42049,42053,42120,42130,42136,42140,42142,42148,42159,42211,42218,42251,42265,42267,42278,42298,42403,42411,42485,42486,42492,42497,42519,42563,42633,42652,42685,42686,42688,42710,42715,42722,42743,42744,42767,42799,42843,42904,42999,43081,43367,43457,43571,43577,43728,43755,43788,43934,44009,44041,44123,44206,44332,44475,44743,44752,44758,44770,44902,44920,44933,44955,44964,44990,44998,45003,45067,45068,45108,45130,45131,45144,45148,45156,45222,45226,45252,45260,45270,45312,45318,45321,45326,45336,45346,45359,45363,45379,45391,45392,45410,45415,45431,45437,45441,45444,45449,45467,45478,45482';

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

    public function getProdIds()
    {
        $data = '[
	{
		"cid" : 26
	},
	{
		"cid" : 30
	},
	{
		"cid" : 67
	},
	{
		"cid" : 69
	},
	{
		"cid" : 77
	},
	{
		"cid" : 96
	},
	{
		"cid" : 132
	},
	{
		"cid" : 134
	},
	{
		"cid" : 136
	},
	{
		"cid" : 154
	},
	{
		"cid" : 156
	},
	{
		"cid" : 167
	},
	{
		"cid" : 173
	},
	{
		"cid" : 227
	},
	{
		"cid" : 230
	},
	{
		"cid" : 241
	},
	{
		"cid" : 285
	},
	{
		"cid" : 296
	},
	{
		"cid" : 337
	},
	{
		"cid" : 339
	},
	{
		"cid" : 343
	},
	{
		"cid" : 360
	},
	{
		"cid" : 381
	},
	{
		"cid" : 401
	},
	{
		"cid" : 403
	},
	{
		"cid" : 483
	},
	{
		"cid" : 488
	},
	{
		"cid" : 495
	},
	{
		"cid" : 514
	},
	{
		"cid" : 535
	},
	{
		"cid" : 550
	},
	{
		"cid" : 621
	},
	{
		"cid" : 622
	},
	{
		"cid" : 626
	},
	{
		"cid" : 678
	},
	{
		"cid" : 706
	},
	{
		"cid" : 709
	},
	{
		"cid" : 753
	},
	{
		"cid" : 772
	},
	{
		"cid" : 789
	},
	{
		"cid" : 891
	},
	{
		"cid" : 907
	},
	{
		"cid" : 974
	},
	{
		"cid" : 978
	},
	{
		"cid" : 979
	},
	{
		"cid" : 1009
	},
	{
		"cid" : 1044
	},
	{
		"cid" : 1099
	},
	{
		"cid" : 1107
	},
	{
		"cid" : 1180
	},
	{
		"cid" : 1193
	},
	{
		"cid" : 1200
	},
	{
		"cid" : 1231
	},
	{
		"cid" : 1305
	},
	{
		"cid" : 1323
	},
	{
		"cid" : 1337
	},
	{
		"cid" : 1368
	},
	{
		"cid" : 1375
	},
	{
		"cid" : 1382
	},
	{
		"cid" : 1387
	},
	{
		"cid" : 1396
	},
	{
		"cid" : 1419
	},
	{
		"cid" : 1455
	},
	{
		"cid" : 1501
	},
	{
		"cid" : 1519
	},
	{
		"cid" : 1534
	},
	{
		"cid" : 1542
	},
	{
		"cid" : 1606
	},
	{
		"cid" : 1625
	},
	{
		"cid" : 1627
	},
	{
		"cid" : 1632
	},
	{
		"cid" : 1675
	},
	{
		"cid" : 1693
	},
	{
		"cid" : 1694
	},
	{
		"cid" : 1703
	},
	{
		"cid" : 1730
	},
	{
		"cid" : 1744
	},
	{
		"cid" : 1746
	},
	{
		"cid" : 1802
	},
	{
		"cid" : 1813
	},
	{
		"cid" : 1844
	},
	{
		"cid" : 1853
	},
	{
		"cid" : 1872
	},
	{
		"cid" : 1927
	},
	{
		"cid" : 1938
	},
	{
		"cid" : 1943
	},
	{
		"cid" : 1945
	},
	{
		"cid" : 1963
	},
	{
		"cid" : 1969
	},
	{
		"cid" : 1971
	},
	{
		"cid" : 1974
	},
	{
		"cid" : 1998
	},
	{
		"cid" : 2000
	},
	{
		"cid" : 2001
	},
	{
		"cid" : 2016
	},
	{
		"cid" : 2022
	},
	{
		"cid" : 2031
	},
	{
		"cid" : 2079
	},
	{
		"cid" : 2090
	},
	{
		"cid" : 2092
	},
	{
		"cid" : 2118
	},
	{
		"cid" : 2136
	},
	{
		"cid" : 2144
	},
	{
		"cid" : 2156
	},
	{
		"cid" : 2164
	},
	{
		"cid" : 2165
	},
	{
		"cid" : 2175
	},
	{
		"cid" : 2179
	},
	{
		"cid" : 2180
	},
	{
		"cid" : 2183
	},
	{
		"cid" : 2185
	},
	{
		"cid" : 2198
	},
	{
		"cid" : 2200
	},
	{
		"cid" : 2214
	},
	{
		"cid" : 2219
	},
	{
		"cid" : 2220
	},
	{
		"cid" : 2226
	},
	{
		"cid" : 2231
	},
	{
		"cid" : 2239
	},
	{
		"cid" : 2254
	},
	{
		"cid" : 2258
	},
	{
		"cid" : 2259
	},
	{
		"cid" : 2261
	},
	{
		"cid" : 2265
	},
	{
		"cid" : 2269
	},
	{
		"cid" : 2289
	},
	{
		"cid" : 2304
	},
	{
		"cid" : 2309
	},
	{
		"cid" : 2335
	},
	{
		"cid" : 2341
	},
	{
		"cid" : 2342
	},
	{
		"cid" : 2350
	},
	{
		"cid" : 2353
	},
	{
		"cid" : 2366
	},
	{
		"cid" : 2368
	},
	{
		"cid" : 2376
	},
	{
		"cid" : 2398
	},
	{
		"cid" : 2399
	},
	{
		"cid" : 2415
	},
	{
		"cid" : 2422
	},
	{
		"cid" : 2426
	},
	{
		"cid" : 2431
	},
	{
		"cid" : 2436
	},
	{
		"cid" : 2439
	},
	{
		"cid" : 2447
	},
	{
		"cid" : 2448
	},
	{
		"cid" : 2449
	},
	{
		"cid" : 2492
	},
	{
		"cid" : 2501
	},
	{
		"cid" : 2503
	},
	{
		"cid" : 2506
	},
	{
		"cid" : 2511
	},
	{
		"cid" : 2517
	},
	{
		"cid" : 2537
	},
	{
		"cid" : 2538
	},
	{
		"cid" : 2550
	},
	{
		"cid" : 2553
	},
	{
		"cid" : 2559
	},
	{
		"cid" : 2577
	},
	{
		"cid" : 2609
	},
	{
		"cid" : 2612
	},
	{
		"cid" : 2622
	},
	{
		"cid" : 2623
	},
	{
		"cid" : 2640
	},
	{
		"cid" : 2641
	},
	{
		"cid" : 2642
	},
	{
		"cid" : 2645
	},
	{
		"cid" : 2679
	},
	{
		"cid" : 2693
	},
	{
		"cid" : 2697
	},
	{
		"cid" : 2709
	},
	{
		"cid" : 2716
	},
	{
		"cid" : 2731
	},
	{
		"cid" : 2735
	},
	{
		"cid" : 2746
	},
	{
		"cid" : 2781
	},
	{
		"cid" : 2784
	},
	{
		"cid" : 2798
	},
	{
		"cid" : 2805
	},
	{
		"cid" : 2807
	},
	{
		"cid" : 2820
	},
	{
		"cid" : 2823
	},
	{
		"cid" : 2832
	},
	{
		"cid" : 2833
	},
	{
		"cid" : 2845
	},
	{
		"cid" : 2853
	},
	{
		"cid" : 2857
	},
	{
		"cid" : 2858
	},
	{
		"cid" : 2861
	},
	{
		"cid" : 2867
	},
	{
		"cid" : 2888
	},
	{
		"cid" : 2889
	},
	{
		"cid" : 2896
	},
	{
		"cid" : 2905
	},
	{
		"cid" : 2913
	},
	{
		"cid" : 2915
	},
	{
		"cid" : 2925
	},
	{
		"cid" : 2933
	},
	{
		"cid" : 2934
	},
	{
		"cid" : 2935
	},
	{
		"cid" : 2936
	},
	{
		"cid" : 2944
	},
	{
		"cid" : 2950
	},
	{
		"cid" : 2962
	},
	{
		"cid" : 2964
	},
	{
		"cid" : 2970
	},
	{
		"cid" : 2986
	},
	{
		"cid" : 2988
	},
	{
		"cid" : 2993
	},
	{
		"cid" : 3001
	},
	{
		"cid" : 3005
	},
	{
		"cid" : 3013
	},
	{
		"cid" : 3026
	},
	{
		"cid" : 3027
	},
	{
		"cid" : 3033
	},
	{
		"cid" : 3039
	},
	{
		"cid" : 3040
	},
	{
		"cid" : 3041
	},
	{
		"cid" : 3043
	},
	{
		"cid" : 3047
	},
	{
		"cid" : 3050
	},
	{
		"cid" : 3065
	},
	{
		"cid" : 3068
	},
	{
		"cid" : 3081
	},
	{
		"cid" : 3083
	},
	{
		"cid" : 3094
	},
	{
		"cid" : 3096
	},
	{
		"cid" : 3105
	},
	{
		"cid" : 3108
	},
	{
		"cid" : 3110
	},
	{
		"cid" : 3113
	},
	{
		"cid" : 3117
	},
	{
		"cid" : 3119
	},
	{
		"cid" : 3122
	},
	{
		"cid" : 3125
	},
	{
		"cid" : 3126
	},
	{
		"cid" : 3129
	},
	{
		"cid" : 3134
	},
	{
		"cid" : 3135
	},
	{
		"cid" : 3137
	},
	{
		"cid" : 3138
	},
	{
		"cid" : 3139
	},
	{
		"cid" : 3140
	},
	{
		"cid" : 3141
	},
	{
		"cid" : 3144
	},
	{
		"cid" : 3145
	},
	{
		"cid" : 3148
	},
	{
		"cid" : 3153
	},
	{
		"cid" : 3192
	},
	{
		"cid" : 3211
	},
	{
		"cid" : 3216
	},
	{
		"cid" : 3238
	},
	{
		"cid" : 3254
	},
	{
		"cid" : 3273
	},
	{
		"cid" : 3285
	},
	{
		"cid" : 3299
	},
	{
		"cid" : 3300
	},
	{
		"cid" : 3310
	},
	{
		"cid" : 3314
	},
	{
		"cid" : 3315
	},
	{
		"cid" : 3323
	},
	{
		"cid" : 3324
	},
	{
		"cid" : 3326
	},
	{
		"cid" : 3329
	},
	{
		"cid" : 3344
	},
	{
		"cid" : 3351
	},
	{
		"cid" : 3352
	},
	{
		"cid" : 3359
	},
	{
		"cid" : 3368
	},
	{
		"cid" : 3379
	},
	{
		"cid" : 3386
	},
	{
		"cid" : 3394
	},
	{
		"cid" : 3402
	},
	{
		"cid" : 3423
	},
	{
		"cid" : 3431
	},
	{
		"cid" : 3436
	},
	{
		"cid" : 3437
	},
	{
		"cid" : 3457
	},
	{
		"cid" : 3462
	},
	{
		"cid" : 3483
	},
	{
		"cid" : 3491
	},
	{
		"cid" : 3504
	},
	{
		"cid" : 3509
	},
	{
		"cid" : 3527
	},
	{
		"cid" : 3531
	},
	{
		"cid" : 3550
	},
	{
		"cid" : 3590
	},
	{
		"cid" : 3620
	},
	{
		"cid" : 3623
	},
	{
		"cid" : 3681
	},
	{
		"cid" : 3695
	},
	{
		"cid" : 3701
	},
	{
		"cid" : 3704
	},
	{
		"cid" : 3740
	},
	{
		"cid" : 3765
	},
	{
		"cid" : 3782
	},
	{
		"cid" : 3852
	},
	{
		"cid" : 3881
	},
	{
		"cid" : 3918
	},
	{
		"cid" : 3919
	},
	{
		"cid" : 3921
	},
	{
		"cid" : 3922
	},
	{
		"cid" : 3953
	},
	{
		"cid" : 3954
	},
	{
		"cid" : 3970
	},
	{
		"cid" : 3978
	},
	{
		"cid" : 3981
	},
	{
		"cid" : 3993
	},
	{
		"cid" : 4002
	},
	{
		"cid" : 4004
	},
	{
		"cid" : 4005
	},
	{
		"cid" : 4028
	},
	{
		"cid" : 4034
	},
	{
		"cid" : 4035
	},
	{
		"cid" : 4038
	},
	{
		"cid" : 4039
	},
	{
		"cid" : 4040
	},
	{
		"cid" : 4041
	},
	{
		"cid" : 4050
	},
	{
		"cid" : 4051
	},
	{
		"cid" : 4056
	},
	{
		"cid" : 4057
	},
	{
		"cid" : 4079
	},
	{
		"cid" : 4080
	},
	{
		"cid" : 4143
	},
	{
		"cid" : 4144
	},
	{
		"cid" : 4149
	},
	{
		"cid" : 4168
	},
	{
		"cid" : 4172
	},
	{
		"cid" : 4173
	},
	{
		"cid" : 4182
	},
	{
		"cid" : 4184
	},
	{
		"cid" : 4185
	},
	{
		"cid" : 4208
	},
	{
		"cid" : 4218
	},
	{
		"cid" : 4220
	},
	{
		"cid" : 4223
	},
	{
		"cid" : 4228
	},
	{
		"cid" : 4232
	},
	{
		"cid" : 4238
	},
	{
		"cid" : 4242
	},
	{
		"cid" : 4250
	},
	{
		"cid" : 4252
	},
	{
		"cid" : 4256
	},
	{
		"cid" : 4257
	},
	{
		"cid" : 4258
	},
	{
		"cid" : 4260
	},
	{
		"cid" : 4261
	},
	{
		"cid" : 4262
	},
	{
		"cid" : 4265
	},
	{
		"cid" : 4273
	},
	{
		"cid" : 4274
	},
	{
		"cid" : 4276
	},
	{
		"cid" : 4279
	},
	{
		"cid" : 4281
	},
	{
		"cid" : 4300
	},
	{
		"cid" : 4353
	},
	{
		"cid" : 4356
	},
	{
		"cid" : 4359
	},
	{
		"cid" : 4360
	},
	{
		"cid" : 4389
	},
	{
		"cid" : 4416
	},
	{
		"cid" : 4425
	},
	{
		"cid" : 4431
	},
	{
		"cid" : 4432
	},
	{
		"cid" : 4448
	},
	{
		"cid" : 4456
	},
	{
		"cid" : 4458
	},
	{
		"cid" : 4461
	},
	{
		"cid" : 4466
	},
	{
		"cid" : 4467
	},
	{
		"cid" : 4473
	},
	{
		"cid" : 4525
	},
	{
		"cid" : 4527
	},
	{
		"cid" : 4530
	},
	{
		"cid" : 4545
	},
	{
		"cid" : 4602
	},
	{
		"cid" : 4619
	},
	{
		"cid" : 4622
	},
	{
		"cid" : 4652
	},
	{
		"cid" : 4664
	},
	{
		"cid" : 4682
	},
	{
		"cid" : 4700
	},
	{
		"cid" : 4720
	},
	{
		"cid" : 4723
	},
	{
		"cid" : 4765
	},
	{
		"cid" : 4779
	},
	{
		"cid" : 4785
	},
	{
		"cid" : 4786
	},
	{
		"cid" : 4787
	},
	{
		"cid" : 4800
	},
	{
		"cid" : 4840
	},
	{
		"cid" : 4843
	},
	{
		"cid" : 4850
	},
	{
		"cid" : 4853
	},
	{
		"cid" : 4857
	},
	{
		"cid" : 4872
	},
	{
		"cid" : 4884
	},
	{
		"cid" : 4886
	},
	{
		"cid" : 4889
	},
	{
		"cid" : 4913
	},
	{
		"cid" : 4915
	},
	{
		"cid" : 4927
	},
	{
		"cid" : 4934
	},
	{
		"cid" : 4942
	},
	{
		"cid" : 4947
	},
	{
		"cid" : 4952
	},
	{
		"cid" : 4990
	},
	{
		"cid" : 4992
	},
	{
		"cid" : 5046
	},
	{
		"cid" : 5055
	},
	{
		"cid" : 5062
	},
	{
		"cid" : 5067
	},
	{
		"cid" : 5068
	},
	{
		"cid" : 5070
	},
	{
		"cid" : 5092
	},
	{
		"cid" : 5141
	},
	{
		"cid" : 5153
	},
	{
		"cid" : 5154
	},
	{
		"cid" : 5207
	},
	{
		"cid" : 5212
	},
	{
		"cid" : 5227
	},
	{
		"cid" : 5270
	},
	{
		"cid" : 5326
	},
	{
		"cid" : 5378
	},
	{
		"cid" : 5387
	},
	{
		"cid" : 5425
	},
	{
		"cid" : 5500
	},
	{
		"cid" : 5550
	},
	{
		"cid" : 5572
	},
	{
		"cid" : 5599
	},
	{
		"cid" : 5629
	},
	{
		"cid" : 5630
	},
	{
		"cid" : 5682
	},
	{
		"cid" : 5685
	},
	{
		"cid" : 5692
	},
	{
		"cid" : 5698
	},
	{
		"cid" : 5714
	},
	{
		"cid" : 5778
	},
	{
		"cid" : 5792
	},
	{
		"cid" : 5999
	},
	{
		"cid" : 6005
	},
	{
		"cid" : 6059
	},
	{
		"cid" : 6096
	},
	{
		"cid" : 6118
	},
	{
		"cid" : 6119
	},
	{
		"cid" : 6149
	},
	{
		"cid" : 6179
	},
	{
		"cid" : 6197
	},
	{
		"cid" : 6216
	},
	{
		"cid" : 6234
	},
	{
		"cid" : 6296
	},
	{
		"cid" : 6411
	},
	{
		"cid" : 6539
	},
	{
		"cid" : 6542
	},
	{
		"cid" : 6547
	},
	{
		"cid" : 6670
	},
	{
		"cid" : 6812
	},
	{
		"cid" : 6897
	},
	{
		"cid" : 6924
	},
	{
		"cid" : 6945
	},
	{
		"cid" : 6987
	},
	{
		"cid" : 6999
	},
	{
		"cid" : 7003
	},
	{
		"cid" : 7009
	},
	{
		"cid" : 7015
	},
	{
		"cid" : 7019
	},
	{
		"cid" : 7038
	},
	{
		"cid" : 7052
	},
	{
		"cid" : 7069
	},
	{
		"cid" : 7080
	},
	{
		"cid" : 7085
	},
	{
		"cid" : 7094
	},
	{
		"cid" : 7098
	},
	{
		"cid" : 7111
	},
	{
		"cid" : 7118
	},
	{
		"cid" : 7119
	},
	{
		"cid" : 7126
	},
	{
		"cid" : 7149
	},
	{
		"cid" : 7151
	},
	{
		"cid" : 7158
	},
	{
		"cid" : 7194
	},
	{
		"cid" : 7216
	},
	{
		"cid" : 7230
	},
	{
		"cid" : 7280
	},
	{
		"cid" : 7320
	},
	{
		"cid" : 7321
	},
	{
		"cid" : 7329
	},
	{
		"cid" : 7411
	},
	{
		"cid" : 7412
	},
	{
		"cid" : 7437
	},
	{
		"cid" : 7439
	},
	{
		"cid" : 7440
	},
	{
		"cid" : 7441
	},
	{
		"cid" : 7454
	},
	{
		"cid" : 7484
	},
	{
		"cid" : 7593
	},
	{
		"cid" : 7646
	},
	{
		"cid" : 7647
	},
	{
		"cid" : 7679
	},
	{
		"cid" : 7689
	},
	{
		"cid" : 7690
	},
	{
		"cid" : 7830
	},
	{
		"cid" : 7831
	},
	{
		"cid" : 7842
	},
	{
		"cid" : 7855
	},
	{
		"cid" : 7887
	},
	{
		"cid" : 7888
	},
	{
		"cid" : 7898
	},
	{
		"cid" : 7903
	},
	{
		"cid" : 7950
	},
	{
		"cid" : 7958
	},
	{
		"cid" : 7959
	},
	{
		"cid" : 7965
	},
	{
		"cid" : 7981
	},
	{
		"cid" : 8019
	},
	{
		"cid" : 8104
	},
	{
		"cid" : 8176
	},
	{
		"cid" : 8198
	},
	{
		"cid" : 8271
	},
	{
		"cid" : 8349
	},
	{
		"cid" : 8447
	},
	{
		"cid" : 8448
	},
	{
		"cid" : 8597
	},
	{
		"cid" : 8602
	},
	{
		"cid" : 8620
	},
	{
		"cid" : 8634
	},
	{
		"cid" : 8681
	},
	{
		"cid" : 8698
	},
	{
		"cid" : 8775
	},
	{
		"cid" : 8831
	},
	{
		"cid" : 8899
	},
	{
		"cid" : 8922
	},
	{
		"cid" : 8923
	},
	{
		"cid" : 8975
	},
	{
		"cid" : 8979
	},
	{
		"cid" : 8989
	},
	{
		"cid" : 8990
	},
	{
		"cid" : 9003
	},
	{
		"cid" : 9029
	},
	{
		"cid" : 9031
	},
	{
		"cid" : 9032
	},
	{
		"cid" : 9096
	},
	{
		"cid" : 9098
	},
	{
		"cid" : 9105
	},
	{
		"cid" : 9118
	},
	{
		"cid" : 9119
	},
	{
		"cid" : 9125
	},
	{
		"cid" : 9173
	},
	{
		"cid" : 9174
	},
	{
		"cid" : 9219
	},
	{
		"cid" : 9278
	},
	{
		"cid" : 9314
	},
	{
		"cid" : 9368
	},
	{
		"cid" : 9369
	},
	{
		"cid" : 9468
	},
	{
		"cid" : 9469
	},
	{
		"cid" : 9536
	},
	{
		"cid" : 9590
	},
	{
		"cid" : 9611
	},
	{
		"cid" : 9713
	},
	{
		"cid" : 9719
	},
	{
		"cid" : 9744
	},
	{
		"cid" : 9789
	},
	{
		"cid" : 9837
	},
	{
		"cid" : 9858
	},
	{
		"cid" : 9859
	},
	{
		"cid" : 9866
	},
	{
		"cid" : 9906
	},
	{
		"cid" : 9907
	},
	{
		"cid" : 9910
	},
	{
		"cid" : 9948
	},
	{
		"cid" : 9978
	},
	{
		"cid" : 9994
	},
	{
		"cid" : 10035
	},
	{
		"cid" : 10039
	},
	{
		"cid" : 10094
	},
	{
		"cid" : 10095
	},
	{
		"cid" : 10165
	},
	{
		"cid" : 10176
	},
	{
		"cid" : 10200
	},
	{
		"cid" : 10206
	},
	{
		"cid" : 10210
	},
	{
		"cid" : 10213
	},
	{
		"cid" : 10247
	},
	{
		"cid" : 10295
	},
	{
		"cid" : 10296
	},
	{
		"cid" : 10298
	},
	{
		"cid" : 10382
	},
	{
		"cid" : 10397
	},
	{
		"cid" : 10401
	},
	{
		"cid" : 10408
	},
	{
		"cid" : 10418
	},
	{
		"cid" : 10429
	},
	{
		"cid" : 10444
	},
	{
		"cid" : 10470
	},
	{
		"cid" : 10525
	},
	{
		"cid" : 10543
	},
	{
		"cid" : 10580
	},
	{
		"cid" : 10636
	},
	{
		"cid" : 10723
	},
	{
		"cid" : 10759
	},
	{
		"cid" : 10764
	},
	{
		"cid" : 10774
	},
	{
		"cid" : 10803
	},
	{
		"cid" : 10806
	},
	{
		"cid" : 10950
	},
	{
		"cid" : 11003
	},
	{
		"cid" : 11011
	},
	{
		"cid" : 11050
	},
	{
		"cid" : 11051
	},
	{
		"cid" : 11052
	},
	{
		"cid" : 11128
	},
	{
		"cid" : 11136
	},
	{
		"cid" : 11139
	},
	{
		"cid" : 11155
	},
	{
		"cid" : 11170
	},
	{
		"cid" : 11186
	},
	{
		"cid" : 11187
	},
	{
		"cid" : 11272
	},
	{
		"cid" : 11352
	},
	{
		"cid" : 11392
	},
	{
		"cid" : 11393
	},
	{
		"cid" : 11430
	},
	{
		"cid" : 11529
	},
	{
		"cid" : 11545
	},
	{
		"cid" : 11572
	},
	{
		"cid" : 11577
	},
	{
		"cid" : 11602
	},
	{
		"cid" : 11610
	},
	{
		"cid" : 11629
	},
	{
		"cid" : 11646
	},
	{
		"cid" : 12089
	},
	{
		"cid" : 12099
	},
	{
		"cid" : 12175
	},
	{
		"cid" : 12276
	},
	{
		"cid" : 12280
	},
	{
		"cid" : 12486
	},
	{
		"cid" : 12538
	},
	{
		"cid" : 12541
	},
	{
		"cid" : 12606
	},
	{
		"cid" : 12608
	},
	{
		"cid" : 12609
	},
	{
		"cid" : 12617
	},
	{
		"cid" : 12753
	},
	{
		"cid" : 12957
	},
	{
		"cid" : 12990
	},
	{
		"cid" : 13090
	},
	{
		"cid" : 13161
	},
	{
		"cid" : 13198
	},
	{
		"cid" : 13239
	},
	{
		"cid" : 13382
	},
	{
		"cid" : 13555
	},
	{
		"cid" : 13610
	},
	{
		"cid" : 13648
	},
	{
		"cid" : 13712
	},
	{
		"cid" : 13748
	},
	{
		"cid" : 13756
	},
	{
		"cid" : 13775
	},
	{
		"cid" : 13786
	},
	{
		"cid" : 13794
	},
	{
		"cid" : 13828
	},
	{
		"cid" : 13843
	},
	{
		"cid" : 13851
	},
	{
		"cid" : 13861
	},
	{
		"cid" : 13892
	},
	{
		"cid" : 13902
	},
	{
		"cid" : 13949
	},
	{
		"cid" : 13956
	},
	{
		"cid" : 13971
	},
	{
		"cid" : 13974
	},
	{
		"cid" : 14008
	},
	{
		"cid" : 14013
	},
	{
		"cid" : 14125
	},
	{
		"cid" : 14141
	},
	{
		"cid" : 14162
	},
	{
		"cid" : 14185
	},
	{
		"cid" : 14211
	},
	{
		"cid" : 14319
	},
	{
		"cid" : 14325
	},
	{
		"cid" : 14340
	},
	{
		"cid" : 14360
	},
	{
		"cid" : 14371
	},
	{
		"cid" : 14375
	},
	{
		"cid" : 14426
	},
	{
		"cid" : 14445
	},
	{
		"cid" : 14447
	},
	{
		"cid" : 14449
	},
	{
		"cid" : 14465
	},
	{
		"cid" : 14521
	},
	{
		"cid" : 14528
	},
	{
		"cid" : 14538
	},
	{
		"cid" : 14560
	},
	{
		"cid" : 14569
	},
	{
		"cid" : 14609
	},
	{
		"cid" : 14626
	},
	{
		"cid" : 14634
	},
	{
		"cid" : 14640
	},
	{
		"cid" : 14661
	},
	{
		"cid" : 14674
	},
	{
		"cid" : 14677
	},
	{
		"cid" : 14683
	},
	{
		"cid" : 14698
	},
	{
		"cid" : 14750
	},
	{
		"cid" : 14752
	},
	{
		"cid" : 14761
	},
	{
		"cid" : 14798
	},
	{
		"cid" : 14830
	},
	{
		"cid" : 14846
	},
	{
		"cid" : 14850
	},
	{
		"cid" : 14854
	},
	{
		"cid" : 14874
	},
	{
		"cid" : 14879
	},
	{
		"cid" : 14910
	},
	{
		"cid" : 14917
	},
	{
		"cid" : 14960
	},
	{
		"cid" : 14973
	},
	{
		"cid" : 14982
	},
	{
		"cid" : 14990
	},
	{
		"cid" : 15033
	},
	{
		"cid" : 15049
	},
	{
		"cid" : 15064
	},
	{
		"cid" : 15088
	},
	{
		"cid" : 15130
	},
	{
		"cid" : 15150
	},
	{
		"cid" : 15155
	},
	{
		"cid" : 15164
	},
	{
		"cid" : 15177
	},
	{
		"cid" : 15204
	},
	{
		"cid" : 15230
	},
	{
		"cid" : 15270
	},
	{
		"cid" : 15283
	},
	{
		"cid" : 15306
	},
	{
		"cid" : 15319
	},
	{
		"cid" : 15347
	},
	{
		"cid" : 15356
	},
	{
		"cid" : 15381
	},
	{
		"cid" : 15384
	},
	{
		"cid" : 15389
	},
	{
		"cid" : 15403
	},
	{
		"cid" : 15435
	},
	{
		"cid" : 15499
	},
	{
		"cid" : 15574
	},
	{
		"cid" : 15581
	},
	{
		"cid" : 15619
	},
	{
		"cid" : 15648
	},
	{
		"cid" : 15691
	},
	{
		"cid" : 15692
	},
	{
		"cid" : 15698
	},
	{
		"cid" : 15712
	},
	{
		"cid" : 15739
	},
	{
		"cid" : 15836
	},
	{
		"cid" : 15864
	},
	{
		"cid" : 15917
	},
	{
		"cid" : 15934
	},
	{
		"cid" : 16042
	},
	{
		"cid" : 16072
	},
	{
		"cid" : 16094
	},
	{
		"cid" : 16095
	},
	{
		"cid" : 16097
	},
	{
		"cid" : 16121
	},
	{
		"cid" : 16130
	},
	{
		"cid" : 16188
	},
	{
		"cid" : 16192
	},
	{
		"cid" : 16195
	},
	{
		"cid" : 16209
	},
	{
		"cid" : 16229
	},
	{
		"cid" : 16282
	},
	{
		"cid" : 16351
	},
	{
		"cid" : 16593
	},
	{
		"cid" : 16705
	},
	{
		"cid" : 16706
	},
	{
		"cid" : 16727
	},
	{
		"cid" : 16763
	},
	{
		"cid" : 16844
	},
	{
		"cid" : 16861
	},
	{
		"cid" : 16963
	},
	{
		"cid" : 17164
	},
	{
		"cid" : 17177
	},
	{
		"cid" : 17224
	},
	{
		"cid" : 17280
	},
	{
		"cid" : 17307
	},
	{
		"cid" : 17523
	},
	{
		"cid" : 17646
	},
	{
		"cid" : 17648
	},
	{
		"cid" : 17727
	},
	{
		"cid" : 17748
	},
	{
		"cid" : 17752
	},
	{
		"cid" : 17760
	},
	{
		"cid" : 17838
	},
	{
		"cid" : 17877
	},
	{
		"cid" : 17882
	},
	{
		"cid" : 17891
	},
	{
		"cid" : 17923
	},
	{
		"cid" : 17951
	},
	{
		"cid" : 18007
	},
	{
		"cid" : 18051
	},
	{
		"cid" : 18107
	},
	{
		"cid" : 18189
	},
	{
		"cid" : 18358
	},
	{
		"cid" : 18367
	},
	{
		"cid" : 18416
	},
	{
		"cid" : 18452
	},
	{
		"cid" : 18609
	},
	{
		"cid" : 18741
	},
	{
		"cid" : 18750
	},
	{
		"cid" : 18779
	},
	{
		"cid" : 18782
	},
	{
		"cid" : 19440
	},
	{
		"cid" : 19624
	},
	{
		"cid" : 19724
	},
	{
		"cid" : 19733
	},
	{
		"cid" : 19756
	},
	{
		"cid" : 20049
	},
	{
		"cid" : 20153
	},
	{
		"cid" : 20395
	},
	{
		"cid" : 20417
	},
	{
		"cid" : 20437
	},
	{
		"cid" : 20760
	},
	{
		"cid" : 20856
	},
	{
		"cid" : 20911
	},
	{
		"cid" : 20978
	},
	{
		"cid" : 21018
	},
	{
		"cid" : 21057
	},
	{
		"cid" : 21211
	},
	{
		"cid" : 21387
	},
	{
		"cid" : 21419
	},
	{
		"cid" : 21423
	},
	{
		"cid" : 21427
	},
	{
		"cid" : 21490
	},
	{
		"cid" : 21504
	},
	{
		"cid" : 21704
	},
	{
		"cid" : 21921
	},
	{
		"cid" : 21927
	},
	{
		"cid" : 21940
	},
	{
		"cid" : 21941
	},
	{
		"cid" : 21952
	},
	{
		"cid" : 22013
	},
	{
		"cid" : 22079
	},
	{
		"cid" : 22101
	},
	{
		"cid" : 22157
	},
	{
		"cid" : 22165
	},
	{
		"cid" : 22189
	},
	{
		"cid" : 22197
	},
	{
		"cid" : 22254
	},
	{
		"cid" : 22259
	},
	{
		"cid" : 22264
	},
	{
		"cid" : 22277
	},
	{
		"cid" : 22285
	},
	{
		"cid" : 22297
	},
	{
		"cid" : 22316
	},
	{
		"cid" : 22331
	},
	{
		"cid" : 22365
	},
	{
		"cid" : 22367
	},
	{
		"cid" : 22371
	},
	{
		"cid" : 22373
	},
	{
		"cid" : 22400
	},
	{
		"cid" : 22434
	},
	{
		"cid" : 22436
	},
	{
		"cid" : 22459
	},
	{
		"cid" : 22469
	},
	{
		"cid" : 22513
	},
	{
		"cid" : 22522
	},
	{
		"cid" : 22530
	},
	{
		"cid" : 22558
	},
	{
		"cid" : 22578
	},
	{
		"cid" : 22624
	},
	{
		"cid" : 22625
	},
	{
		"cid" : 22627
	},
	{
		"cid" : 22629
	},
	{
		"cid" : 22631
	},
	{
		"cid" : 22635
	},
	{
		"cid" : 22640
	},
	{
		"cid" : 22667
	},
	{
		"cid" : 22679
	},
	{
		"cid" : 22681
	},
	{
		"cid" : 22689
	},
	{
		"cid" : 22708
	},
	{
		"cid" : 22709
	},
	{
		"cid" : 22736
	},
	{
		"cid" : 22777
	},
	{
		"cid" : 22833
	},
	{
		"cid" : 22863
	},
	{
		"cid" : 22869
	},
	{
		"cid" : 22942
	},
	{
		"cid" : 22960
	},
	{
		"cid" : 22972
	},
	{
		"cid" : 22973
	},
	{
		"cid" : 22994
	},
	{
		"cid" : 23031
	},
	{
		"cid" : 23076
	},
	{
		"cid" : 23102
	},
	{
		"cid" : 23123
	},
	{
		"cid" : 23124
	},
	{
		"cid" : 23154
	},
	{
		"cid" : 23172
	},
	{
		"cid" : 23182
	},
	{
		"cid" : 23188
	},
	{
		"cid" : 23379
	},
	{
		"cid" : 23404
	},
	{
		"cid" : 23574
	},
	{
		"cid" : 23575
	},
	{
		"cid" : 23580
	},
	{
		"cid" : 23647
	},
	{
		"cid" : 23724
	},
	{
		"cid" : 23737
	},
	{
		"cid" : 23972
	},
	{
		"cid" : 23977
	},
	{
		"cid" : 24091
	},
	{
		"cid" : 24209
	},
	{
		"cid" : 24215
	},
	{
		"cid" : 24300
	},
	{
		"cid" : 24379
	},
	{
		"cid" : 24485
	},
	{
		"cid" : 24534
	},
	{
		"cid" : 24619
	},
	{
		"cid" : 24930
	},
	{
		"cid" : 25105
	},
	{
		"cid" : 25163
	},
	{
		"cid" : 25191
	},
	{
		"cid" : 25214
	},
	{
		"cid" : 25216
	},
	{
		"cid" : 25233
	},
	{
		"cid" : 25262
	},
	{
		"cid" : 25318
	},
	{
		"cid" : 25367
	},
	{
		"cid" : 25379
	},
	{
		"cid" : 25401
	},
	{
		"cid" : 25493
	},
	{
		"cid" : 25633
	},
	{
		"cid" : 25649
	},
	{
		"cid" : 25664
	},
	{
		"cid" : 25701
	},
	{
		"cid" : 25764
	},
	{
		"cid" : 25778
	},
	{
		"cid" : 25789
	},
	{
		"cid" : 25801
	},
	{
		"cid" : 25866
	},
	{
		"cid" : 25929
	},
	{
		"cid" : 25937
	},
	{
		"cid" : 25955
	},
	{
		"cid" : 25981
	},
	{
		"cid" : 26077
	},
	{
		"cid" : 26109
	},
	{
		"cid" : 26269
	},
	{
		"cid" : 26293
	},
	{
		"cid" : 26333
	},
	{
		"cid" : 26344
	},
	{
		"cid" : 26347
	},
	{
		"cid" : 26351
	},
	{
		"cid" : 26365
	},
	{
		"cid" : 26378
	},
	{
		"cid" : 26392
	},
	{
		"cid" : 26413
	},
	{
		"cid" : 26416
	},
	{
		"cid" : 26422
	},
	{
		"cid" : 26425
	},
	{
		"cid" : 26440
	},
	{
		"cid" : 26449
	},
	{
		"cid" : 26457
	},
	{
		"cid" : 26460
	},
	{
		"cid" : 26469
	},
	{
		"cid" : 26514
	},
	{
		"cid" : 26520
	},
	{
		"cid" : 26525
	},
	{
		"cid" : 26584
	},
	{
		"cid" : 26624
	},
	{
		"cid" : 26652
	},
	{
		"cid" : 26667
	},
	{
		"cid" : 26670
	},
	{
		"cid" : 26691
	},
	{
		"cid" : 26705
	},
	{
		"cid" : 26719
	},
	{
		"cid" : 26761
	},
	{
		"cid" : 26768
	},
	{
		"cid" : 26776
	},
	{
		"cid" : 26779
	},
	{
		"cid" : 26793
	},
	{
		"cid" : 26820
	},
	{
		"cid" : 26841
	},
	{
		"cid" : 26856
	},
	{
		"cid" : 26866
	},
	{
		"cid" : 26898
	},
	{
		"cid" : 26911
	},
	{
		"cid" : 26915
	},
	{
		"cid" : 26918
	},
	{
		"cid" : 26921
	},
	{
		"cid" : 26942
	},
	{
		"cid" : 27022
	},
	{
		"cid" : 27034
	},
	{
		"cid" : 27064
	},
	{
		"cid" : 27065
	},
	{
		"cid" : 27075
	},
	{
		"cid" : 27101
	},
	{
		"cid" : 27113
	},
	{
		"cid" : 27114
	},
	{
		"cid" : 27115
	},
	{
		"cid" : 27128
	},
	{
		"cid" : 27136
	},
	{
		"cid" : 27139
	},
	{
		"cid" : 27238
	},
	{
		"cid" : 27276
	},
	{
		"cid" : 27278
	},
	{
		"cid" : 27283
	},
	{
		"cid" : 27285
	},
	{
		"cid" : 27303
	},
	{
		"cid" : 27318
	},
	{
		"cid" : 27324
	},
	{
		"cid" : 27337
	},
	{
		"cid" : 27339
	},
	{
		"cid" : 27360
	},
	{
		"cid" : 27382
	},
	{
		"cid" : 27383
	},
	{
		"cid" : 27388
	},
	{
		"cid" : 27397
	},
	{
		"cid" : 27426
	},
	{
		"cid" : 27452
	},
	{
		"cid" : 27474
	},
	{
		"cid" : 27500
	},
	{
		"cid" : 27504
	},
	{
		"cid" : 27513
	},
	{
		"cid" : 27532
	},
	{
		"cid" : 27569
	},
	{
		"cid" : 27573
	},
	{
		"cid" : 27587
	},
	{
		"cid" : 27590
	},
	{
		"cid" : 27673
	},
	{
		"cid" : 27696
	},
	{
		"cid" : 27702
	},
	{
		"cid" : 27735
	},
	{
		"cid" : 27748
	},
	{
		"cid" : 27757
	},
	{
		"cid" : 27825
	},
	{
		"cid" : 27827
	},
	{
		"cid" : 27829
	},
	{
		"cid" : 27841
	},
	{
		"cid" : 27842
	},
	{
		"cid" : 27846
	},
	{
		"cid" : 27848
	},
	{
		"cid" : 27863
	},
	{
		"cid" : 27876
	},
	{
		"cid" : 27880
	},
	{
		"cid" : 27884
	},
	{
		"cid" : 27896
	},
	{
		"cid" : 27908
	},
	{
		"cid" : 27921
	},
	{
		"cid" : 27941
	},
	{
		"cid" : 27942
	},
	{
		"cid" : 27945
	},
	{
		"cid" : 27946
	},
	{
		"cid" : 27959
	},
	{
		"cid" : 27987
	},
	{
		"cid" : 28041
	},
	{
		"cid" : 28104
	},
	{
		"cid" : 28159
	},
	{
		"cid" : 28161
	},
	{
		"cid" : 28170
	},
	{
		"cid" : 28273
	},
	{
		"cid" : 28301
	},
	{
		"cid" : 28305
	},
	{
		"cid" : 28336
	},
	{
		"cid" : 28695
	},
	{
		"cid" : 28697
	},
	{
		"cid" : 28736
	},
	{
		"cid" : 28785
	},
	{
		"cid" : 28786
	},
	{
		"cid" : 28850
	},
	{
		"cid" : 28866
	},
	{
		"cid" : 28872
	},
	{
		"cid" : 29181
	},
	{
		"cid" : 29183
	},
	{
		"cid" : 29237
	},
	{
		"cid" : 29244
	},
	{
		"cid" : 29247
	},
	{
		"cid" : 29279
	},
	{
		"cid" : 29341
	},
	{
		"cid" : 29372
	},
	{
		"cid" : 29410
	},
	{
		"cid" : 29495
	},
	{
		"cid" : 29517
	},
	{
		"cid" : 29562
	},
	{
		"cid" : 29602
	},
	{
		"cid" : 29643
	},
	{
		"cid" : 29710
	},
	{
		"cid" : 29725
	},
	{
		"cid" : 29807
	},
	{
		"cid" : 29815
	},
	{
		"cid" : 29837
	},
	{
		"cid" : 29844
	},
	{
		"cid" : 29866
	},
	{
		"cid" : 29876
	},
	{
		"cid" : 29961
	},
	{
		"cid" : 30003
	},
	{
		"cid" : 30020
	},
	{
		"cid" : 30069
	},
	{
		"cid" : 30097
	},
	{
		"cid" : 30199
	},
	{
		"cid" : 30200
	},
	{
		"cid" : 30401
	},
	{
		"cid" : 30476
	},
	{
		"cid" : 30507
	},
	{
		"cid" : 30508
	},
	{
		"cid" : 30530
	},
	{
		"cid" : 30539
	},
	{
		"cid" : 30585
	},
	{
		"cid" : 30603
	},
	{
		"cid" : 30652
	},
	{
		"cid" : 30700
	},
	{
		"cid" : 30710
	},
	{
		"cid" : 30879
	},
	{
		"cid" : 30919
	},
	{
		"cid" : 31064
	},
	{
		"cid" : 31146
	},
	{
		"cid" : 31196
	},
	{
		"cid" : 31285
	},
	{
		"cid" : 31348
	},
	{
		"cid" : 31422
	},
	{
		"cid" : 31431
	},
	{
		"cid" : 31444
	},
	{
		"cid" : 31584
	},
	{
		"cid" : 31755
	},
	{
		"cid" : 31833
	},
	{
		"cid" : 32148
	},
	{
		"cid" : 32198
	},
	{
		"cid" : 32231
	},
	{
		"cid" : 32262
	},
	{
		"cid" : 32306
	},
	{
		"cid" : 32429
	},
	{
		"cid" : 32492
	},
	{
		"cid" : 32594
	},
	{
		"cid" : 32623
	},
	{
		"cid" : 32636
	},
	{
		"cid" : 32652
	},
	{
		"cid" : 32679
	},
	{
		"cid" : 32783
	},
	{
		"cid" : 32804
	},
	{
		"cid" : 32812
	},
	{
		"cid" : 32822
	},
	{
		"cid" : 32937
	},
	{
		"cid" : 32977
	},
	{
		"cid" : 33038
	},
	{
		"cid" : 33045
	},
	{
		"cid" : 33056
	},
	{
		"cid" : 33075
	},
	{
		"cid" : 33091
	},
	{
		"cid" : 33101
	},
	{
		"cid" : 33128
	},
	{
		"cid" : 33195
	},
	{
		"cid" : 33223
	},
	{
		"cid" : 33268
	},
	{
		"cid" : 33339
	},
	{
		"cid" : 33346
	},
	{
		"cid" : 33370
	},
	{
		"cid" : 33372
	},
	{
		"cid" : 33412
	},
	{
		"cid" : 33444
	},
	{
		"cid" : 33471
	},
	{
		"cid" : 33475
	},
	{
		"cid" : 33488
	},
	{
		"cid" : 33511
	},
	{
		"cid" : 33521
	},
	{
		"cid" : 33542
	},
	{
		"cid" : 33543
	},
	{
		"cid" : 33591
	},
	{
		"cid" : 33604
	},
	{
		"cid" : 33614
	},
	{
		"cid" : 33631
	},
	{
		"cid" : 33652
	},
	{
		"cid" : 33672
	},
	{
		"cid" : 33678
	},
	{
		"cid" : 33702
	},
	{
		"cid" : 33715
	},
	{
		"cid" : 33724
	},
	{
		"cid" : 33759
	},
	{
		"cid" : 33769
	},
	{
		"cid" : 33900
	},
	{
		"cid" : 33923
	},
	{
		"cid" : 34016
	},
	{
		"cid" : 34585
	},
	{
		"cid" : 34890
	},
	{
		"cid" : 34906
	},
	{
		"cid" : 35175
	},
	{
		"cid" : 35328
	},
	{
		"cid" : 35335
	},
	{
		"cid" : 35487
	},
	{
		"cid" : 35512
	},
	{
		"cid" : 35893
	},
	{
		"cid" : 35922
	},
	{
		"cid" : 35952
	},
	{
		"cid" : 36063
	},
	{
		"cid" : 36229
	},
	{
		"cid" : 36651
	},
	{
		"cid" : 37002
	},
	{
		"cid" : 37020
	},
	{
		"cid" : 37021
	},
	{
		"cid" : 37023
	},
	{
		"cid" : 37028
	},
	{
		"cid" : 37029
	},
	{
		"cid" : 37030
	},
	{
		"cid" : 37033
	},
	{
		"cid" : 37046
	},
	{
		"cid" : 37048
	},
	{
		"cid" : 37055
	},
	{
		"cid" : 37058
	},
	{
		"cid" : 37059
	},
	{
		"cid" : 37062
	},
	{
		"cid" : 37063
	},
	{
		"cid" : 37064
	},
	{
		"cid" : 37068
	},
	{
		"cid" : 37069
	},
	{
		"cid" : 37075
	},
	{
		"cid" : 37078
	},
	{
		"cid" : 37081
	},
	{
		"cid" : 37082
	},
	{
		"cid" : 37085
	},
	{
		"cid" : 37088
	},
	{
		"cid" : 37138
	},
	{
		"cid" : 37153
	},
	{
		"cid" : 37155
	},
	{
		"cid" : 37194
	},
	{
		"cid" : 37214
	},
	{
		"cid" : 37221
	},
	{
		"cid" : 37222
	},
	{
		"cid" : 37223
	},
	{
		"cid" : 37225
	},
	{
		"cid" : 37233
	},
	{
		"cid" : 37297
	},
	{
		"cid" : 37312
	},
	{
		"cid" : 37318
	},
	{
		"cid" : 37328
	},
	{
		"cid" : 37329
	},
	{
		"cid" : 37379
	},
	{
		"cid" : 37413
	},
	{
		"cid" : 37427
	},
	{
		"cid" : 37429
	},
	{
		"cid" : 37480
	},
	{
		"cid" : 37564
	},
	{
		"cid" : 37580
	},
	{
		"cid" : 37603
	},
	{
		"cid" : 37606
	},
	{
		"cid" : 37623
	},
	{
		"cid" : 37779
	},
	{
		"cid" : 37982
	},
	{
		"cid" : 38047
	},
	{
		"cid" : 38201
	},
	{
		"cid" : 38249
	},
	{
		"cid" : 38250
	},
	{
		"cid" : 38365
	},
	{
		"cid" : 38427
	},
	{
		"cid" : 38525
	},
	{
		"cid" : 38536
	},
	{
		"cid" : 38577
	},
	{
		"cid" : 38596
	},
	{
		"cid" : 38651
	},
	{
		"cid" : 38700
	},
	{
		"cid" : 38774
	},
	{
		"cid" : 38799
	},
	{
		"cid" : 38821
	},
	{
		"cid" : 38843
	},
	{
		"cid" : 38849
	},
	{
		"cid" : 38850
	},
	{
		"cid" : 38856
	},
	{
		"cid" : 38859
	},
	{
		"cid" : 38920
	},
	{
		"cid" : 38925
	},
	{
		"cid" : 38930
	},
	{
		"cid" : 38955
	},
	{
		"cid" : 38972
	},
	{
		"cid" : 38977
	},
	{
		"cid" : 38981
	},
	{
		"cid" : 38984
	},
	{
		"cid" : 38993
	},
	{
		"cid" : 39026
	},
	{
		"cid" : 39046
	},
	{
		"cid" : 39050
	},
	{
		"cid" : 39051
	},
	{
		"cid" : 39137
	},
	{
		"cid" : 39149
	},
	{
		"cid" : 39210
	},
	{
		"cid" : 39229
	},
	{
		"cid" : 39240
	},
	{
		"cid" : 39265
	},
	{
		"cid" : 39276
	},
	{
		"cid" : 39306
	},
	{
		"cid" : 39311
	},
	{
		"cid" : 39313
	},
	{
		"cid" : 39389
	},
	{
		"cid" : 39395
	},
	{
		"cid" : 39411
	},
	{
		"cid" : 39445
	},
	{
		"cid" : 39453
	},
	{
		"cid" : 39454
	},
	{
		"cid" : 39505
	},
	{
		"cid" : 39519
	},
	{
		"cid" : 39528
	},
	{
		"cid" : 39568
	},
	{
		"cid" : 39588
	},
	{
		"cid" : 39591
	},
	{
		"cid" : 39634
	},
	{
		"cid" : 39660
	},
	{
		"cid" : 39676
	},
	{
		"cid" : 39712
	},
	{
		"cid" : 39724
	},
	{
		"cid" : 39736
	},
	{
		"cid" : 39748
	},
	{
		"cid" : 39756
	},
	{
		"cid" : 39762
	},
	{
		"cid" : 39788
	},
	{
		"cid" : 39796
	},
	{
		"cid" : 39820
	},
	{
		"cid" : 39827
	},
	{
		"cid" : 39887
	},
	{
		"cid" : 39924
	},
	{
		"cid" : 39956
	},
	{
		"cid" : 39969
	},
	{
		"cid" : 40049
	},
	{
		"cid" : 40072
	},
	{
		"cid" : 40083
	},
	{
		"cid" : 40118
	},
	{
		"cid" : 40151
	},
	{
		"cid" : 40167
	},
	{
		"cid" : 40190
	},
	{
		"cid" : 40194
	},
	{
		"cid" : 40214
	},
	{
		"cid" : 40218
	},
	{
		"cid" : 40239
	},
	{
		"cid" : 40241
	},
	{
		"cid" : 40296
	},
	{
		"cid" : 40326
	},
	{
		"cid" : 40342
	},
	{
		"cid" : 40389
	},
	{
		"cid" : 40394
	},
	{
		"cid" : 40413
	},
	{
		"cid" : 40414
	},
	{
		"cid" : 40428
	},
	{
		"cid" : 40440
	},
	{
		"cid" : 40526
	},
	{
		"cid" : 40571
	},
	{
		"cid" : 40573
	},
	{
		"cid" : 40590
	},
	{
		"cid" : 40591
	},
	{
		"cid" : 40616
	},
	{
		"cid" : 40737
	},
	{
		"cid" : 40764
	},
	{
		"cid" : 40770
	},
	{
		"cid" : 40820
	},
	{
		"cid" : 40846
	},
	{
		"cid" : 40856
	},
	{
		"cid" : 40910
	},
	{
		"cid" : 40941
	},
	{
		"cid" : 40977
	},
	{
		"cid" : 41012
	},
	{
		"cid" : 41103
	},
	{
		"cid" : 41106
	},
	{
		"cid" : 41112
	},
	{
		"cid" : 41131
	},
	{
		"cid" : 41143
	},
	{
		"cid" : 41159
	},
	{
		"cid" : 41164
	},
	{
		"cid" : 41177
	},
	{
		"cid" : 41183
	},
	{
		"cid" : 41192
	},
	{
		"cid" : 41196
	},
	{
		"cid" : 41200
	},
	{
		"cid" : 41202
	},
	{
		"cid" : 41213
	},
	{
		"cid" : 41218
	},
	{
		"cid" : 41227
	},
	{
		"cid" : 41235
	},
	{
		"cid" : 41263
	},
	{
		"cid" : 41266
	},
	{
		"cid" : 41281
	},
	{
		"cid" : 41319
	},
	{
		"cid" : 41376
	},
	{
		"cid" : 41383
	},
	{
		"cid" : 41425
	},
	{
		"cid" : 41484
	},
	{
		"cid" : 41519
	},
	{
		"cid" : 41522
	},
	{
		"cid" : 41586
	},
	{
		"cid" : 41601
	},
	{
		"cid" : 41606
	},
	{
		"cid" : 41667
	},
	{
		"cid" : 41672
	},
	{
		"cid" : 41699
	},
	{
		"cid" : 41707
	},
	{
		"cid" : 41726
	},
	{
		"cid" : 41732
	},
	{
		"cid" : 41742
	},
	{
		"cid" : 41797
	},
	{
		"cid" : 41831
	},
	{
		"cid" : 41852
	},
	{
		"cid" : 41883
	},
	{
		"cid" : 41884
	},
	{
		"cid" : 41890
	},
	{
		"cid" : 41905
	},
	{
		"cid" : 41917
	},
	{
		"cid" : 41937
	},
	{
		"cid" : 41966
	},
	{
		"cid" : 41967
	},
	{
		"cid" : 41999
	},
	{
		"cid" : 42045
	},
	{
		"cid" : 42049
	},
	{
		"cid" : 42053
	},
	{
		"cid" : 42120
	},
	{
		"cid" : 42130
	},
	{
		"cid" : 42136
	},
	{
		"cid" : 42140
	},
	{
		"cid" : 42142
	},
	{
		"cid" : 42148
	},
	{
		"cid" : 42159
	},
	{
		"cid" : 42211
	},
	{
		"cid" : 42218
	},
	{
		"cid" : 42251
	},
	{
		"cid" : 42265
	},
	{
		"cid" : 42267
	},
	{
		"cid" : 42278
	},
	{
		"cid" : 42298
	},
	{
		"cid" : 42403
	},
	{
		"cid" : 42411
	},
	{
		"cid" : 42485
	},
	{
		"cid" : 42486
	},
	{
		"cid" : 42492
	},
	{
		"cid" : 42497
	},
	{
		"cid" : 42519
	},
	{
		"cid" : 42563
	},
	{
		"cid" : 42633
	},
	{
		"cid" : 42652
	},
	{
		"cid" : 42685
	},
	{
		"cid" : 42686
	},
	{
		"cid" : 42688
	},
	{
		"cid" : 42710
	},
	{
		"cid" : 42715
	},
	{
		"cid" : 42722
	},
	{
		"cid" : 42743
	},
	{
		"cid" : 42744
	},
	{
		"cid" : 42767
	},
	{
		"cid" : 42799
	},
	{
		"cid" : 42843
	},
	{
		"cid" : 42904
	},
	{
		"cid" : 42999
	},
	{
		"cid" : 43081
	},
	{
		"cid" : 43367
	},
	{
		"cid" : 43457
	},
	{
		"cid" : 43571
	},
	{
		"cid" : 43577
	},
	{
		"cid" : 43728
	},
	{
		"cid" : 43755
	},
	{
		"cid" : 43788
	},
	{
		"cid" : 43934
	},
	{
		"cid" : 44009
	},
	{
		"cid" : 44041
	},
	{
		"cid" : 44123
	},
	{
		"cid" : 44206
	},
	{
		"cid" : 44332
	},
	{
		"cid" : 44475
	},
	{
		"cid" : 44743
	},
	{
		"cid" : 44752
	},
	{
		"cid" : 44758
	},
	{
		"cid" : 44770
	},
	{
		"cid" : 44902
	},
	{
		"cid" : 44920
	},
	{
		"cid" : 44933
	},
	{
		"cid" : 44955
	},
	{
		"cid" : 44964
	},
	{
		"cid" : 44990
	},
	{
		"cid" : 44998
	},
	{
		"cid" : 45003
	},
	{
		"cid" : 45067
	},
	{
		"cid" : 45068
	},
	{
		"cid" : 45108
	},
	{
		"cid" : 45130
	},
	{
		"cid" : 45131
	},
	{
		"cid" : 45144
	},
	{
		"cid" : 45148
	},
	{
		"cid" : 45156
	},
	{
		"cid" : 45222
	},
	{
		"cid" : 45226
	},
	{
		"cid" : 45252
	},
	{
		"cid" : 45260
	},
	{
		"cid" : 45270
	},
	{
		"cid" : 45312
	},
	{
		"cid" : 45318
	},
	{
		"cid" : 45321
	},
	{
		"cid" : 45326
	},
	{
		"cid" : 45336
	},
	{
		"cid" : 45346
	},
	{
		"cid" : 45359
	},
	{
		"cid" : 45363
	},
	{
		"cid" : 45379
	},
	{
		"cid" : 45391
	},
	{
		"cid" : 45392
	},
	{
		"cid" : 45410
	},
	{
		"cid" : 45415
	},
	{
		"cid" : 45431
	},
	{
		"cid" : 45437
	},
	{
		"cid" : 45441
	},
	{
		"cid" : 45444
	},
	{
		"cid" : 45449
	},
	{
		"cid" : 45467
	},
	{
		"cid" : 45478
	},
	{
		"cid" : 45482
	}
]';
global $wpdb;

        $result = json_decode($data);

        $output = [];
        foreach($result as $res ) {
            $output[]=$res->cid;
        }
        $output = implode(',', $output);
        //echo $output.'<br>';
        //$wpdb->query('UPDATE '.$wpdb->prefix.'cyh_city_content SET is_published = 1 WHERE city_id IN('.self::PROD_IDS.');');
        echo self::PROD_IDS;
        exit;
    }
}
