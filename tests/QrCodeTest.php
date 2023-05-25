<?php

use Farzai\PromptPay\QrCode;
use Psr\Http\Message\ResponseInterface;

it('can render qr code as psr response', function () {
    $qrCode = new QrCode('00020101021129370016A000000677010111011300668999999995802TH53037646304FE29');

    $response = $qrCode->toPsrResponse();

    expect($response)->toBeInstanceOf(ResponseInterface::class);
    expect($response->getStatusCode())->toBe(200);
    expect($response->getHeaderLine('Content-Type'))->toBe('image/png');
    expect($response->getBody()->getContents())->toBe($qrCode->asPng());
});

it('can render qr code as data uri', function () {
    $qrCode = new QrCode('00020101021129370016A000000677010111011300668999999995802TH53037646304FE29');

    $dataUri = $qrCode->asDataUri();

    expect($dataUri)->toBe('data:image/png;base64,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');
});

it('can render qr code as base64', function () {
    $qrCode = new QrCode('00020101021129370016A000000677010111011300668999999995802TH53037646304FE29');

    $base64 = $qrCode->asBase64();

    expect($base64)->toBe('data:image/png;base64,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');
});

it('can generate qr code and save to file', function () {
    $qrCode = new QrCode('00020101021129370016A000000677010111011300668999999995802TH53037646304FE29');

    $qrCode->save(__DIR__.'/../qrcode.png');

    expect(file_exists(__DIR__.'/../qrcode.png'))->toBeTrue();

    @unlink(__DIR__.'/../qrcode.png');
});
