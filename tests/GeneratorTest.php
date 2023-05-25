<?php

use Farzai\PromptPay\Generator;

it('can generate qr code', function () {
    $generator = new Generator();

    $qrCode = $generator->generate('0899999999');

    expect((string) $qrCode)->toBe('00020101021129370016A000000677010111011300668999999995802TH53037646304FE29');
});

it('should generate success when target has special character', function () {
    $generator = new Generator();

    $qrCode = $generator->generate('089-999-9999');

    expect((string) $qrCode)->toBe('00020101021129370016A000000677010111011300668999999995802TH53037646304FE29');
});

it('can generate qr code with amount', function () {
    $generator = new Generator();

    $qrCode = $generator->generate('0899999999', 100);

    expect((string) $qrCode)->toBe('00020101021229370016A000000677010111011300668999999995802TH53037645406100.006304CB89');
});

it('should generate success when amount is null', function () {
    $generator = new Generator();

    $qrCode = $generator->generate('0899999999', null);

    expect((string) $qrCode)->toBe('00020101021129370016A000000677010111011300668999999995802TH53037646304FE29');
});

it('can enter e-wallet id', function () {
    $generator = new Generator();

    $qrCode = $generator->generate('123456789012345');

    expect((string) $qrCode)->toBe('00020101021129390016A00000067701011103151234567890123455802TH5303764630473AF');
});

it('can enter merchant tax id', function () {
    $generator = new Generator();

    $qrCode = $generator->generate('1234567890123');

    expect((string) $qrCode)->toBe('00020101021129370016A000000677010111021312345678901235802TH53037646304EC40');
});
