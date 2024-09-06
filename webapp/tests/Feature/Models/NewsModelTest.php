<?php

use App\Models\News;

describe('MODEL_News', function () {
    it('データの登録テスト', function () {
        $news = new News([
            'title' => 'Newsタイトル',
            'body' => 'News本文'
        ]);
        expect($news->title)->toBe('Newsタイトル');
        expect($news->body)->toBe('News本文');
    });
    it('SAMPLE', function () {
        $news = new News([
            'title' => 'Newsタイトル',
            'body' => 'News本文'
        ]);
        $this->assertTrue($news->___aaa());
    });
});
