<?php

if (!function_exists('formatRupiah')) {
    /**
     * Format number to Indonesian Rupiah currency format.
     *
     * @param float $number
     * @return string
     */
    function formatRupiah($number)
    {
        return 'Rp ' . number_format($number, 2, ',', '.');
    }
}
