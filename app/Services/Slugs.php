<?php

namespace App\Services;

use League\CommonMark\Normalizer\SlugNormalizer;

class Slugs
{

    public static function slugComponent(): string
    {
        $random = uuid_create();
        return (new SlugNormalizer())->normalize($random);
    }
}
