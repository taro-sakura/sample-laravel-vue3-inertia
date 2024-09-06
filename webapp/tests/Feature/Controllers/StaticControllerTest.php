<?php

describe('TEST_静的画面', function () {
    it('HOME画面チェック', function () {
        $response = $this->get('/');
        $response->assertStatus(200);
    });
});

