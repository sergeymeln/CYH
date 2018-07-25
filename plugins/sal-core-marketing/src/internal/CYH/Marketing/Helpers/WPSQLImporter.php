<?php


namespace CYH\Marketing\Helpers;


class WPSQLImporter
{
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
                        'city_normal_name'=>$result->name,
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

        $results = $wpdb->get_results("SELECT id, city_normal_name, population FROM `wp_cyh_city` WHERE id NOT IN(".$impl.") 
        AND city_type IN('City', 'Town', 'Township', 'Village') ORDER BY population DESC LIMIT 1000", OBJECT);

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

        $sectionOne = str_replace("'", '&rsquo;', $sectionOne);
        $sectionTwo = str_replace("'", '&rsquo;', $sectionTwo);
        $sectionThree = str_replace("'", '&rsquo;', $sectionThree);
        $wpdb->query('UPDATE '.$wpdb->prefix.'cyh_city_content SET section_one="", section_two="", section_three="" 
         WHERE city_id='.$cityId.' AND section_two_text="";');
        $wpdb->query('UPDATE '.$wpdb->prefix."cyh_city_content SET section_one='".$sectionOne."', section_two='".$sectionTwo."', section_three='".$sectionThree."' 
         WHERE city_id=".$cityId." AND section_two_text='';");
    }
}
