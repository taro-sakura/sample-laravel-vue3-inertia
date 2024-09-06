<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);
use App\Models\News;

describe('TEST_CRUDサンプル', function () {
    it('CRUD_一覧', function () {
        $news = News::factory()->create();
        $response = $this->get('/news');
        $response->assertSee($news->title);
    });
    it('CRUD_詳細', function () {
        $news = News::factory()->create();
        $response = $this->get('/news/'.$news->id);
        $response->assertStatus(200);
    });
    it('CRUD_新規登録', function () {
        //入力
        $response = $this->get('/news/create');
        $response->assertStatus(200);
        //保存
        $response = $this->post('/news/create', [
            'title' => 'Newsタイトル',
            'body' => 'News本文'
        ]);
        $this->assertDatabaseHas('news', [
            'title' => 'Newsタイトル'
        ]);
    });
    it('CRUD_編集', function () {
        $news = News::factory()->create();
        //入力
        $response = $this->get('/news/'.$news->id.'/edit');
        $response->assertSee($news->title);
        //保存
        $response = $this->put('/news/'.$news->id.'/edit', [
            'title' => 'Newsタイトル編集',
            'body' => 'News本文'
        ]);
        $this->assertDatabaseHas('news', [
            'title' => 'Newsタイトル編集'
        ]);
    });
    it('CRUD_削除', function () {
        $news = News::factory()->create();
        #$response = $this->get('/news');
        #$response->assertSee($news->title);//含まれていること
        $response = $this->delete('/news/'.$news->id);
        $response->assertRedirect('/news');
        $response = $this->get('/news');
        $response->assertDontSee($news->title);
    });
});

