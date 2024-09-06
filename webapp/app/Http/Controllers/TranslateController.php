<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use DeepL;

class TranslateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Translate/Index', []);
    }
    public function execute(Request $request)
    {
        $original_text = $request->original_text;
        $translate_text = NULL;
        if ($original_text) {
            $translate_text = $this->___translator($original_text);
        }
        return ['translate_text'=>$translate_text];
    }
    public function reverse(Request $request)
    {
        $translate_text = $request->translate_text;
        $reverse_text = NULL;
        if ($translate_text) {
            $reverse_text = $this->___translator($translate_text, false);
        }
        return ['reverse_text'=>$reverse_text];
    }
    private function ___translator($text, $en=true) {
        $translator = new \DeepL\Translator(config('app.DEEPL_API_KEY'));
        if ($en) {
            $result = $translator->translateText($text, 'ja', 'en-US');
        } else {
            $result = $translator->translateText($text, 'en', 'ja');
        }
        return $result->text;
    }
}
