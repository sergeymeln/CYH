<?php


namespace CYH\Models\Factory;


use CYH\Models\GWP;
use CYH\Models\Link;
use CYH\Models\Phone;
use CYH\Models\ServiceProvider;
use CYH\Models\TopOffer;

class TopOfferFactory
{
    public static function CreateTopOfferFromArray(array $topOffer): TopOffer
    {
        $topOfferRes = TopOffer::CreateFromArray($topOffer);
        if (!is_null($topOffer['Phone']))
        {
            $topOfferRes->Phone = Phone::CreateFromArray($topOffer['Phone']);
        }
        if (!is_null($topOffer['NavigationLink']))
        {
            $topOfferRes->NavigationLink = Link::CreateFromArray($topOffer['NavigationLink']);
        }
        else
        {
            $topOfferRes->NavigationLink = new Link();
        }

        $sp = ServiceProvider::CreateFromArray($topOffer['Provider']);
        if (!is_null($topOffer['Provider']['Phone']))
        {
            $sp->Phone = Phone::CreateFromArray($topOffer['Provider']['Phone']);
        }
        if (!is_null($topOffer['Provider']['GWP']))
        {
            $sp->GWP = GWP::CreateFromArray($topOffer['Provider']['GWP']);
        }
        $topOfferRes->Provider = $sp;

        return $topOfferRes;
    }
}