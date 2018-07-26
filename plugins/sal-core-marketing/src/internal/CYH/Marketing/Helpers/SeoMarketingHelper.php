<?php


namespace CYH\Marketing\Helpers;


use CYH\Marketing\Repositories\MarketingRepository;

class SeoMarketingHelper
{
    const CITIES_STAT_KEY = "cities-stats";
    const DATE_TIME_FORMAT = 'Y-m-d H:i:s';

    public static function AddMarketingSitemap()
    {
        $date = new \DateTime('23.07.18');
        $smp = '';
        $smp .= '<sitemap>' . "\n";
        $smp .= '<loc>' . site_url() . '/' . self::CITIES_STAT_KEY . '-sitemap.xml</loc>' . "\n";
        $smp .= '<lastmod>' . htmlspecialchars($date->format(self::DATE_TIME_FORMAT)) . '</lastmod>' . "\n";
        $smp .= '</sitemap>' . "\n";
        return $smp;
    }

    public static function InitSitemapActions()
    {
        add_action('wpseo_do_sitemap_' . self::CITIES_STAT_KEY, SeoMarketingHelper::class . '::GenerateSitemap' );
    }

    public static function GenerateSitemap()
    {
        global $wpseo_sitemaps;
       $repo = new MarketingRepository();

       $cities = $repo->GetPublishedCities();

       $citiesOutput = '';
       foreach ($cities as $city)
       {
           $citiesOutput .= '<url><loc>' . site_url() . '/internet/' . strtolower($city['state_short_name']) . '/' . strtolower($city['city_name']) . '/</loc><changefreq>Weekly</changefreq><priority>1</priority><lastmod>' . (new \DateTime('23.07.18'))->format(self::DATE_TIME_FORMAT) . '</lastmod></url>';
       }

        //Build the full sitemap
        $sitemap = '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ';
        $sitemap .= 'xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" ';
        $sitemap .= 'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        $sitemap .= $citiesOutput . '</urlset>';

        //echo $sitemap;
        $wpseo_sitemaps->set_sitemap($sitemap);
    }
}