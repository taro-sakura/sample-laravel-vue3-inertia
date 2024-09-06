<?php


describe('TEST_翻訳', function () {
    it('翻訳_TOP', function () {
        $response = $this->get('/translate');
        $response->assertStatus(200);
    });
    it('翻訳_日本語から英語への翻訳', function () {
        $response = $this->post('/translate/execute', [
            'original_text' => '私の'
        ]);
        $response->assertJson([
            'translate_text' => 'My',
        ]);
    });
    it('翻訳_英語から日本語への翻訳', function () {
        $response = $this->post('/translate/reverse', [
            'translate_text' => 'My'
        ]);
        $response->assertJson([
            'reverse_text' => '私の',
        ]);
    });
});

