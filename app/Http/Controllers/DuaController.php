<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DuaController extends Controller
{
    public function index()
    {
        return Inertia::render('Dua');
    }

    public function convert(Request $request)
    {
        $request->validate([
            'number' => 'required|integer'
        ]);

        $number = $request->input('number');

        // Convert number to currency format
        $formattedNumber = 'Rp. ' . number_format($number, 0, ',', '.');

        // Convert number to words
        $words = $this->numberToWords($number);

        return response()->json([
            'formatted_number' => $formattedNumber,
            'words' => $words
        ]);
    }

    private function numberToWords($number)
    {
        $units = ['', 'ribu', 'juta', 'miliar', 'triliun'];
        $words = [
            '', 'satu', 'dua', 'tiga', 'empat', 'lima',
            'enam', 'tujuh', 'delapan', 'sembilan'
        ];

        if ($number == 0) {
            return 'nol';
        }

        $parts = [];
        $unitIndex = 0;

        while ($number > 0) {
            $part = $number % 1000;
            if ($part > 0) {
                $partWords = $this->threeDigitToWords($part, $words);
                if ($unitIndex > 0) {
                    $partWords .= ' ' . $units[$unitIndex];
                }
                array_unshift($parts, $partWords);
            }
            $number = intval($number / 1000);
            $unitIndex++;
        }

        return implode(' ', $parts) . ' rupiah';
    }

    private function threeDigitToWords($number, $words)
    {
        $hundreds = intval($number / 100);
        $remainder = $number % 100;

        $result = '';

        if ($hundreds > 0) {
            if ($hundreds == 1) {
                $result .= 'seratus';
            } else {
                $result .= $words[$hundreds] . ' ratus';
            }
        }

        if ($remainder > 0) {
            if ($hundreds > 0) {
                $result .= ' ';
            }
            if ($remainder < 10) {
                $result .= $words[$remainder];
            } else if ($remainder < 20) {
                switch ($remainder) {
                    case 11:
                        $result .= 'sebelas';
                        break;
                    default:
                        $result .= $words[$remainder % 10] . ' belas';
                        break;
                }
            } else {
                $tens = intval($remainder / 10);
                $units = $remainder % 10;
                $result .= $words[$tens] . ' puluh';
                if ($units > 0) {
                    $result .= ' ' . $words[$units];
                }
            }
        }

        return $result;
    }
}
