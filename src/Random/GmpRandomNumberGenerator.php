<?php

namespace Mdanter\Ecc\Random;

use Mdanter\Ecc\RandomNumberGeneratorInterface;

class GmpRandomNumberGenerator implements RandomNumberGeneratorInterface
{
    /**
     * (non-PHPdoc)
     * @see \Mdanter\Ecc\RandomNumberGeneratorInterface::generate()
     */
    public function generate($max)
    {
        $random = gmp_strval(gmp_random());
        $small_rand = rand();
    
        while (gmp_cmp($random, $n) > 0) {
            $random = gmp_div($random, $small_rand, GMP_ROUND_ZERO);
        }
    
        return gmp_strval($random);
    }   
}
